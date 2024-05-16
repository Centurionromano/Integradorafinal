<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
protected $table = 'administrator'; //corresponde al nombre de la tabla en la base de datos
protected $allowedFields = ['name','login','password'];//estos son los campos que podrán ser modificados por la aplicación

public function login($data)
{
    return $this->asArray()->where($data)->first();
}

}