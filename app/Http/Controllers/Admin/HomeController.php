<?php


namespace App\Http\Controllers\Admin;


use App\Models\Organization;

class HomeController
{
    public function index()
    {
        $organizations = Organization::take(5)
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.dashboard.dashboard', ['organizations' => $organizations]);
    }
}
