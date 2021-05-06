<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function donations($id){
        $donor = Donor::findOrFail($id);
        return $donor->donations()->with(['organization'])->orderBy('id', 'DESC')->get();
    }

    public function favorite(Request $request){
        $donor = Donor::find($request->donor_id);
        $donor->favorite_organization_id = $request->organization_id;
        $donor->save();
        return $donor;
    }

    public function show($id)
    {
        return Donor::findOrFail($id);
    }
}
