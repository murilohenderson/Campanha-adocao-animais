<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'species', 'breed', 'gender', 'age_text', 
        'size', 'description', 'image_path', 'is_adopted'
    ];

    // Accessor para facilitar exibição do gênero
    public function getGenderLabelAttribute(): string
    {
        return $this->gender === 'M' ? 'Macho' : 'Fêmea';
    }
}