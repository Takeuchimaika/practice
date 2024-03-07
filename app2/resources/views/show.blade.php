@extends('app')

@section('content')
    <div class="row">
         <div class="col-lg-12">
            <div class="pull-left">
                <h2 style="font-size:lrem;">商品詳細画面</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/items')}}">戻る</a>
            </div>
         </div>
    </div>

    <div style="text-align:left;">
        <div class="row">
            <div class="col-12 md-2 mt-2">
                <div class="from-group">
                    {{ $item->name }}
                </div>
            </div>
            <div class="col-12 md-2 mt-2">
                <div class="from-group">
                    {{ $item->kakaku }}
                </div>
            </div>
            <div class="col-12 md-2 mt-2">
                <div class="from-group">
                    @foreach ($bunruis as $bunrui)
                        @if($bunrui->id==$item->item) {{ $bunrui->str}} @endif
                    @endforeach
                </div>
            </div>
            <div class="col-12 md-2 mt-2">
                <div class="from-group">
                    {{ $item->shosai }}
                </div>
            </div>
        </div>       
    </div>

@endsection