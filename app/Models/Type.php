<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    //Mass Assignment
    protected $fillable = [
        "name",
        "slug"
    ]; 
    //Project
    public function projects() {
        return $this->hasMany(Project::class); //relazione one to many
    }
}
