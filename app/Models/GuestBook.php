<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    use HasFactory;

    protected $table = 'guestbook';
    protected $fillable = ['posted', 'name', 'email', 'address', 'city', 'message'];
    public $timestamps = false;
}
