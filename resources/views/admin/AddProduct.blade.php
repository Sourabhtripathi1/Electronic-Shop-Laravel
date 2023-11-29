@extends('admin.layout.main')

@push('title')
    Add Product
@endpush

@push('heading')
    Add Product
@endpush

@section('main-section')


    @if (count($errors) > 0)
        {{-- <pre>
        {{print_r($errors)}}
    </pre> --}}

        <div class="alert alert-danger">
            <ul style="margin: 0.75rem 0rem">
                @if ($errors->has('Color.*'))
                    <li>{{ $errors->first('Color.*') }}</li>
                @endif
                @if ($errors->has('Price.*'))
                    <li> {{ $errors->first('Price.*') }}</li>
                @endif
                @if ($errors->has('Stock.*'))
                    <li> {{ $errors->first('Stock.*') }}</li>
                @endif
                @if ($errors->has('Picture.*'))
                    <li> {{ $errors->first('Picture.*') }}</li>
                @endif
            </ul>
        </div>
    @endif

    <!-- Content Row -->

    <div class="row">
        <div class="container">
            <form action="/admins-product" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="" name="pname" required>
                    <br>
                    @error('pname')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Material</label>
                    <input type="text" class="form-control" id="" name="material" required>
                    <br>
                    @error('material')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-control" name="category" required>
                        <option selected disabled>Select Category:</option>
                        @foreach ($cat as $x)
                            <option value="{{ $x->Category_id }}">{{ $x->Category_Name }}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('category')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label" name="brand">Brand</label>
                    <select class="form-control" name="brand" required>
                        <option selected disabled>Select Brand:</option>
                        @foreach ($br as $x)
                            <option value="{{ $x->Brand_id }}">{{ $x->Brand_Name }}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('brand')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dimention</label>
                    <input type="text" class="form-control" id="" name="dimention" required>
                    <br>
                    @error('dimention')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
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
                    <textarea class="form-control" name="desc" id="" rows="3" required></textarea>
                    <br>
                    @error('desc')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
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
