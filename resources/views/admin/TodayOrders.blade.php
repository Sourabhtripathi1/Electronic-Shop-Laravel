@extends('admin.layout.main')

@push('title')
    Today Orders {{ date('Y-m-d') }}
@endpush

@push('heading')
    Orders of {{ date('Y-m-d') }}
@endpush

@section('main-section')


    @if (count($orders) > 0)
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
                                            :₹
                                            {{ getVariantPrice($ord_item['Variant_id'], $variants) * $ord_item['Quantity'] }}
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
                                            <select name="status" class="form-control" style="width: 10px;"
                                                id="order-status" onchange="updateStatus(event)"
                                                data-id="{{ $item['Order_id'] }}">
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
    @else
        <br><br>
        <h1>No Orders Found</h1>
    @endif


@endsection
