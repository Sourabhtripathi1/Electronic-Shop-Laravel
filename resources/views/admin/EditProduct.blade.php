@extends('admin.layout.main')

@push('title')
    Edit Product : {{ $prod['Product_id'] }}
@endpush

@push('heading')
    Edit Product :- {{ $prod['Product_name'] }}
@endpush

@section('main-section')
    <!-- Content Row -->

    <div class="row">

        <div class="container">
            <form action="/admins-product/{{ $prod['Product_id'] }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="pname" value="{{ $prod['Product_name'] }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Material</label>
                    <input type="text" class="form-control" id="" name="material"
                        value="{{ $prod['Material'] }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-control" name="category">
                        <option selected disabled>Select Category:</option>
                        @foreach ($cat as $x)
                            <option value="{{ $x->Category_id }}"
                                @php
if ($x->Category_id==$prod['Category']) {
                                    echo "selected";
                                } @endphp>
                                {{ $x->Category_Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label" name="brand">Brand</label>
                    <select class="form-control" name="brand">
                        <option selected disabled>Select Brand:</option>
                        @foreach ($br as $x)
                            <option value="{{ $x->Brand_id }}"
                                @php
if ($x->Brand_id==$prod['Brand']) {
                                    echo "selected";
                                } @endphp>
                                {{ $x->Brand_Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dimention</label>
                    <input type="text" class="form-control" name="dimention" value="{{ $prod['Dimention'] }}">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="desc" rows="3">{{ $prod['Description'] }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <br>

            <hr> <br> <br>

            <div class="var-cont">
                <h2>
                    Variants:
                </h2>

                <div>
                    <button class="btn btn-primary " data-toggle="modal" data-target="#ModalAddVariant">
                        Add Variant
                    </button>
                </div>
                <div class="modal fade" id="ModalAddVariant" tabindex="999" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Variant</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="/admins-product/variant" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <input type="text" class="form-control d-none" id="hiddenTextBox" name="product"
                                        value="{{ $prod['Product_id'] }}">

                                    <div class="container">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Color</label>
                                            <input type="text" class="form-control" name="color">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Stock</label>
                                            <input type="text" class="form-control" name="stock">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Price</label>
                                            <input type="text" class="form-control" name="price">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Choose Pictures</label>
                                            <input type="file" class="form-control" name="pics[]" id=""
                                                placeholder="" aria-describedby="fileHelpId" multiple>

                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Variant
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <br> <br>

            @if (count($var) > 0)
                <br>

                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Color</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($var as $v)
                        <tr>
                            <td>{{ $v['Color'] }}</td>
                            <td>{{ $v['Stock'] }}</td>
                            <td>{{ $v['Price'] }}</td>
                            <td>
                                @php

                                    $check = json_decode($v['Picture'], true);

                                    $x = array_filter($pics, function ($pic) use ($check) {
                                        if (in_array($pic['Picture_id'], $check)) {
                                            return $pic;
                                        }
                                    });

                                @endphp

                                {{ count($x) }}

                            </td>
                            <td>
                                <div class="d-flex">

                                    <div class="mx-1">

                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#Modal{{ $v['variant_id'] }}">
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


                                        <div class="modal fade" id="Modal{{ $v['variant_id'] }}" tabindex="999"
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

                                                    <form action="/admins-product/variant/{{ $v['variant_id'] }}"
                                                        method="post" enctype="multipart/form-data"
                                                        id="editVariantForm{{ $v['variant_id'] }}">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="container">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Color</label>
                                                                    <input type="text" class="form-control"
                                                                        name="color" value="{{ $v['Color'] }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Stock</label>
                                                                    <input type="text" class="form-control"
                                                                        name="stock" value="{{ $v['Stock'] }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Price</label>
                                                                    <input type="text" class="form-control"
                                                                        name="price" value="{{ $v['Price'] }}">
                                                                </div>
                                                            </div>

                                                            @foreach ($x as $p)
                                                                <div class="prologo-container">
                                                                    <img height="100px" width="150px"
                                                                        src="{{ asset('/storage/site-assets/') }}/{{ $p['Source'] }}"
                                                                        class="prologo ">
                                                                    <div class="delete-container">
                                                                        <a class="deletelogo"
                                                                            href="{{ env('APP_URL') }}/del/{{ $v['variant_id'] }}/{{ $p['Picture_id'] }}">
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-sm"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    height="1em" viewBox="0 0 448 512">
                                                                                    <style>
                                                                                        svg {
                                                                                            fill: #fafcff
                                                                                        }
                                                                                    </style>
                                                                                    <path
                                                                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                                                </svg></button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            <input type="submit" class="d-none">
                                                    </form>
                                                    <form action="{{ env('APP_URL') }}/add/{{ $v['variant_id'] }}"
                                                        method="post" id="submitimg{{ $v['variant_id'] }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" class="btn btn-primary btn-sm"
                                                            onChange="addImg{{ $v['variant_id'] }}()" name="img">

                                                    </form>

                                                    <script>
                                                        function addImg{{ $v['variant_id'] }}() {
                                                            const myform = document.getElementById('submitimg{{ $v['variant_id'] }}');
                                                            myform.submit()


                                                        }
                                                    </script>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onClick="editVariantForm{{ $v['variant_id'] }}()">Update
                                                    </button>
                                                </div>

                                                <script>
                                                    function editVariantForm{{ $v['variant_id'] }}(){
    const myform=document.getElementById('editVariantForm{{ $v['variant_id'] }}');
     myform.submit()

}
                                                </script>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <form method="post"
                                    action="{{ env('APP_URL') }}/admins-product/variant/{{ $v['variant_id'] }}">
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
        </div>
        </td>
        </tr>
        @endforeach
        </table>

        <br><br><br><br>
        @endif




    </div>

    </div>

    <!-- /.container-fluid -->
@endsection
