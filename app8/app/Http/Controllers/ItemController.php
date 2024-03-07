<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

use App\Models\Bunrui;



class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //メーカー名表記にする
        $item = Item::with('bunrui')->find(1);
        ////echo $item->bunrui->str;

        //メーカー名がでるように、並び方も順番通りに
        

         //入力される値nameの中身を定義する
         $searchWord = $request->input('searchWord'); //商品名の値
         $bunruiId = $request->input('bunruiId'); //カテゴリの値


        $query = Item::query();
        //商品名が入力された場合、m_productsテーブルから一致する商品を$queryに代入
        if (isset($searchWord)) {
            $query->where('name', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリが選択された場合、bunruisテーブルからbunrui_idが一致する商品を$queryに代入
        if (isset($bunruiId)) {
            $query->where('bunrui', $bunruiId);
        }

        //id順に並び替える　エラーでる
        //$items = Item::orderBy('id', 'asc')->get();
        //return view('items.index', compact('items'));

        //$queryをbunrui_idの昇順に並び替えて$itemsに代入
        $items = $query->orderBy('bunrui', 'asc')->paginate(15);

        //bunruisテーブルからgetLists();関数でstrとidを取得する
        $bunrui = new Bunrui;
        $bunruis = $bunrui->getLists();

        return view('search', [
            'items' => $items,
            'bunruis' => $bunruis,
            'searchWord' => $searchWord,
            'bunruiId' => $bunruiId
        ]);



        return view('item.index');


        $bunruis = Bunrui::all();
        return view('index')
            ->with('bunruis',$bunruis);
        //$items = Item::latest()->paginate(5);

        //return view('index',compact('items'))
           //->with('i',(request()->input('page',1)-1)*5);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('item.create');


        $bunruis = Bunrui::all();
        return view('create')
            ->with('bunruis',$bunruis);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $item)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif', // 画像のバリデーションルールを設定
            'name'=>'required|max:20',
            'bunrui'=>'required|integer',
            'kakaku'=>'required|integer',
            'zaiko'=>'required|integer',
            'shosai'=>'max:140',
        ]);

        //画像フォームでリクエストした画像情報を取得
        $img = $request->file('image');
        //画面情報がセットされていれば、保存処理を実行
        if (isset($img)) {
        // storage > public > img配下に画像が保存される
        $path = $img->store('img','public');
            // store処理が実行できたらDBに保存処理が実行
        if ($path) {
            //DBに登録する処理
            //$item->image = $path;
            // DBに登録する処理
        Item::create([
            'image' => $path,
            'name' => $request->input("name"),
            'bunrui' => $request->input("bunrui"),
            'kakaku' => $request->input("kakaku"),
            'zaiko' => $request->input("zaiko"),
            'shosai' => $request->input("shosai"),
        ]);
        }
        }


        $item = new Item;
        
        $item->name = $request->input("name");
        $item->bunrui = $request->input("bunrui");
        $item->kakaku = $request->input("kakaku");
        $item->zaiko = $request->input("zaiko");
        $item->shosai = $request->input("shosai");
        $item->save();
        
        //リダイレクト
        return redirect()->route('items.index');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $item = new Item;
        

        $bunruis = Bunrui::all();
        //return view('show',compact('item'))
        //    ->with('bunruis',$bunruis);

         //フォームを機能させるために各情報を取得し、viewに返す
         //$item = new Item;
         $bunrui = new Bunrui;

         $bunruis = $bunrui->getLists();
         $searchWord = $request->input('searchWord');
         $bunruiId = $request->input('bunruiId');
 
         return view('search', [
             'bunruis' => $bunruis,
             'searchWord' => $searchWord,
             'bunruiId' => $bunruiId,
         ]);
        //
        return view('show',compact('item'))
        ->with('bunruis',$bunruis);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $bunruis = Bunrui::all();

        return view('edit',compact('item'))
            ->with('bunruis',$bunruis);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'name'=>'required|max:20',
            'bunrui'=>'required|integer',
            'kakaku'=>'required|integer',
            'zaiko'=>'required|integer',
            'shosai'=>'max:140',
        ]);
        //画像フォームでリクエストした画像情報を取得
        $img = $request->file('image');
        //画面情報がセットされていれば、保存処理を実行
        if (isset($img)) {
        // storage > public > img配下に画像が保存される
        $path = $img->store('img','public');
        // store処理が実行できたらDBに保存処理が実行
        if ($path) {
            //DBに登録する処理
            $item->image = $path;

        }
        }

        $item->name = $request->input("name");
        $item->bunrui = $request->input("bunrui");
        $item->kakaku = $request->input("kakaku");
        $item->zaiko = $request->input("zaiko");
        $item->shosai = $request->input("shosai");
        $item->save();
        
        return redirect()->route('items.index')->with('success','商品を更新いたしました');
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //アイテムテーブルから指定のIDのレコード一件を取得
       $item = Item::find($id);
       //レコードを削除
       $item->delete();
       //削除したら一覧画面にリダイレクト
       //indexの部分をsearchかshowに変更しなくてはいけない。
       return redirect()->route('items.index');

        //
    }

     /*==================================
    検索メソッド(search)
    ==================================*/
    public function search(Request $request)
    {
        //メーカー名表記にする
        $item = Item::with('bunrui')->find(1);

        //入力される値nameの中身を定義する
        $searchWord = $request->input('searchWord'); //商品名の値
        $bunruiId = $request->input('bunruiId'); //カテゴリの値

        $query = Item::query();
        //商品名が入力された場合、m_productsテーブルから一致する商品を$queryに代入
        if (isset($searchWord)) {
            $query->where('name', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリが選択された場合、bunruisテーブルからbunrui_idが一致する商品を$queryに代入
        if (isset($bunruiId)) {
            $query->where('bunrui', $bunruiId);
        }

        //$queryをbunrui_idの昇順に並び替えて$itemsに代入
        $items = $query->orderBy('bunrui', 'asc')->paginate(15);

        //bunruisテーブルからgetLists();関数でstrとidを取得する
        $bunrui = new Bunrui;
        $bunruis = $bunrui->getLists();

        return view('search', [
            'items' => $items,
            'bunruis' => $bunruis,
            'searchWord' => $searchWord,
            'bunruiId' => $bunruiId
        ]);
    }
     //「\\」「%」「_」などの記号を文字としてエスケープさせる
     public static function escapeLike($str)
     {
         return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
     }
     public function details(Item $item)
     {
        $bunruis = Bunrui::all();
        return view('details',compact('item'))
            ->with('bunruis',$bunruis);

     }

     public function rebist()
     {
        $bunruis = Bunrui::all();
        return view('rebist')
           ->with('bunruis',$bunruis);

     }
}
