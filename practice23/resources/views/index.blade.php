@extends('app')

@section('content')
    <div class="row">
         <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:lrem;">商品マスター</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="a">新規登録</a>
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
            <td>{{ $item->name }}</td>
            <td style="text-align:right">{{ $item->kakaku }}円</td>
            <td style="text-align:right">{{ $item->bunrui }}</td>
        </tr>
        @endforeach
    </table>

    {!! 1items->links('pagination::bootstrap-5') !!}

@extension