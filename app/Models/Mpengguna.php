<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpengguna extends Model
{
    protected $table            = 'tbl_pengguna';
    protected $primaryKey       = 'id_pengguna';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pengguna', 'username', 'nama_pengguna', 'password', 'level'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getpengguna($user, $pass)
    {
        $where = [
            'username' => $user,
            'password' => $pass
        ];

        $user = new Mpengguna();
        $user->select('tbl_pengguna.id_pengguna,tbl_pengguna.nama_pengguna, tbl_pengguna.username, tbl_pengguna.password, tbl_pengguna.level');
        $user->where($where);
        return $user->find();
    }
    public function updatePengguna($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_pengguna' => $id])->first();
    }

    public function getEnumValues()
    {
        $query = $this->db->query("SHOW COLOMNS FROM tbl_pengguna WHERE Field = 'level'");
        $baris = $query->getRow();
        $enum = explode("','", substr($baris->Type, 6, -2));

        return $enum;
    }
}
