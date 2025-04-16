<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $fillable = ['name'];


    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}

