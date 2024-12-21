<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'client_id',
        'invoice_number',
        'client_name',
        'invoice_date',
        'amount',
        'status',
        'file_path',
    ];
    public function client() {
        return $this->belongsTo(Client::class);
        }
        public function products() {
            return $this->belongsToMany(Product::class)->withPivot('quantity');
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
