<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    // added fillable
    protected $fillable = [
        'user_id',
        'category_name',
    ];

    // creating a relationship between categories table and user table
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
