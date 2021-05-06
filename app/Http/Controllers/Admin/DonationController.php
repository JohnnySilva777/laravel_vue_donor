<?php


namespace App\Http\Controllers\Admin;


use App\Models\Donations;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonationController
{
    public function index()
    {
        $donations = Donations::with('donor')->paginate(10);
        return view('admin.donations.index', ['donations' => $donations]);
    }
}
