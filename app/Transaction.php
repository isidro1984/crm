<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //protected $primaryKey = 'id';
    protected $fillable = ['amount', 'client_id'];

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }
}
