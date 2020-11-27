<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';
    protected $fillable = ['user_id','product_id','oreder_number'];
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
