<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $fillable = ['name', 'abbreviation'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}