@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="{{ route('dashboard') }}">← Back to Dashboard</a></div>
                    <div class="card-body">


                        <div class="row">
                            <div class="col-lg-4">
                                <h1>Transaction list</h1>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <form action="{{ route('transactions') }}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="firstName"
                                                        placeholder="Search by Description" name="description" value="{{ $description }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select" name="order">
                                                        <option value="desc">⇧ Date</option>
                                                        <option value="asc" @if ($order == 'asc') selected @endif>⇩ Date</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="w-100 btn btn-primary" type="submit">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->description }}</td>
                                            @if ($transaction->is_success)
                                                <td class="text-success sw-bolder">
                                                    Successful
                                                </td>
                                            @else
                                                <td class="text-danger">
                                                    Failed
                                                </td>
                                            @endif
                                            <td>{{ $transaction->created_at->format('Y.m.d H:i') }}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <div class="pagination-wrapper">
                                {{ $transactions->appends(request()->input())->links() }}
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
