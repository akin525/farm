@extends('layouts.sidebar')
@section('tittle', 'Sales Create')
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
    <div class="widget-stat card bg-primary">
        <div class="card-body  p-4">
            <div class="media">
									<span class="me-3">
										<i class="la la-bookmark"></i>
									</span>
                <div class="media-body text-white">
                    <p class="mb-1">Create Sales Record</p>
                    <h3 class="text-white">Sales</h3>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="loading-overlay" id="loadingSpinner" style="display: none;">
            <div class="loading-spinner"></div>
        </div>
        <div class="card card-body">
            <form class="subscribe" action="{{ route('sales.store') }}" method="post">
        @csrf
        <!-- Add form fields for product_name, quantity, unit_price, and sale_date -->

            <div id="div_id_network" class="form-group">
                <label for="network" class=" requiredField">
                    Product Name:<span class="asteriskField">*</span>
                </label>
                <div class="">
                    <input type="text" class="text-success form-control" name="product_name" required>

                </div>
            </div>
            <div id="div_id_network" class="form-group">
                <label for="network" class=" requiredField">
                    Quantity:<span class="asteriskField">*</span>
                </label>
                <div class="">
                    <input type="number" class="text-success form-control" name="quantity" required>

                </div>
            </div>
            <div id="div_id_network" class="form-group">
                <label for="network" class=" requiredField">
                    Unit Price:<span class="asteriskField">*</span>
                </label>
                <div class="">
                    <input type="number" class="text-success form-control" name="unit_price" required>

                </div>
            </div>
            <div id="div_id_network" class="form-group">
                <label for="network" class=" requiredField">
                    Sale Date:<span class="asteriskField">*</span>
                </label>
                <div class="">
                    <input type="date" class="text-success form-control" name="sale_date" required>

                </div>
            </div>

            <button type="submit" class="submit-btn">Create Sale</button>
        </form>
        </div>

    </div>

@endsection
