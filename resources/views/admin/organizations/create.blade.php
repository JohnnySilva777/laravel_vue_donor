@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Create Products') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('products.create') }}">
                                @csrf
                                <div class="form-group row">
                                    <label>Title</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label>Content</label>
                                    <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Description..') }}" required></textarea>
                                </div>

                                <div class="form-group row">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" required/>
                                </div>

                                <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                                <a href="{{ route('products.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
