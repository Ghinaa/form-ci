<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class M_User extends Model{
    protected $table = 'user';
    protected $allowedFields =['firstname','lastname','email','password','date_update'];
}
