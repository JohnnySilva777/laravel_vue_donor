<?php


namespace App\Http\Controllers\Api;


use App\Models\Donations;
use Illuminate\Http\Request;

class DonationController
{
    public function store(Request $request){
        Donations::create($request->all());
    }

//    public function show($id){
//        dd($id);
//    }
}
