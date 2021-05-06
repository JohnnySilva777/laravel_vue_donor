@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Create Donor') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('donors.create') }}">
                        @csrf
                        <div class="form-group row">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name"
                                   required autofocus>
                        </div>

                        <div class="form-group row">
                            <label>Email</label>
                            <input class="form-control" type="text" name="description" rows="9"
                                      placeholder="{{ __('Email') }}" required>
                        </div>

                        <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                        <a href="{{ route('donors.index') }}"
                           class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection
