<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;
    protected $table = "todo";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;
}
