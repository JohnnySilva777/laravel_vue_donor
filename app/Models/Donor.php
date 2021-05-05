<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Donor extends Authenticatable
{
    use HasFactory;

    protected $guard = 'donor';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function donation(){
        return $this->belongsTo(Donations::class);
    }
}
