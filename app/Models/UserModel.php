<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
protected $table = 'user'; //corresponde al nombre de la tabla en la base de datos
protected $allowedFields = ['id','name','login','password'];//estos son los campos que podrán ser modificados por la aplicación

public function login($data)
{
    return $this->asArray()->where($data)->first();
}



public function showuser()
{
    $db = \Config\Database::connect();
    $builder = $db->table('user');
    $builder->select('*'); // Selecciona todas las columnas de la tabla 'user'
    $builder->orderBy('id', 'DESC'); // Ordena los resultados por 'id' en orden descendente
    return $builder->get()->getResultArray(); // Ejecuta la consulta y devuelve los resultados como un array asociativo
}


}