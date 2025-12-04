<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
          'role', // ⬅ WAJIB DITAMBAH
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // RELASI: User punya 1 foto profil
    public function foto()
    {
        return $this->hasOne(Media::class, 'ref_id')
                    ->where('ref_table', 'users')
                    ->where('caption', 'foto');
    }
}
