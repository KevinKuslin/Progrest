<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Attributes\Fillable; 

#[Fillable(['title', 'description'])]

class Project extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
