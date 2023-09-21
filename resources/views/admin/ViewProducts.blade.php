@extends('admin.layout.main')

@push('title')
    View Product
@endpush

@push('heading')
    Product List
@endpush

@section('main-section')
    <!-- Content Row -->


    @if (count($Products) > 0)
        <div class="row">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Material</th>
                        <th>Variants</th>
                        <th>Dimention</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($Products as $p)
                        <tr>
                            <td>{{ $p['Product_name'] }}</td>
                            <td>
                                @php
                                    
                                    array_filter($Brands, function ($val) use ($p) {
                                        if ($p['Brand'] == $val['Brand_id']) {
                                            echo $val['Brand_Name'];
                                        }
                                    });
                                    
                                @endphp
                            </td>
                            <td>

                                @php
                                    array_filter($Category, function ($val) use ($p) {
                                        if ($p['Category'] == $val['Category_id']) {
                                            echo $val['Category_Name'];
                                        }
                                    });
                                @endphp

                            </td>
                            <td>{{ $p['Material'] }}</td>
                            <td>
                                @php
                                    
                                    $x = array_filter($Variants, function ($val) use ($p) {
                                        if ($p['Product_id'] == $val['Product_id']) {
                                            return $val;
                                        }
                                    });
                                    
                                @endphp

                                @php
                                    echo count($x);
                                @endphp


                            </td>
                            <td>{{ $p['Dimention'] }}</td>
                            <td class="d-flex">

                                <div class="mx-1">
                                    <a href="">
                                        <button class="btn btn-primary btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 576 512">
                                                <style>
                                                    svg {
                                                        fill: #ffffff
                                                    }
                                                </style>
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                                <div class="mx-1">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#Modal{{ $p['Product_id'] }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                                            <style>
                                                svg {
                                                    fill: #f9fafb
                                                }
                                            </style>
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                        </svg>
                                    </button>

                                    <div class="modal fade" id="Modal{{ $p['Product_id'] }}" tabindex="999"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $p['Product_name'] }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <form action="/admins-product/{{ $p['Product_id'] }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 448 512">
                                            <style>
                                                svg {
                                                    fill: #ffffff
                                                }
                                            </style>
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @else
        <br><br>
        <h2>There is no records</h2>
        <br>
        <a href="/admins-product/create" class=""><button class="btn btn-primary">Create new Product</button></a>
    @endif


    <!-- /.container-fluid -->
@endsection
