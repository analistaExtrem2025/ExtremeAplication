<?php

/**
 * PHP version 10
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <ferchocarrilloleon@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://on-360.com/
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * MyClass Class Doc Comment
 *
 * @category Class
 * @package  MyPackage
 * @author   Author <ferchocarrilloleon@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://on-360.com/
 */

class Municipios extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'departamento_id'
    ];
    /**
     * Display a listing of the resource.
     */


    public function departamentos()
    {
        return $this->belongsTo('App\Models\departamentos');
    }
    /**
     * Display a listing of the resource.
     */

    public function localidad()
    {

        return $this->hasMany('App\Models\localidad');
    }
}
