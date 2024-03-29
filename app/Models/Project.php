<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //soft delete

class Project extends Model
{
    use HasFactory, SoftDeletes;
    //Mass assignment
    protected $fillable = [
        "title",
        "client",
        "description",
        "url",
        "slug",
        "type_id"
    ];
    //Type
    public function type() {
        return $this->belongsTo(Type::class); //relazione one to many
    }
}
