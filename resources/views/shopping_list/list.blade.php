@extends('layout2')

@section('contets2')

        <h1>「買うもの」の登録</h1>
            <form action="./top.html" method="post">
                「買うもの」名:<input><br>
                <button>「買うもの」を登録する</button>
            </form>

        <h1>「買うもの」一覧</h1>
        <a href="./top.html">購入済み「買うもの」一覧</a><br>
        <table border="1">
        <tr>
            <th>登録日
            <th>「買うもの」名
        <tr>
            <td>HTML formの学習
            <td>2022/01/01
            <td><form action="./top.html"><button>完了</button></form></a>
            <td></a>
            <td><form action="./top.html"><button>登録</button></form>
        <tr>
            <td>PHPの学習
            <td>2022/01/15
            <td><form action="./top.html"><button>完了</button></form></a>
            <td></a>
            <td><form action="./top.html"><button>登録</button></form>
        <tr>
            <td>RDBの学習
            <td>2022/02/01
            <td><form action="./top.html"><button>完了</button></form></a>
            <td></a>
            <td><form action="./top.html"><button>登録</button></form>
        <tr>
            <td>Laravelの学習
            <td>2022/02/15
            <td><form action="./top.html"><button>完了</button></form></a>
            <td></a>
            <td><form action="./top.html"><button>登録</button></form>
        </table>
        <!-- ページネーション -->
        現在 1 ページ目<br>
        <a href="./top.html">最初のページ</a> /
        <a href="./top.html">前に戻る</a> /
        <a href="./top.html">次に進む</a>
        <br>
        <hr>
        <menu label="リンク">
        <a href="./index.html">ログアウト</a><br>
        </menu>

@endsection