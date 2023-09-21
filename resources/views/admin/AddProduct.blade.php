@extends('admin.layout.main')

@push('title')
    Add Product
@endpush

@push('heading')
    Add Product
@endpush

@section('main-section')
    <!-- Content Row -->

    <div class="row">
        <div class="container">
            <form action="/admins-product" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="" name="pname">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Material</label>
                    <input type="text" class="form-control" id="" name="material">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-control" name="category">
                        <option selected disabled>Select Category:</option>
                        @foreach ($cat as $x)
                            <option value="{{ $x->Category_id }}">{{ $x->Category_Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label" name="brand">Brand</label>
                    <select class="form-control" name="brand">
                        <option selected disabled>Select Brand:</option>
                        @foreach ($br as $x)
                            <option value="{{ $x->Brand_id }}">{{ $x->Brand_Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dimention</label>
                    <input type="text" class="form-control" id="" name="dimention">
                </div>

                <br><br>
                <div id="variantContainer">
                    <h2>Variants :</h2>
                </div>
                <br>
                <div class="mb-3">
                    <label for="" class="form-label">Add Variants:</label>&nbsp;&nbsp;&nbsp;&nbsp;

                    <button type="button" class="btn btn-primary" id="remove-variant" onclick="removeVariant()">-</button>

                    <input type="text" class="Variant-control" id="var_no" value="0" name="var_no" readonly>

                    <button type="button" class="btn btn-primary" id="add-variant" onclick="addVariant()">+</button>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="desc" id="" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <br><br><br><br><br><br>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            addVariant()
        })
    </script>
    </div>
    <!-- /.container-fluid -->
@endsection
