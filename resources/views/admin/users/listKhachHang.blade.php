@extends('admin.layouts.layout-basic')

@section('scripts')
    <script src="/assets/admin/js/users/users.js"></script>
    <script>
    let phuong = <?php echo $phuong ?>;
    function onChangeSelect(data){
        var id = data.value; // get selected value
        var index = phuong.findIndex( item => item.ma_phuong == id)
        if(index >= 0){
            let viewItem ="";
            let viewCategory ="";
            if(phuong[index].khuvuc){
                phuong[index].khuvuc.map( (item,index) => {
                    if(index == 0){
                        viewItem += "<option selected value="+item.ma_khu_vuc+">"+item.ten_khu_vuc+"</option>"
                    }
                    else{
                        viewItem += "<option value="+item.ma_khu_vuc+">"+item.ten_khu_vuc+"</option>"
                    }
                })
            }
            document.getElementById(`select-kv`).innerHTML = viewItem;
        }
    };
    </script>
@stop

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Người dùng</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Khách hàng</a></li>
            </ol>
            <div class="page-actions">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".ls-example-modal-lg"><i class="icon-fa icon-fa-plus"></i>Thêm mới</a>
                <button class="btn btn-danger"><i class="icon-fa icon-fa-trash"></i> Xóa </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Danh sách khách hàng</h6>

                        <div class="card-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="users-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Thời gian tạo</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{!! !empty($user->birthday) ?  $user->birthday->format('d/m/Y'): '' !!}</td>
                                <td>{{$user->gender == 0 ? 'Nam' : 'Nữ'}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-default btn-sm"><i class="icon-fa icon-fa-edit"></i> Chỉnh sửa</a>
                                    <a data-toggle='modal' data-target='#confirm{{$user->id}}' class="btn btn-default btn-sm" data-token="{{csrf_token()}}" data-delete data-confirmation="notie"> <i class="icon-fa icon-fa-trash"></i> Xóa</a>
                                    <a href="{{route('users.hoadon',$user->id)}}" class="btn btn-default btn-sm"><i class="icon-fa icon-fa-edit"></i>Hóa đơn</a>
                                </td>
                            </tr>
                            <div class='modal fade' id="confirm{{$user->id}}">
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'><strong>XÁC NHẬN XÓA</strong></h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Tất cả những thông tin liên quan tới người dùng này sẽ bị xóa hết</p>
                                            <p>Bạn có chắc chắn muốn xóa {{$user->name}}?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Hủy</button>
                                            <a href='{{route('users.delete',$user->id)}}'><button type='button' class='btn btn-primary'> Xóa </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <h5 class="modal-title" id="exampleModalLabel">Thêm mới người dùng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('admin.user.create')}}" method="POST">
                        <input type="hidden" name="role" value="Khách hàng">
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputUserName">Tên đăng nhập</label>
                                        <input type="text" class="form-control" id="inputUserName" placeholder="Tên đăng nhập" name="username" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputFirstName">Họ</label>
                                            <input type="text" class="form-control" id="inputFirstName" name="firstname"
                                                placeholder="Nhập họ" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputLastName">Tên</label>
                                            <input type="text" class="form-control" id="inputLastName" name="lastname"
                                                placeholder="Nhập tên" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Email</label>
                                        <input type="text" class="form-control" id="exampleInputEmail" name="email"
                                            aria-describedby="emailHelp" placeholder="Nhập email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPhone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="exampleInputPhone" name="phone"
                                            aria-describedby="phoneHelp" placeholder="Nhập sô điện thoại" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Giới tính</label>

                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="0"
                                                    id="checkMale" required>
                                                <label class="form-check-label" for="checkMale">Nam</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="1"
                                                    id="checkFemale" required>
                                                <label class="form-check-label" for="checkFemale">Nữ</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword">Mật khẩu</label>
                                        <input type="password" class="form-control" name="password"
                                            id="exampleInputPassword1=" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control ls-datepicker" value="" name="birthday" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                        <i class="icon-fa icon-fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputLoaiDien">Loại điện</label><br>
                                        <select class="form-control ls-select2 w-full" name="maloaidien">
                                            @foreach($loaidien as $ld)
                                            <option value="{{$ld->ma_loai_dien}}">{{$ld->ten_loai_dien}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputLoaiDien">Phường</label><br>
                                        <select class="form-control ls-select2 w-100" name="maphuong" required onchange="onChangeSelect(this);">
                                            @foreach($phuong as $p)
                                            <option value="{{$p->ma_phuong}}">{{$p->ten_phuong}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputLoaiDien">Khu vực</label><br>
                                        <select class="form-control ls-select2 w-100" name="makhuvuc" required id="select-kv">
                                            @if(!empty($phuong[0]->khu_vuc))
                                            @foreach($phuong[0]->khu_vuc as $kv)
                                            <option value="{{$kv->ma_khu_vuc}}">{{$kv->ma_khu_vuc}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@stop
