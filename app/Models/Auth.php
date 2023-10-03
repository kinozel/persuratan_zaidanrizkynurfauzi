<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Auth extends Authenticatable
{
    use HasFactory,Notifiable,HasApiTokens;
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'username','password','role'
    ];
}