<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = "persons";

    protected $fillable = [
        "firstName", "lastName", "documentNumber", "country", "city", "street",
        "number", "single"
    ];

    //Para Campos que no se muestran
    protected $hidden =[
        "updated_at", "created_at"
    ];
}
