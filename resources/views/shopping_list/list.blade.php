@extends('layout2')

@section('contets2')

        <h1>「買うもの」の登録</h1>
            @if (session('front.task_register_success') == true)
                「買うもの」を登録しました！！<br>
            @endif
            @if ($errors->any())
                <div>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
                </div>
            @endif
            <form action="/register" method="post">
                @csrf
                「買うもの」名:<input name="name" value="{{ old('name') }}"><br>
                <button>「買うもの」を登録する</button>
            </form>

        <h1>「買うもの」一覧</h1>
        <!--　-->
        <a href="/completed_shopping_list/list">購入済み「買うもの」一覧</a><br>
        <table border="1">
        <tr>
            <th>登録日
            <th>「買うもの」名
        @foreach ($list as $Shopping_lists)
        <tr>
            <td>{{ $Shopping_lists->created_at }}
            <td>{{ $Shopping_lists->name }}
            <td><form action="./top.html"><button>削除</button></form></a>
            <td></a>
            <td><form action="./top.html"><button>完了</button></form>
        @endforeach
        </table>

        <!-- ページネーション -->
        現在 1 ページ目<br>
        <a href="./top.html">最初のページ(未実装)</a> /
        <a href="./top.html">前に戻る</a> /
        <a href="./top.html">次に進む</a>
        <br>
        <hr>
        <menu label="リンク">
        <a href="/logout">ログアウト</a><br>
        </menu>

@endsection