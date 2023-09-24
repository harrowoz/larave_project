<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categorys';
    protected $fillable = ['catname','status'];

    function getAllCategory(){
        $dataCat = Category::paginate(5);//ORM 
        return $dataCat;
    }

    function getById($id){
        return Category::find($id);
    }
}
