@extends('admin.layout.main')

@push('title')
    Edit Product :  {{$prod['Product_id']}}
@endpush

@push('heading')
    Edit Product :- {{$prod['Product_name']}}
@endpush

@section('main-section')
    <!-- Content Row -->

    <div class="row">

        <div class="container">
            <form action="/admins-product/{{$prod['Product_id']}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="pname" value="{{$prod['Product_name']}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Material</label>
                    <input type="text" class="form-control" id="" name="material" value="{{$prod['Material']}}">
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
                                }

                                @endphp
                                
                                >{{ $x->Category_Name }}</option>
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
                                }

                                @endphp
                                >{{ $x->Brand_Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dimention</label>
                    <input type="text" class="form-control" name="dimention" value="{{$prod['Dimention']}}">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="desc" rows="3" >{{$prod['Description']}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <br><br><br><br>


            <h2>
                Variants:
            </h2>
        </div>


    </div>

    <!-- /.container-fluid -->
@endsection
