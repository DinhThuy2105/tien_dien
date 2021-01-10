<?php
namespace App\Http\Controllers;

use App\User;
use App\LoaiDien;
use App\Phuong;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    public function index()
    {
        $loaidien = LoaiDien::get();
        $users = User::with('loaidien')->get();
        return view('admin.users.index')->with(['users' => $users, 'loaidien' => $loaidien]);
    }

    public function getAdmin()
    {
        $loaidien = LoaiDien::get();
        $phuong = Phuong::with('khuvuc')->get();
        $users = User::with('loaidien')->where('role','Admin')->get();
        return view('admin.users.listAdmin')->with(['users' => $users, 'loaidien' => $loaidien, 'phuong' => $phuong]);
    }

    public function getKhachHang()
    {
        $loaidien = LoaiDien::get();
        $phuong = Phuong::with('khuvuc')->get();
        $users = User::with('loaidien')->where('role','Khách Hàng')->get();
        return view('admin.users.listKhachHang')->with(['users' => $users, 'loaidien' => $loaidien, 'phuong' => $phuong]);
    }

    public function getNhanVien()
    {
        $loaidien = LoaiDien::get();
        $phuong = Phuong::with('khuvuc')->get();
        $users = User::with('loaidien')->where('role','Nhân Viên')->get();
        return view('admin.users.listNhanVien')->with(['users' => $users, 'loaidien' => $loaidien, 'phuong' => $phuong]);
    }

    public function getHoaDon($id){
        $user = User::findOrFail($id);
        $hoadon = $user->dienke()->with('hoadon', 'hoadon.chitiethd')->get();
        return view('admin.users.listHoaDon')->with(['user' => $user, 'hoadon' => $hoadon]);
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::with('khuvuc', 'khuvuc.phuong')->findOrFail($id);
        $loaidien = LoaiDien::get();
        $phuong = Phuong::with('khuvuc')->get();

        return view('admin.users.edit')->with(['user' => $user, 'loaidien' => $loaidien, 'phuong' => $phuong]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request['username'];
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->gender = (int)$request['gender'];
        $user->ma_khu_vuc = $request['makhuvuc'];
        if(!empty($request['password'])){
            $user->password = bcrypt($request['password']);
        }
        $user->birthday =  date('Y-m-d', strtotime($request['birthday']));
        // $user->role = $request['role'];
        $user->ma_loai_dien = $request['maloaidien'];

        $user->save();
        $users = User::get();
        if($request['role'] == "Admin"){
            return redirect()->route('admin.user.admin');
        }
        if($request['role'] == "Khách hàng"){
            return redirect()->route('admin.user.khachhang');
        }
        return redirect()->route('admin.user.nhanvien');
    }

    public function create(Request $request)
    {

        $user = new User();
        $user->name = $request['username'];
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->gender = (int)$request['gender'];
        $user->password = bcrypt($request['password']);
        $user->birthday =  date('Y-m-d', strtotime($request['birthday']));
        $user->role = $request['role'];
        $user->ma_khu_vuc = $request['makhuvuc'];
        $user->ma_loai_dien = $request['maloaidien'];
        $user->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // flash('User Deleted')->success();

        return redirect()->back();
    }
}
