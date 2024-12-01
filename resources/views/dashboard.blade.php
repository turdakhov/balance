@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <dashboard>
                    </dashboard>
                    <div>
                        <a href="{{ route('transactions') }}" class="w-100 btn btn-lg btn-outline-primary">View all
                            transactions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
