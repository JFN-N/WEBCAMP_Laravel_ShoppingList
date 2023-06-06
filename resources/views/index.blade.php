@extends('layout1')

{{-- メインコンテンツ --}}
@section('contets1')

        <h1>ログイン</h1>
        <form action="./top.html" method="post">
            email：<input><br>
            パスワード：<input type="password"><br>
            <button>ログインする</button>
        </form>

@endsection