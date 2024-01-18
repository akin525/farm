@extends('layouts.sidebar')
@section('tittle', 'Create Farm')
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
    <div class="widget-stat card bg-primary">
        <div class="card-body  p-4">
            <div class="media">
									<span class="me-3">
										<i class="la la-bookmark"></i>
									</span>
                <div class="media-body text-white">
                    <p class="mb-1">Create Farm</p>
{{--                    <h3 class="text-white">Sales</h3>--}}

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="card card-body">
            <form class="subscribe" id="dataForm">
        @csrf
        <!-- Add form fields for product_name, quantity, unit_price, and sale_date -->
            <x-validation-errors class="alert alert-danger" />

            <div class="row">
                <div class="col-lg-6 mb-2">
                    <div class="mb-3">
                        <label class="text-label form-label">Farm Name:</label>
                        <input type="text" name="farmname" class="form-control" placeholder="Parsley" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="mb-3">
                        <label class="text-label form-label">Contact Number*</label>
                        <input type="number" name="number" class="form-control" placeholder="Montana" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="mb-3">
                        <label class="text-label form-label">Unit Name*</label>
                        <input type="text" name="unit_name[]" class="form-control" placeholder="Montana" required>
                    </div>
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="mb-3">
                        <label class="text-label form-label" for="unit_description">Unit Description:</label>
                        <textarea name="unit_description[]" class="form-control" rows="3" required></textarea>
                    </div>
                    <div id="additional_units"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-success submit-btn">Create Farm</button>
        </form>
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
    <script>
        $(document).ready(function () {
            // Add an event listener to the select input
            $('#productSelect').on('change', function () {
                // Get the selected product's id
                var productId = $(this).val();

                // Make an AJAX request to fetch the remaining quantity and unit price
                $.ajax({
                    url: '/get-product-details', // Replace with your actual route
                    type: 'GET',
                    data: {id: productId},
                    success: function (response) {
                        // Update the values of the remainingQuantity and unitPrice inputs
                        $('#remainingQuantity').val(response.quantity);
                        $('#unitPrice').val(response.unit_price);
                    },
                    error: function (error) {
                        console.error('Error fetching product details:', error);
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
                    url: "{{route('farm')}}",
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
                                // location.reload(); // Reload the page
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
