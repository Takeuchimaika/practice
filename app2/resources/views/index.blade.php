@extends('app')

@section('content')
    <div class="row">
         <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:lrem;">商品マスター</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('item.create')}}">新規登録</a>
            </div>
         </div>
    </div>

    <table class="tabel tabel-bordered">
        <tr>
            <th>No</th>
            <th>name</th>
            <th>kakaku</th>
            <th>bunrui</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td style="text-align:right">{{ $item->id }}</td>
            <td><a class="" href="{{ route('item.show',$item->id) }}">{{ $item->name }}</a></td>
            <td style="text-align:right">{{ $item->kakaku }}円</td>
            <td style="text-align:left">{{ $item->bunrui }}</td>
            <td style="text-align::center">
                <a class="btn btn-primary" href="{{ route('item.edit',$item->id) }}">変更</a>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $items->links('pagination::bootstrap-5') !!}

@extension