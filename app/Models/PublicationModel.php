<?php namespace App\Models;

use CodeIgniter\Model;

class PublicationModel extends Model
{
    protected $table = 'publication';
    protected $allowedFields = ['content', 'user','nombre','imagen'];

    public function get($id = false)
    {
        if ($id === false)
        {
            return $this->findAll(); // Corresponde a SELECT * FROM publication
        }

        return $this->asArray()
                    ->where(['id' => $id]) // Corresponde a SELECT * FROM publication WHERE id = [el valor pasado como parámetro]
                    ->first();
    }

public function show()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('publication');
        $builder->select('publication.*, user.name');
        $builder->join('user','user.id = publication.user');
        $builder->orderBy('id','DESC');
        return $builder->get()->getResultArray();
    }
}