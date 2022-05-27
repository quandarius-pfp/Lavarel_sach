<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucTruyen extends Model
{
    use HasFactory;
    public  $timestamps = false;
    protected $fillable = [
        'tendanhmuc', 'mota','kichhoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_danhmuc';
    public function truyen(){
        return $this->hasMany('App\Models\Truyen');
    }
}
    
    
