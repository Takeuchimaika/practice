@extends('app')

@section('content')
    <div class="row">
         <div class="col-lg-12">
            <div class="pull-left">
                <h2 style="font-size:lrem;">新規商品登録画面</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/items')}}">戻る</a>
            </div>
         </div>
    </div>

    <div style="text-align:right;">
        <from action="{{ route('item.store')}}" method="POST">
           @csrf
             <div class="row">
                <div class="col-12 md-2 mt-2">
                    <div class="from-group">
                        <input type="text" name="name" class="from-control" placeholder="名前">
                        @error('name')
                        <span style="color:red;">名前を２０文字以内で入力してください</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 md-2 mt-2">
                    <div class="from-group">
                        <input type="text" name="kakaku" class="from-control" placeholder="価格">
                        @error('kakaku')
                        <span style="color:red;">価格を数値で入力してください</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 md-2 mt-2">
                    <div class="from-group">
                        <select name="bunrui" class="from-select">
                            <option>分類を選択してください</option>
                            @foreach ($bunruis as $bunrui)
                                <option value="{{ $bunrui->id }}">{{ $bunrui->str }}</option>
                            @endforeach
                        </select> 
                        @error('bunrui')
                        <span style="color:red;">分類を選択してください</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 md-2 mt-2">
                    <div class="from-group">
                        <textarea class="from-control" style="height:100px" name="shosai"  placeholder="詳細"></textarea>
                        @error('syosai')
                        <span style="color:red;">詳細を入力してください</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 md-2 mt-2">
                        <button type="submit" class="btn btn-primary w-100">登録</button>
                </div>
            </div>
        </from>
    </div>

@endsection