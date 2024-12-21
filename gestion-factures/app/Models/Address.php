<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['street', 'city', 'state','zip'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
}
