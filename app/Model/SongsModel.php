<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SongsModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'table_songs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'author',
        'album',
        'name',
        'duration',
    ];
}
