<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    /* MASS ASSIGMENT */
    protected $fillable = [
        'phone_area_id',
        'number',
        'phone_type_id',
        'contact_id'
    ];

    /* RELACIONAMENTO - Tipos de telefone */
    public function PhoneType()
    {
        return $this->belongsTo(PhoneType::class);
    }

    /* RELACIONAMENTO - Códigos de área */
    public function PhoneArea()
    {
        return $this->belongsTo(PhoneArea::class);
    }

    /* RELACIONAMENTO - Contato */
    public function Contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
