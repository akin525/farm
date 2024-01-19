@extends('layouts.sidebar')
@section('tittle', 'All Farm-Activities')
@section('content')
    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <ul class="nav nav-pills mix-chart-tab user-m-tabe" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{route('exportactive')}}" class="btn btn-primary btn-sm ms-2"><i class="fa fa-file-excel"></i> Export(csv)</a>

                        </li>
                        <li class="nav-item" role="presentation">
                            <a  class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#newspends"><i class="fa fa-file-user"></i> +Add Activities</a>
                        </li>
                    </ul>
                </div>
                <div class="modal fade" id="newspends">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="widget-stat card bg-primary">
                                <div class="card-body  p-4">
                                    <div class="media">
									<span class="me-3">
										<i class="la la-bookmark"></i>
									</span>
                                        <div class="media-body text-white">
                                            <p class="mb-1">Create Farm-Activities</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="card card-body">
                                    <form class="subscribe" id="dataForm">
                                        @csrf

                                        <div class="form-group">
                                            <label for="farm_unit_id">Farm Unit:</label>
                                            <select name="farm_unit_id" class="form-control" required>
                                                @foreach($farmUnits as $farmUnit)
                                                    <option value="{{ $farmUnit->id }}">{{ $farmUnit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="employee_id">Employee:</label>
                                            <select name="employee_id" class="form-control">
                                                @foreach($employees as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="activity_name">Activity Name:</label>
                                            <input type="text" name="activity_name" class="form-control" required>
                                        </div>

                                        <button type="submit" class="btn btn-success submit-btn">Create Activities</button>
                                    </form>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="table-responsive active-projects">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">All Activities</h4>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table id="example" class="display table" style="min-width: 845px">
                        <thead>
                        <tr>
                        <tr>
                            <th>ID</th>
                            <th>Farm Unit</th>
                            <th>Employee</th>
                            <th>Activity Name</th>
                            <th>Action</th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($farmActivities as $activity)
                            <tr>
                                <td>{{ $activity->id }}</td>
                                <td>{{ $activity->farmUnit->name }}</td>
                                <td>{{ $activity->employee ? $activity->employee->name : 'N/A' }}</td>
                                <td>{{ $activity->activity_name }}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm">View</a>
                                    <!-- Add edit, update, delete buttons as needed -->
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No farm activities found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                // The user clicked "Yes", proceed with the action
                // Add your jQuery code here
                // For example, perform an AJAX request or update the page content
                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{route('activities')}}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle the success response here
                        $('#loadingSpinner').hide();

                        console.log(response);
                        // Update the page or perform any other actions based on the response

                        if (response.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message
                            }).then(() => {
                                location.reload(); // Reload the page
                            });
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Pending',
                                text: response.message
                            });
                            // Handle any other response status
                        }

                    },
                    error: function(xhr) {
                        $('#loadingSpinner').hide();
                        Swal.fire({
                            icon: 'error',
                            title: 'fail',
                            text: xhr.responseText
                        });
                        // Handle any errors
                        console.log(xhr.responseText);

                    }
                });
            });
        });

    </script>

@endsection
