@extends('layouts.sidebar')
@section('tittle', 'Payment Report')
@section('content')

    <div class="row">
        <div class="card card-body">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h5>Generate Report</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="general-label">

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form class="form-horizontal" method="POST" action="{{ route('date') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <h4 class="mt-0 header-title text-white">Search</h4>

                                            <div class="">
                                                <div class="input-group-prepen m-1">
                                                    <h6 class="text-white">From: </h6>
{{--                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>--}}
                                                </div>
                                                <input style="margin-right: 20px" type="date" name="from"  class="form-control @error('from') is-invalid @enderror">
                                            </div>
                                            <div class="">
                                                <div class="input-group-prepend m-1">
                                                    <h6 class="text-white">To: </h6>
{{--                                                    <span class="input-group-text"><i class="fa fa-calendar"></i> </span>--}}
                                                </div>
                                                <input type="date" name="to"  class="form-control @error('to') is-invalid @enderror">
                                            </div>

                                            <div class="input-group mt-2" style="align-content: center">
                                                <button class="btn btn-success btn-large" type="submit"><i
                                                        class="fa fa-book"></i> Generate
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </form>

{{--                                    @if($result ?? '')--}}
{{--                                        <div class="">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body depostit-card">--}}
{{--                                                    <div class="depostit-card-media d-flex justify-content-between style-1">--}}
{{--                                                        <div>--}}
{{--                                                            <h6>Total</h6>--}}
{{--                                                            <h3>₦{{number_format(intval($sumdate *1),2)}}</h3>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="icon-box bg-secondary">--}}
{{--                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                                <g clip-path="url(#clip0_3_566)">--}}
{{--                                                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M8 3V3.5C8 4.32843 8.67157 5 9.5 5H14.5C15.3284 5 16 4.32843 16 3.5V3H18C19.1046 3 20 3.89543 20 5V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V5C4 3.89543 4.89543 3 6 3H8Z" fill="#222B40"/>--}}
{{--                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.875 15.75C10.6354 15.75 10.3958 15.6542 10.2042 15.4625L8.2875 13.5458C7.90417 13.1625 7.90417 12.5875 8.2875 12.2042C8.67083 11.8208 9.29375 11.8208 9.62917 12.2042L10.875 13.45L14.0375 10.2875C14.4208 9.90417 14.9958 9.90417 15.3792 10.2875C15.7625 10.6708 15.7625 11.2458 15.3792 11.6292L11.5458 15.4625C11.3542 15.6542 11.1146 15.75 10.875 15.75Z" fill="#222B40"/>--}}
{{--                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11 2C11 1.44772 11.4477 1 12 1C12.5523 1 13 1.44772 13 2H14.5C14.7761 2 15 2.22386 15 2.5V3.5C15 3.77614 14.7761 4 14.5 4H9.5C9.22386 4 9 3.77614 9 3.5V2.5C9 2.22386 9.22386 2 9.5 2H11Z" fill="#222B40"/>--}}
{{--                                                                </g>--}}
{{--                                                                <defs>--}}
{{--                                                                    <clipPath id="clip0_3_566">--}}
{{--                                                                        <rect width="24" height="24" fill="white"/>--}}
{{--                                                                    </clipPath>--}}
{{--                                                                </defs>--}}
{{--                                                            </svg>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    @endif--}}
                            </div>
                        </div>
                    </div>
                </div>

                {{--        @if($data ?? '')--}}
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Transaction</h4>
                                    <div class="top-panel">
{{--                                        <div class="btn-group">--}}
{{--                                            <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown">Export to <span class="caret"></span></button>--}}
{{--                                            <ul class="dropdown-menu" role="menu">--}}
{{--                                                <li><a onclick="exportAll('csv');" href="javascript://">CSV</a></li>--}}
{{--                                                <li><a onclick="exportAll('txt');" href="javascript://">TXT</a></li>--}}
{{--                                                <li><a onclick="exportAll('xls');" href="javascript://">XLS</a></li>--}}
{{--                                                <li><a onclick="exportAll('sql');" href="javascript://">SQL</a></li>--}}
{{--                                                <li><a onclick="exportAll('json');" href="javascript://">JSON</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <table id="projects-tbl" class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Inventory</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Ref</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($result ?? '')
                                        @foreach($deposit as $dat)
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
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                {{--    @endif--}}
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="dist/tableExport.js"></script>
    <script src="main.js"></script>

@endsection
