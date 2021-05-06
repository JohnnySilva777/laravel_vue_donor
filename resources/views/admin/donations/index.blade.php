@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            </i>{{ __('Donations') }}</div>
                        <div class="card-body">
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($donations as $donation)
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>{{$donation->donor->name}}</td>
                                        @if($donation->type === 'unique')
                                            <td><span class="badge badge-success">{{$donation->type}}</span></td>
                                        @else
                                            <td><span class="badge badge-primary">{{$donation->type}}</span></td>
                                        @endif
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                R${{$donation->price/100}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $donations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection
