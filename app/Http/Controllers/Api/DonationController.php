<?php


namespace App\Http\Controllers\Api;


use App\Models\Donations;
use Illuminate\Http\Request;

class DonationController
{
    public function store(Request $request){
        return Donations::create($request->all());
    }

    public function index($id){
        dd($id);
    }
}
