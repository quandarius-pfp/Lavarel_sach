<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;

    public  $timestamps = false;
    protected $fillable = [
        'tentruyen', 'tomtat','kichhoat','slug_truyen','hinhanh','danhmuc_id','theloai_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_truyen';
    public function danhmuctruyen(){
        return $this->belongsTo('App\Models\DanhMucTruyen','danhmuc_id','id');
    }
    public function theloai(){
        return $this->belongsTo('App\Models\TheLoai','theloai_id','id');
    }
    public function chapter(){
        return $this->hasMany('App\Models\Chapter','truyen_id','id');
    }
}
