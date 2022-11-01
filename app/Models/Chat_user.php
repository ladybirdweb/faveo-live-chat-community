<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_user extends Model
{
    use HasFactory;
    protected $table = 'chat_user';
    protected $fillable = ['name', 'mail', 'password', 'image', 'info', 'roles', 'last_activity'];
}
