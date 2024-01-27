@extends('layouts.sidebar')
@section('tittle', 'All Customer')
@section('content')

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
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <ul class="nav nav-pills mix-chart-tab user-m-tabe" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="{{route('exportcus')}}" class="btn btn-primary btn-sm ms-2"><i class="fa fa-file-excel"></i> Export(csv)</a>

                        </li>
                        <li class="nav-item" role="presentation">
                            <a  class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#newspends"><i class="fa fa-file-user"></i> +Add User</a>
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
                                            <p class="mb-1">Create Customer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <form id="farm" class="subscribe">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_number">Contact Number:</label>
                                        <input type="text" name="contact_number" class="form-control" required>
                                    </div>
                                    <br/>
                                    <button type="submit" class="btn btn-success submit-btn">Create Customer</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="table-responsive active-projects">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">Customer List</h4>
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
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Action</th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->contact_number }}</td>
                                <td>
                                    <!-- Add edit, update, delete buttons as needed -->
                                    <a href="#" onclick="openModal(this)" data-user-id="{{$customer->id}}" data-user-name="{{$customer->name}}"><i class="fa fa-pencil"></i> </a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No customers found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <style>
        /* Add your CSS styles here */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: white;
            width: 60%;
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
    <div class="modal" id="editModal">
        <div class="modal-content">
            <form id="dataForm" >
                @csrf
                <div class="card card-body">
                    <p>EDIT CUSTOMER</p>
                    {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                    <br/>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" id="plan"  name="name" value="" required />
                        <input type="hidden" class="form-control" id="id" name="id" value="" required />
                    </div>
                    <br/>
                    <div id="div_id_network" >
                        <label for="network" class=" requiredField">
                            Contact Number<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <input type="number" id="number" name="contact_number"  class="text-success form-control" required>
                        </div>
                    </div>

                    <br/>
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </form>
            <button class="btn btn-outline-danger" onclick="closeModal()">Cancel</button>
        </div>
    </div>
    <script>
        function openModal(element) {
            const modal = document.getElementById('editModal');
            const newNameInput = document.getElementById('id');
            const net = document.getElementById('plan');
            const userId =element.getAttribute('data-user-id');
            const userName = element.getAttribute('data-user-name');



            newNameInput.value = userId;
            net.value = userName;

            console.log(newNameInput);
            console.log(net);
            modal.style.display = 'block';
            // You can fetch user data using the userId and populate the input fields in the modal if needed
        }

        function closeModal() {
            const modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

        function saveChanges() {
            // Add code here to save the changes and update the table
            closeModal();
        }
    </script>

    <script>
        $(document).ready(function() {


            // Send the AJAX request
            $('#farm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                // The user clicked "Yes", proceed with the action
                // Add your jQuery code here
                // For example, perform an AJAX request or update the page content
                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{route('createcustomer')}}",
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
                    url: "{{route('editcustomer')}}",
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
