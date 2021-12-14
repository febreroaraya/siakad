<?php

namespace App\Models;
use CodeIgniter\Model;

class Mdl_auth extends Model
{
    public function login_user($username, $password)
    {
        return $this->db->table('tb_user')->where([
            'username' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }
}