@extends('app')

@section('content')

<main>
  <div class="container">
    <div class="mx-auto">
      <br>
      <h2 class="text-center">商品検索画面</h2>
      <br>
      <div class="text-right">
                <a class="btn btn-success text-right mb-2 mt-2" href="{{ route('item.rebist')}}">新規登録</a>
        </div>
      <!--検索フォーム-->
      <div class="row">
        <div class="col-sm">
          <form method="GET" action="{{ route('search')}}">
          
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">検索キーワード</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="text" class="form-control" name="searchWord" value="{{ $searchWord }}">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary ">検索</button>
              </div>
            </div>     
            <!--プルダウンカテゴリ選択-->
            <div class="form-group row">
              <label class="col-sm-2">メーカー名</label>
              <div class="col-sm-3">
                <select name="bunruiId" class="form-control" value="{{ $bunruiId }}">
                  <option value="">メーカー名</option>

                  @foreach($bunruis as $id => $str)
                  <option value="{{ $id }}">
                    {{ $str }}
                  </option>  
                  @endforeach
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

      <!--検索結果テーブル 検索された時のみ表示する-->
      @if (!empty($items))
    <div class= "itemTable">
      
      <table class="table table-hover">
        <thead style="background-color: #ffd900">
          <tr>

            <th>ID</th>
            <th>商品画像</th>
            <th style="width:50%">商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
            <th></th>
            <th></th>

          </tr>
        </thead>
        @foreach($items as $item)
        <tr>
          <td style="text-align:right">{{ $item->id }}</td>
            <td>
                <img src="{{asset('storage/' . $item->image)}}" style="text-align:left"  class="img-fluid">
            </td>
            <td><a class="" href="{{ route('item.show',$item->id) }}">{{ $item->name }}</a></td>
            <td style="text-align:right">¥{{ $item->kakaku }}</td>
            <td style="text-align:right">{{ $item->zaiko }}</td>
            <td style="text-align:right">{{ $item->bunrui }}</td>

          <td><a href="{{ route('item.details',$item->id) }}" class="btn btn-primary btn-sm">詳細</a></td>
          <td style="text-align:center">
                <form action="{{ route('item.destroy',$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </td>
        </tr>
        @endforeach   
      </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
      {{-- appendsでカテゴリを選択したまま遷移 --}}
      {{ $items->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
    @endif
  </div>
</main>


  </div>
</main>

@endsection