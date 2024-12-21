<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['name','price','supplier_id'];
    public function invoices()
{
    return $this->belongsToMany(Invoice::class)->withPivot('quantity');
}
public function supplier()
{
    return $this->belongsTo(Supplier::class);
}
public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}
public function tags()
{
    return $this->morphToMany(Tag::class, 'taggable');
}



}
