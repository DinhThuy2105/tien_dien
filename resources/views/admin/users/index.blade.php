@extends('admin.layouts.layout-basic')

@section('scripts')
    <script src="/assets/admin/js/users/users.js"></script>
@stop

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Users</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <div class="page-actions">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".ls-example-modal-lg"><i class="icon-fa icon-fa-plus"></i> New User</a>
                <button class="btn btn-danger"><i class="icon-fa icon-fa-trash"></i> Delete </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6>All Users</h6>

                        <div class="card-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="users-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Registered On</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><a href="{{route('users.show',$user->id)}}" class="btn btn-default btn-sm"><i class="icon-fa icon-fa-search"></i> View</a>
                                    <a href="{{route('users.destroy',$user->id)}}" class="btn btn-default btn-sm" data-token="{{csrf_token()}}" data-delete data-confirmation="notie"> <i class="icon-fa icon-fa-trash"></i> Delete</a></td>
                            </tr>
                            @endforeach
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade ls-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Large Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="inputUserName">Username</label>
                                    <input type="text" class="form-control" id="inputUserName" placeholder="Username" name="username">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputFirstName">First Name</label>
                                        <input type="text" class="form-control" id="inputFirstName" name="firstname"
                                            placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputLastName">Last name</label>
                                        <input type="password" class="form-control" id="inputLastName" name="lastname"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputPhone" name="phone"
                                        aria-describedby="phoneHelp" placeholder="Enter phone">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone else.
                                    </small> -->
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>

                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="male"
                                                id="checkMale" >
                                            <label class="form-check-label" for="checkMale">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="female"
                                                id="checkFemale" >
                                            <label class="form-check-label" for="checkFemale">Female</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        id="exampleInputPassword1=" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control ls-datepicker" value="06/10/2017" name="birthday">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                    <i class="icon-fa icon-fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputRole">Role</label><br>
                                    <select class="form-control ls-select2" name="role">
                                        <option value="developing">Admin</option>
                                        <option value="singing">Staff</option>
                                        <option value="reading">User</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
