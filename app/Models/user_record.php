<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_record extends Model
{
    use HasFactory;
    protected $table = 'user_records';
    public $timestamps = true;
    protected $fillable = [
        'email_id',
        'name',
        'joindate',
        'leavedate',
        'stillwork',
        'profile_img',

    ];
}
