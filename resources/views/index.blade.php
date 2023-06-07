@extends('layout1')

{{-- メインコンテンツ --}}
@section('contets1')

        <h1>ログイン</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        <form action="./top.html" method="post">
            email：<input><br>
            パスワード：<input type="password"><br>
            <button>ログインする</button>
        </form>

        <a href="/user/register">会員登録</a><br>

@endsection