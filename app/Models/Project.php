<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Project extends Model
{
    use HasFactory; 
    protected $fillable = ['leader_id', 'title', 'description', 'progress', 'accent']; 

    public function leader(){
        return $this->belongsTo(User::class, 'leader_id');
    }
    public function members(){
        return $this->belongsToMany(User::class); 
    }
}
