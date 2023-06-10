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
            <form action="/task/register" method="post">
                @csrf
                「買うもの」名:<input name="name" value="{{ old('name') }}"><br>
                <button>「買うもの」を登録する</button>
            </form>

        <h1>「買うもの」一覧</h1>
        <!--　-->

        <!-- ページネーション -->
        現在 1 ページ目<br>
        <a href="./top.html">最初のページ</a> /
        <a href="./top.html">前に戻る</a> /
        <a href="./top.html">次に進む</a>
        <br>
        <hr>
        <menu label="リンク">
        <a href="/logout">ログアウト</a><br>
        </menu>

@endsection