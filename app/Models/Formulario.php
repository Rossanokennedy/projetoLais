<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mom_name',
        'birthdate',
        'date',
        'comorbidades',
        'anamnese',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
