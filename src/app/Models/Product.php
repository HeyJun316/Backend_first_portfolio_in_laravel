<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    use HasFactory;

    public function size(){
        return $this->belongsTo('App\Models\Size');
    }
    public function category(){
        return $this->belongsTo('App\Models\Categort');
    }
    public function bland(){
        return $this->belongTo('App\Models\Bland');
    }
}