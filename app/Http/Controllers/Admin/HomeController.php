<?php


namespace App\Http\Controllers\Admin;


use App\Models\Donations;
use App\Models\Donor;
use App\Models\Organization;

class HomeController
{
    public function index()
    {
        $organizations = Organization::take(5)
            ->orderBy('id', 'DESC')
            ->get();

        $donations = Donations::take(5)
            ->with('donor')
            ->orderBy('id', 'DESC')
            ->get();

        $donors = Donor::take(8)
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.dashboard.dashboard', [
            'organizations' => $organizations,
            'donations' => $donations,
            'donors' => $donors,
        ]);
    }
}
