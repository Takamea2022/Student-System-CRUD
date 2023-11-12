<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'gender',
    //     'age',
    //     'email',
    // ];

    // In the Student model
protected $fillable = ['first_name', 'last_name', 'gender', 'age', 'email'];

}
