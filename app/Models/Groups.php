<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Groups extends Model
{
    use HasFactory;

     public function admin()
    {
        return $this->hasOne(User::class, 'id', 'aid');
    }

    public function subscribers(){
        return $this->hasMany(Subscriber::class, 'gid', 'id');
    }

}
