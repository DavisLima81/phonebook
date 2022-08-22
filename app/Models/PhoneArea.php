<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneArea extends Model
{
    use HasFactory;

    /* MASS ASSIGNMENT */
    protected $fillable = [
        'number',
    ];

    /* RELACIONAMENTO - Telefone */
    public function Phone()
    {
        return $this->hasOne(Phone::class);
    }
}
