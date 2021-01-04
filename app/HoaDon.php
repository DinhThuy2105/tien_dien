<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_don';

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'ma_hoa_don';

    // /**
    //  * @return mixed
    //  */
    // public function loaidien()
    // {
    //     return $this->belongsTo('App\LoaiDien','ma_gia_dien','ma_loai_dien');
    // }

    /**
     * @return mixed
     */
    public function chitiethd()
    {
        return $this->hasMany('App\ChiTietHoaDon','ma_hoa_don', 'ma_hoa_don');
    }
}