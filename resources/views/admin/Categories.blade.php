@extends('admin.layout.main')

@push('title')
    Categories
@endpush

@push('heading')
    Categories
@endpush

@section('main-section')
    <!-- Content Row -->
    <div class="row">

        <div class="container">
            <form action="/admins-category" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="" name="Category_name" required>
                </div>
                @error('Category_name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="" class="form-label">Add Category Pic</label>
                    <input type="file" class="form-control" name="category_pic" id="" required>
                </div>
                @error('category_pic')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <br><br>

            @if (count($Categories) > 0)
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Category Pic</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($Categories as $c)
                            <tr>
                                <td>{{ $c['Category_Name'] }}</td>
                                <td>
                                    <img class="" style="max-height: 120px;" alt=""
                                        src="{{ asset('/storage/site-assets/') }}/@php
array_filter($pictures, function ($val) use ($c) {
                                    if ($val['Picture_id'] == $c['Category_Pic']) {
                                        echo $val['Source'];
                                    }
                                }); @endphp">
                                </td>
                                <td>
                                    <div style="display: flex; ">

                                        <div class="mx-2">
                                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#Modal{{ $c['Category_Name'] }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                    viewBox="0 0 512 512">
                                                    <style>
                                                        svg {
                                                            fill: #f9fafb
                                                        }
                                                    </style>
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                </svg>
                                            </button>

                                            <div class="modal fade" id="Modal{{ $c['Category_Name'] }}" tabindex="999"
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
                                                        <form action="/admins-category/{{ $c['Category_id'] }}"
                                                            method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label>Category Name</label>
                                                                    <input type="text" class="form-control"
                                                                        name="edCatna" id=""
                                                                        value="{{ $c['Category_Name'] }}">
                                                                    <small id="helpId" class="form-text text-muted">Help
                                                                        text</small>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Category Picture</label>
                                                                    <input type="file" class="form-control"
                                                                        name="edCatpic">
                                                                    <p class="form-text text-muted">
                                                                        Select if want to update Category pic
                                                                    </p>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <form action="/admins-category/{{ $c['Category_id'] }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.25em"
                                                    viewBox="0 0 448 512">
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


                    </tbody>
                </table>
            @endif


        </div>
    </div>


    <!-- /.container-fluid -->
@endsection
