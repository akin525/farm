@extends('layouts.sidebar')
@section('tittle', 'All Inventory')
@section('content')
    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive active-projects">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">All Inventory</h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{route('exportin')}}" class="btn btn-primary btn-sm ms-2"><i class="fa fa-file-excel"></i> Export(csv)</a>
                    </div>
                    <table id="example" class="display table" style="min-width: 845px">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit-Price</th>
                            <th>Purchase-Date</th>
                            <th>Edit</th>
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
                                <td>{{$dat->purchase_date}}</td>
                                <td>
                                    <a href="#" onclick="openModal(this)" data-user-id="{{$dat->id}}" data-user-name="{{$dat->product_name}}"><i class="fa fa-pencil"></i> </a>
                                </td>
                            </tr>
                        @endforeach
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
                    <p>EDIT INVENTORY</p>
                    {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                    <br/>
                    <div class="form-group">
                        <label>Product-Name</label>
                        <input type="text" class="form-control" id="plan"  name="product_name" value="" readonly />
                        <input type="hidden" class="form-control" id="id" name="id" value="" required />
                    </div>
                    <br/>
                    <div id="div_id_network" >
                        <label for="network" class=" requiredField">
                            Quantity<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <input type="number" id="amount" name="quantity"  class="text-success form-control" required>
                        </div>
                    </div>
                    <br/>
                    <div id="div_id_network" >
                        <label for="network" class=" requiredField">
                            Unit Price<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <input type="number" id="amount" name="unit_price"  class="text-success form-control" required>
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
            $('#dataForm').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get the form data
                var formData = $(this).serialize();
                // The user clicked "Yes", proceed with the action
                // Add your jQuery code here
                // For example, perform an AJAX request or update the page content
                $('#loadingSpinner').show();

                $.ajax({
                    url: "{{route('update')}}",
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
