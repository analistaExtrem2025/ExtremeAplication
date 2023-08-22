@extends('adminlte::page')

@section('title', 'Lista de Roles')

@section('content_header')
    <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm float-right"><i
            class="fas fa-plus-square"></i></a>

    <h1>Lista de Roles</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">

            {{ session('info') }}

        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striprd">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px">
                                <a href="{{ route('role.show', $role) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            </td>
                            <td width="10px">
                                <a href="{{ route('role.edit', $role) }}" class="btn btn-success"><i
                                        class="fas fa-user-edit"></i></a>
                            </td>
                            <td width="10px">
                                {!! Form::open(['route' => ['role.destroy', $role->id], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
