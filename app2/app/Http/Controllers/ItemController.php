<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Bunrui;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest()->paginate(5);

        return view('index',compact('items'))
           ->with('i',(request()->input('page',1)-1)*5);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bunruis = Bunrui::all();
        return view('create')
            ->with('bunruis',$bunruis);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:20',
            'kakaku'=>'required|intteger',
            'bunrui'=>'required|intteger',
            'shosai'=>'required|max:140',
        ]);

        $item = new Item;
        $item->name = $request->input(["name"]);
        $item->kakaku = $request->input(["kakaku"]);
        $item->bunrui = $request->input(["bunrui"]);
        $item->shosai = $request->input(["shosai"]);
        $item->save();
        
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $bunruis = Bunrui::all();
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
        $items = Item::all();
        return view('edit',compact('item'))
            ->with('items',$items);
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
            'name'=>'required|max:20',
            'kakaku'=>'required|intteger',
            'bunrui'=>'required|intteger',
            'shosai'=>'required|max:140',
        ]);
        
        $item->name = $request->input(["name"]);
        $item->kakaku = $request->input(["kakaku"]);
        $item->bunrui = $request->input(["bunrui"]);
        $item->shosai = $request->input(["shosai"]);
        $item->save();
        
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}

