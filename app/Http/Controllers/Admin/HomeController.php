<?php


namespace App\Http\Controllers\Admin;


use App\Models\Donations;
use App\Models\Donor;
use App\Models\Organization;

class HomeController
{
    public $donor;
    public $organization;
    public $donation;

    public function __construct(Donations $donation,
                                Organization $organization,
                                Donor $donor)
    {
        $this->donation = $donation;
        $this->organization = $organization;
        $this->donor = $donor;
    }

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

        $totalDonationsUnique = $this->donation->getTotalDonationsUnique();
        $totalDonationsRecurrence = $this->donation->getTotalDonationsRecurrence();
        $totalOrganizations = $this->organization->getTotalOrganizations();
        $totalMembers = $this->donor->getTotalMembers();
        $totalMembersToday = $this->donor->getTotalMembersToday();

        return view('admin.dashboard.dashboard', [
            'organizations' => $organizations,
            'donations' => $donations,
            'donors' => $donors,
            'totalDonationsRecurrence' => $totalDonationsRecurrence,
            'totalOrganizations' => $totalOrganizations,
            'totalDonationsUnique' => $totalDonationsUnique,
            'totalMembers' => $totalMembers,
            'totalMembersToday' => $totalMembersToday,
        ]);
    }
}
