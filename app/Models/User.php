<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash; // Assure-toi de charger Hash

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les colonnes pouvant être remplies automatiquement.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'email',
        'password',
    ];

    /**
     * Les colonnes cachées lors de la sérialisation.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Mutator pour hasher le mot de passe avant de le stocker en base.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value); // Hachage du mot de passe
    }
}
