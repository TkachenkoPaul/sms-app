<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sources extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'aid');
    }
}
