<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApiUser extends Model
{
    protected $table = 'table_users';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'auth_key',
        'role',
    ];
}
