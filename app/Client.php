<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['first_name', 'last_name', 'avatar', 'email'];


    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
