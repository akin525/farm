@extends('layouts.sidebar')
@section('tittle', 'All Payment')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive active-projects">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">All Payment</h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{route('exportpay')}}" class="btn btn-primary btn-sm ms-2"><i class="fa fa-file-excel"></i> Export(csv)</a>
                    </div>

                    <table id="example" class="display table" style="min-width: 845px">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Inventory</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Ref</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <td>{{$dat->id}}</td>
                                <td>{{$dat->username}}
                                </td>
                                <td>{{$dat->amount}}</td>
                                <td>

                                    @if($dat->status=="1")
                                        <span class="badge badge-success">Delivered</span>
                                    @elseif($dat->status=="0")
                                        <span class="badge badge-warning">Not-Delivered</span>
                                    @else
                                        <span class="badge badge-info">{{$dat->status}}</span>
                                    @endif

                                </td>
                                <td>{{$dat->refid}}</td>
                                <td>{{$dat->created_at}}</td>
                                <td><a href="profile/{{ $dat->username }}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
