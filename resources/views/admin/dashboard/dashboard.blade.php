@extends('layouts.app')

@section('content')
    @include('admin.dashboard.partials.infoBox')
    @include('admin.dashboard.partials.lastMembers')
    @include('admin.dashboard.partials.lastDonations')
    @include('admin.dashboard.partials.lastOrganization')
@endsection

@section('javascript')

@endsection
