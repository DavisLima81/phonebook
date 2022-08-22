<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneType extends Model
{
    use HasFactory;

    /* MASS ASSIGNMENT */
    protected $fillable = [
      'name',
    ];

    /* RELACIONAMENTO - Telefone */
    public function Phone()
    {
        return $this->hasOne(Contact::class);
    }
}

