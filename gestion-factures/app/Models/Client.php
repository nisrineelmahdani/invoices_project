<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = ['id','name', 'email', 'phone'];
    public function address() {
        return $this->hasOne(Address::class);
        }
        public function invoices()
{
    return $this->hasMany(Invoice::class);
}
public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}


}
