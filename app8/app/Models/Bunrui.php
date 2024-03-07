<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bunrui extends Model
{
    use HasFactory;

    protected $table = 'bunruis';
    protected $fillable = [
        'created_at',
        'updated_at',
        'id',
        'str',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    //use HasFactory;

     //bunruisテーブルから::pluckでstrとidを抽出し、$bunruisに返す関数を作る
     public function getLists()
     {
         $bunruis = Bunrui::pluck('str', 'id');
 
         return $bunruis;
     }
     //「カテゴリ(bunrui)はたくさんの商品(products)をもつ」というリレーション関係を定義する
     //public function products()
     public function items()
     {
         return $this->hasMany(Item::class);
     }
}
