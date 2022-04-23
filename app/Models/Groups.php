<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Groups extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'groups';
    public $timestamps = true;

     public function admin()
    {
        return $this->hasOne(User::class, 'id', 'aid');
    }

}
