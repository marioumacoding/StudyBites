<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = ['image_name', 'image_path'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
