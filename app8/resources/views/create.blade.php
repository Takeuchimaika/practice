@extends('app')

@section('content')
    <div class="row">
         <div class="col-lg-12">
            <div class="pull-left">
                <h2 style="font-size:lrem;">商品新規登録画面</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/items')}}">戻る</a>
            </div>
         </div>
    </div>

    <div style="text-align:right;">
        <form action="{{ route('item.store')}}" enctype='multipart/form-data' method="POST" >
           @csrf
             <div class="row">
                <div class="col-12 md-2 mt-2">
                    <div class="from-group">
                    <span class="from-required" style="color:red;">*</span>
                        <input type="text" name="name" class="from-control" placeholder="名前">
                        @error('name')
                        <span style="color:red;">名前を２０文字以内で入力してください</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 md-2 mt-2">
                    <div class="from-group">
                    <span class="from-required" style="color:red;">*</span>
                        <select name="bunrui" class="from-select">
                            <option>メーカーを選択してください</option>
                            @foreach ($bunruis as $bunrui)
                                <option value="{{ $bunrui->id }}">{{ $bunrui->str }}</option>
                            @endforeach
                        </select> 
                        @error('bunrui')
                        <span style="color:red;">メーカーを選択してください</span>
                        @enderror
                    </div>
                </div>
                


                <div class="col-12 md-2 mt-2">
                    <div class="from-group">
                    <span class="from-required" style="color:red;">*</span>
                        <input type="text" name="kakaku" class="from-control" placeholder="価格">
                        @error('kakaku')
                        <span style="color:red;">価格を入力してください</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 md-2 mt-2">
                    <div class="from-group">
                    <span class="from-required" style="color:red;">*</span>
                        <input type="text" name="zaiko" class="from-control" placeholder="在庫数">
                        @error('zaiko')
                        <span style="color:red;">在庫を入力してください</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 md-2 mt-2">
                    <div class="from-group">
                        <textarea class="from-control" style="height:100px" name="shosai"  placeholder="コメント"></textarea>
                    </div>
                </div>

                <div class="col-12 md-2 mt-2">
                        <input type="file" name="image" accept=".jpg,.png,image/gif,image/jpeg,image/png">   
                </div>
                
                    


            
                <div class="col-12 md-2 mt-2">
                        <button type="submit" class="btn btn-primary w-100">新規作成</button>
                </div>
            </div>
        </form>
    </div>

@endsection