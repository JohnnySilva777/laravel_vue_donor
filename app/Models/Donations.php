<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id', 'organization_id', 'type', 'price'
    ];

    protected $cast = [
        'donor_id' => 'int',
        'organization_id' => 'int',
        'type' => 'enum',
        'price'=> 'int'
    ];

    public function donor(){
        return $this->belongsTo(Donor::class);
    }

    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    public function getTotalDonationsRecurrence()
    {
        $total = $this->where('type', 'recurrence')->sum('price');
        return $total/100;
    }

    public function getTotalDonationsUnique()
    {
        $total = $this->where('type', 'unique')->sum('price');
        return $total/100;
    }
}
