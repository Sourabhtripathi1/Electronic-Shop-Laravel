@extends('admin.layout.main')

@push('title')
Customers List
@endpush

@push('heading')
Customers List
@endpush

@section('main-section')

<!-- Content Row -->
<div class="row">

    <table class="table m-1">
        <thead>
            <tr>
                <th>Email</th>
                <th>User ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Total Orders</th>
            </tr>
        </thead>
        <tbody>
@foreach ($users as $item)

<tr>
    <td>{{$item['Email']}}</td>
    <td >{{$item['User_id']}}</td>
    <td>{{$item['Username']}}</td>
    <td>{{$item['Name']}}</td>
    <td>{{getOrderCount($item['User_id'],$orders)}}</td>
</tr>
@endforeach
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->


@endsection
