<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function taggable()
{
    return $this->morphedByMany(Invoice::class, 'taggable');
}

public function taggableProducts()
{
    return $this->morphedByMany(Product::class, 'taggable');
}

}
