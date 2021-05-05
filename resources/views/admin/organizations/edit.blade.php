@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit') }}: {{ $organization->name }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('organizations.edit', $organization->id ) }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ $organization->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label>Description</label>
                                <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Description..') }}" required>{{ $organization->description }}</textarea>
                            </div>
                        </div>

                        <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                        <a href="{{ route('organizations.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
