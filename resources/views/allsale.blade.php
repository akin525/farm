@extends('layouts.sidebar')
@section('tittle', 'All Sales')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive active-projects">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">All Sales</h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{route('exportsale')}}" class="btn btn-primary btn-sm ms-2"><i class="fa fa-file-excel"></i> Export(csv)</a>
                    </div>
                    <table id="example" class="display table" style="min-width: 845px">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit-Price</th>
                            <th>Sale-Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <td>{{$dat->id}}</td>
                                <td>{{$dat->product_name}}
                                <td>{{$dat->quantity}}
                                </td>
                                <td>{{$dat->unit_price}}</td>
{{--                                <td>--}}

{{--                                    @if($dat->status=="1")--}}
{{--                                        <span class="badge badge-success">Delivered</span>--}}
{{--                                    @elseif($dat->status=="0")--}}
{{--                                        <span class="badge badge-warning">Not-Delivered</span>--}}
{{--                                    @else--}}
{{--                                        <span class="badge badge-info">{{$dat->status}}</span>--}}
{{--                                    @endif--}}

{{--                                </td>--}}
                                <td>{{$dat->sale_date}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
