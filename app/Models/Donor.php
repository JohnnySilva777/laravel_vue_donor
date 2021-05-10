<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function donations(){
        return $this->hasMany(Donations::class);
    }

    public function getTotalMembers()
    {
        return $this->count();
    }
    public function getTotalMembersToday()
    {
        return $this->whereBetween('created_at',
            [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
            ->count();
    }

}
