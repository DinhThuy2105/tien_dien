<?php
namespace App\Http\Controllers;

use App\LoaiDien;
use App\GiaDien;
use App\DienKe;
use App\HoaDon;
use App\ChiTietHoaDon;
use App\User;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    public function update(Request $request, $id)
    {
        $hoadon = DienKe::where('ma_dien_ke', $id)->firstOrFail()->hoadon;

        $hoadon->trang_thai = true;
        $hoadon->save();

        return redirect()->route('users.hoadon');
    }

    
}
