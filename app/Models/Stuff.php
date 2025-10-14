<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function services()
    // {
    //     return $this->hasMany(Product::class, 'staff_id');
    // }
}
