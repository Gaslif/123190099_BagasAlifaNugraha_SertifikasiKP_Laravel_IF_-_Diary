<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [     //mengisi ke database
        'user_id',
        'body',
        // 'image'  di comment karena tidak akan ada eror terakhir di coba
    ];

    public function user()  //menyambungkan
    {
        return $this->belongsTo(User::class);
    }

}
