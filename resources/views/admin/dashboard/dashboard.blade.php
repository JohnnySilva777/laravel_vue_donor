@extends('layouts.app')

@section('content')
    <div class="row">
        @include('admin.dashboard.partials.infoBox')
        @include('admin.dashboard.partials.lastMembers')
        @include('admin.dashboard.partials.lastDonations')
        @include('admin.dashboard.partials.lastOrganization', ['organizations' => $organizations])
    </div>
@endsection

@section('javascript')

@endsection
