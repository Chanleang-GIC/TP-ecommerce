<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Todo extends Model // protected $table = "todos";
{
    use HasFactory;
    protected $fillable = ["task","description"];
}
