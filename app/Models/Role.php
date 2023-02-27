<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    protected $table = 'roles';

    public function user() {
    use HasFactory;

        return $this->belongsTo(User::class,'user_id');
    }

}
