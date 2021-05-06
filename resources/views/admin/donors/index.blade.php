@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            </i>{{ __('Donors') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <a href="{{ route('donors.create') }}" class="btn btn-primary m-2">{{ __('Add Donor') }}</a>
                            </div>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($donors as $donor)
                                    <tr>
                                        <td><strong>{{ $donor->name }}</strong></td>
                                        <td><strong>{{ $donor->email }}</strong></td>
                                        <td><strong>{{ $donor->created_at }}</strong></td>
                                        <td>
                                            <a href="{{ route('donors.edit', [$donor->id]) }}" class="btn btn-block btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('donors.delete', $donor->id ) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-block btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $donors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection
