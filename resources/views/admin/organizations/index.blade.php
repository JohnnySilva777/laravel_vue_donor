@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            </i>{{ __('Organizations') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <a href="{{ route('organizations.create') }}" class="btn btn-primary m-2">{{ __('Add Organization') }}</a>
                            </div>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($organizations as $organization)
                                    <tr>
                                        <td><strong>{{ $organization->name }}</strong></td>
                                        <td><strong>{{ $organization->description }}</strong></td>
                                        <td><strong>{{ $organization->created_at }}</strong></td>
                                        <td>
                                            <a href="{{ route('organizations.edit', [$organization->id]) }}" class="btn btn-block btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('organizations.delete', $organization->id ) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-block btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $organizations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection
