<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'aid');
    }
    public function group()
    {
        return $this->hasOne(Groups::class, 'id', 'gid');
    }

    public function source()
    {
        return $this->hasOne(Sources::class, 'id', 'src');
    }
}
