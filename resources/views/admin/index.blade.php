@extends('admin.layout')

{{-- メインコンテンツ --}}
@section('admin.contets')

        <h1>管理画面　ログイン</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        <form action="/login" method="post">
            @csrf
            ログインID：<input name="email"><br>
            パスワード：<input name="password" type="password"><br>
            <button>ログインする</button>
        </form>
@endsection