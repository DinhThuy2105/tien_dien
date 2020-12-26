<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.users.index')->with('users', $users);
    }

    public function getAdmin()
    {
        $users = User::where('role','Admin')->get();
        return view('admin.users.listAdmin')->with('users', $users);
    }

    public function getKhachHang()
    {
        $users = User::where('role','Khách Hàng')->get();
        return view('admin.users.listKhachHang')->with('users', $users);
    }

    public function getNhanVien()
    {
        $users = User::where('role','Nhân Viên')->get();
        return view('admin.users.listNhanVien')->with('users', $users);
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show')->with('user', $user);
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
        $user->password = $request['password'];
        $user->birthday =  date('Y-m-d', strtotime($request['birthday']));
        $user->role = $request['role'];
        $user->save();
        $users = User::get();
        return view('admin.users.index')->with('users', $users);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // flash('User Deleted')->success();

        return redirect()->back();
    }
}
