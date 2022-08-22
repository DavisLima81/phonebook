<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /* MASS ASSIGNMENT */
    protected $fillable = [
        'name',
        'last_name',
        'remember',
        'email',
        'contact_type_id'
    ];

    /* RELACIONAMENTO - Tipos de contato */
    public function contactType()
    {
        return $this->belongsTo(ContactType::class);
    }

    /* RELACIONAMENTO - Phones */
    public function Phones()
    {
        return $this->hasMany(Phone::class);
    }
}
