<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuVuc extends Model
{
    protected $table = 'khu_vuc';

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'ma_khu_vuc';

    /**
     * @return mixed
     */
    public function phuong()
    {
        return $this->belongsTo('App\Phuong','ma_phuong', 'ma_phuong');
    }
}