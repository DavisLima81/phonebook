<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    use HasFactory;

    /* MAS ASSIGNMENT */
    protected $fillable = [
      'name',
    ];

    /* RELACIONAMENTO - Contato */
    public function Contact()
    {
        return $this->hasOne(Contact::class);
    }
}
