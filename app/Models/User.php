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
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // RELASI MEDIA
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
                    ->where('ref_table', 'users')
                    ->orderBy('sort_order', 'asc');
    }

    // Foto pertama (1 user = 1 foto)
    public function foto()
    {
        return $this->hasOne(Media::class, 'ref_id')
                    ->where('ref_table', 'users')
                    ->orderBy('sort_order', 'asc');
    }
}
