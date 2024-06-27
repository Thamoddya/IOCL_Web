@extends('Pages.Student.Layouts.StudentLayout')
@section('content')
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Transaction Reports</h2>
                <small class="text-muted">Payment Transaction</small>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Transaction Reports</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Transaction ID</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Payment Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$transaction->transaction_no}}</td>
                                        <td>Rs.{{$transaction->total_paid}}</td>
                                        <td>
                                            @if($transaction->payment_method_id == 1)
                                                <span class="badge badge-success">Online</span>
                                            @else
                                                <span class="badge badge-danger">Physical</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($transaction->payment_status_id == 1)
                                                <span class="badge badge-info">Paid</span>
                                            @else
                                                <span class="badge badge-danger">Unpaid</span>
                                            @endif
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y h:i A')  }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
