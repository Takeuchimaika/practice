<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bunrui;

class Item extends Model
{
    use HasFactory;
    //「商品(products)はカテゴリ(category)に属する」というリレーション関係を定義する
    public function bunrui()
    {
        return $this->belongsTo(Bunrui::class);
    }

    protected $table = 'items';

    protected $fillable = [
        'image',
        'name',
        'kakaku',
        'zaiko',
        'bunrui',
        'syosai',
        'updated_at',
        'created_at',
    ];
}
