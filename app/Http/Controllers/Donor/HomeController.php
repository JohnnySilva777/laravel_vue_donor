<?php


namespace App\Http\Controllers\Donor;


use App\Models\Organization;

class HomeController
{
    public function index()
    {
        return view('donor.donor');
    }
}
