@extends('layouts.sidebar')
@section('tittle', 'Employee')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        .subscribe {
            position: relative;
            padding: 20px;
            background-color: #FFF;
            border-radius: 4px;
            color: #333;
            box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
        }

        .subscribe:after {
            position: absolute;
            content: "";
            right: -10px;
            bottom: 18px;
            width: 0;
            height: 0;
            border-left: 0px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #208b37;
        }

        .subscribe p {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 4px;
            line-height: 28px;
        }



        .subscribe .submit-btn {
            position: absolute;
            border-radius: 30px;
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            background-color: #208b37;
            color: #FFF;
            padding: 12px 25px;
            display: inline-block;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 5px;
            right: -10px;
            bottom: -20px;
            cursor: pointer;
            transition: all .25s ease;
            box-shadow: -5px 6px 20px 0px rgba(26, 26, 26, 0.4);
        }

        .subscribe .submit-btn:hover {
            background-color: #208b37;
            box-shadow: -5px 6px 20px 0px rgba(88, 88, 88, 0.569);
        }
    </style>

    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>

        <div class="card-body">
            <div class="table-responsive active-projects">

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
                                            <p class="mb-1">Create Employee</p>
                                            {{--                    <h3 class="text-white">Sales</h3>--}}

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="card card-body">
                                    <form class="subscribe" id="dataForm">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="contact_number">Contact Number:</label>
                                            <input type="text" name="contact_number" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="salary">Salary:</label>
                                            <input type="number" name="salary" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="unit">Select Farm Unit:</label>
                                            <select name="unit" class="form-control">
                                                @foreach($farmUnits as $farmUnit)
                                                    <option value="{{ $farmUnit->id }}">{{ $farmUnit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-success submit-btn">Create Employee</button>
                                    </form>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function addUnit() {
                        // Clone the last unit fields and append to the form
                        var lastUnit = document.querySelector('#additional_units .form-group:last-child');
                        var newUnit = lastUnit.cloneNode(true);
                        document.getElementById('additional_units').appendChild(newUnit);

                        // Clear the values in the new unit fields
                        newUnit.querySelector('input[name="unit_name[]"]').value = '';
                        newUnit.querySelector('textarea[name="unit_description[]"]').value = '';
                    }
                </script>


                <div class="tbl-caption">
                    <h4 class="heading mb-0">Farms</h4>
                </div>
                <div class="d-flex align-items-center">
                    <ul class="nav nav-pills mix-chart-tab user-m-tabe" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{route('exportfarm')}}" class="btn btn-primary btn-sm ms-2"><i class="fa fa-file-excel"></i> Export(csv)</a>

                        </li>
                        <li class="nav-item" role="presentation">
                            <a  class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#newspends"><i class="fa fa-file-user"></i> +Add Employee</a>
                        </li>
                    </ul>
                </div>
                <table id="example" class="display table" style="min-width: 845px">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee</th>
                        <th>Unit</th>
                        <th>Salary</th>
                        <th>Contact Number</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($employee as $farmSetup)
                        <tr>
                            <td>{{ $farmSetup->id }}</td>
                            <td>{{ $farmSetup->name }}</td>
                            <td>{{ $farmSetup->unit }}</td>
                            <td>{{ $farmSetup->salary }}</td>
                            <td>{{ $farmSetup->contact_number }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No farm employee found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
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
                    url: "{{route('employ')}}",
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
