<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;
use Spatie\Permission\Models\Permission;



class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = ModelsRole::all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
            ]
        );

        $role = ModelsRole::create($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('role.edit', $role)
            ->with('info', 'El rol se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelsRole $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsRole $role)
    {

        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsRole $role)
    {
        $request->validate(
            [
                'name' => 'required'
            ]
        );

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('role.edit', $role)
            ->with('info', 'El rol se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsRole $role)
    {
        $role->delete();

         return redirect()->route('role.index')->with('info', 'El rol se elimino con éxito');
    }
}
