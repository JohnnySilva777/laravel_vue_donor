<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function donations($id){
        $donor = Donor::find($id);
        return $donor->donations()->with(['organization'])->orderBy('id', 'DESC')->get();
    }

    public function organizations($id){
        dd($id);
    }
}
