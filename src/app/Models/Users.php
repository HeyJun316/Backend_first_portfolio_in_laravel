<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;//(+)
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;


class Users extends Authenticatable
{
    use SoftDeletes;
    use HasFactory, Notifiable;
    use Billable;


    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'sex', 'postal_code', 'address', 'birthday', 'password'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['delete_at'];
}
