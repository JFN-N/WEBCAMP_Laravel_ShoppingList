@extends('admin.layout')

{{-- メインコンテンツ --}}
@section('admin.contets')
    <a href="/admin/top">管理画面Top</a><br>
    <a href="/admin/user/list">ユーザー一覧</a><br>
    <a href="/logout">ログアウト</a><br>

    <h1>ユーザー一覧</h1>

    <table border="1">
        <tr>
            <th>ユーザーID
            <th>ユーザー名
            <th>購入した「買うもの」数
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}
            <td>{{ $user->name }}
            <td>{{ $user->task_num }}
        @endforeach
    </table>

@endsection