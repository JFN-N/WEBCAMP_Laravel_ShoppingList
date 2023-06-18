@extends('admin.layout')

{{-- メインコンテンツ --}}
@section('admin.contets')
    <a href="/admin/top">管理画面Top</a><br>
    <a href="/admin/user/list">ユーザー一覧</a><br>
    <a href="/logout">ログアウト</a><br>

    <h1>管理画面　ログイン</h1>

@endsection