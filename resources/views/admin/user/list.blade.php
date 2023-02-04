@extends('admin.layouts.master')

@section('title','User list page')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h2 class="title-1 fw-bold text-center mt-2 mb-4">Order List</h2>
                <button class="btn btn-sm btn-dark  fs-6 disabled">
                    <i class="fa-solid fa-users me-2"></i>~
                    {{ $users->total() }}</button>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2 text-center">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th class="col-2">Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="dataList">
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    @if($user->image == null)
                                    @if($user->gender == 'male')
                                    <img src="{{ asset('image/defaultProfile.jpg') }}" class="img-thumbnail shadow-sm">
                                    @else
                                    <img src="{{ asset('image/defaultFemaleProfile.jpg') }}"
                                        class="img-thumbnail shadow-sm" alt="">
                                    @endif
                                    @else
                                    <img src="{{ asset('storage/'.$user->image) }}" class="img-thumbnail shadow-sm"
                                        alt="">
                                    @endif
                                </td>
                                <input type="hidden" id="userId" value="{{ $user->id }}">
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <select class="statusChange form-control custom-select">
                                        <option value="user" @if($user->role == 'user') selected @endif >User</option>
                                        <option value="admin" @if($user->role == 'admin') selected @endif >Admin
                                        </option>
                                    </select>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3 me-5">
                        {{ $users->links() }}
                    </div>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection

@section('scriptSection')
<script>
$(document).ready(function() {
    //status change
    $('.statusChange').change(function() {
        $currentStatus = $(this).val();
        console.log($currentStatus);
        $parentNode = $(this).parents('tr');
        $userId = $parentNode.find('#userId').val();

        $data = {
            'userId': $userId,
            'role': $currentStatus,
        };

        $.ajax({
            type: 'get',
            url: 'http://127.0.0.1:8000/user/changeRole',
            data: $data,
            dataType: 'json',
        })

        location.reload();
    })

});
</script>
@endsection