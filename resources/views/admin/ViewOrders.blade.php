@extends('admin.layout.main')

@push('title')
    Orders List
@endpush

@push('heading')
    Orders List
@endpush

@section('main-section')
    <div id="order-search">
        <input class="form-control" type="text" name="search">
        <button class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.25em"
                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <style>
                    svg {
                        fill: #f5f7fa
                    }
                </style>
                <path
                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
            </svg>
        </button>
    </div>

    <!-- Content Row -->
    <div id="admin-orders">

        <table class="table m-1">
            <thead>
                <tr>
                    <th class="order-product" id="order-product-head">
                        <div class="d-flex">
                            <div class="col">
                                Product
                            </div>
                            <h5>Price</h5>
                        </div>
                    </th>

                    <th>Date</th>
                    <th>User</th>
                    <th class="order-address">Address</th>
                    <th style="width: 10rem;">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    @php
                        $ord = getOrders($item['Order_id'], $order_details);
                    @endphp
                    <tr>
                        <td class="order-product">
                            @foreach ($ord as $ord_item)
                                <div class="prod-set">
                                    <div class="prod-img">
                                        <img src="{{ asset('/storage/site-assets/') }}/{{ getVariantImage($ord_item['Variant_id'], $variants, $pictures) }}"
                                            alt="">


                                    </div>
                                    <div class="prod-title" style="display: flex">
                                        {{ getProductName($ord_item['Product_id'], $products) }}
                                        ({{ getVariantColor($ord_item['Variant_id'], $variants) }})
                                        <div class="prod-qnty">
                                            <b>* {{ $ord_item['Quantity'] }}</b>
                                        </div>
                                    </div>


                                    <div class="prod-price">
                                        :{{ getVariantPrice($ord_item['Variant_id'], $variants) * $ord_item['Quantity'] }}
                                    </div>
                                </div>
                            @endforeach


                        </td>
                        <td>{{ $item['Order_Date'] }}</td>
                        <td>{{ $item['Username'] }}</td>
                        <td>{{ $item['Hno'] }}, {{ $item['Address'] }},<br>{{ $item['PINCODE'] }}</td>
                        <td class="order-status">
                            <div id="{{ $item['Order_id'] }}status">
                                {{ $item['Status'] }}
                            </div>
                            <div class="status-form">

                                @if ($item['Status'] == 'Placed')
                                    <select name="status" class="form-control" style="width: 10px;" id="order-status"
                                        onchange="updateStatus(event)" data-id="{{ $item['Order_id'] }}">

                                        <option value="Placed" selected>Placed</option>
                                        <option value="Dispatched">Dispatched</option>
                                        <option value="Dilevered">Dilevered</option>
                                    </select>
                                @else
                                    @if ($item['Status'] == 'Dispatched')
                                        <select name="status" class="form-control" style="width: 10px;" id="order-status"
                                            onchange="updateStatus(event)" data-id="{{ $item['Order_id'] }}">
                                            <option value="Dispatched" selected>Dispatched</option>
                                            <option value="Dilevered">Dilevered</option>
                                        </select>
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function updateStatus(e) {

                var dat = e.target.value;
                var id = e.target.dataset.id;

                $.ajax({
                    type: "get",
                    url: `{{ env('APP_URL') }}/order/status/update`,
                    data: {
                        status: dat,
                        id: id
                    },
                    success: function(response) {

                        console.log(response.result);
                        document.getElementById(`${id}status`).innerHTML = dat;
                        if (dat == 'Dilevered') {
                            e.target.style.display = "none";
                        }

                        if (dat == 'Dispatched') {
                            e.target.remove(e.target.options[0]);

                        }

                    }
                });
            }
        </script>



    </div>
    <!-- /.container-fluid -->
@endsection
