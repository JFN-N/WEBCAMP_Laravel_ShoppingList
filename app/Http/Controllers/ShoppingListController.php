<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shopping_lists as Shopping_listsModel;

class ShoppingListController extends Controller
{
     /**
     * タスク一覧ページ を表示する
     *
     * @return \Illuminate\View\View
     */
    public function register(TaskRegisterPostRequest $request)
    {
        // validate済みのデータの取得
        //$datum = $request->validated();
        //
        $user = Auth::user();
        $id = Auth::id();
        var_dump($datum, $user, $id); exit;

        // user_id の追加
        $datum['user_id'] = Auth::id();

        // テーブルへのINSERT
        try {
            $r = Shopping_listsModel::create($datum);
        } catch(\Throwable $e) {
            // XXX 本当はログに書く等の処理をする。今回は一端「出力する」だけ
            echo $e->getMessage();
            exit;
        }

        // タスク登録成功
        $request->session()->flash('front.task_register_success', true);

        //
        return redirect('shopping_list/list');
    }

    public function list()
    {
        return view('shopping_list.list');
    }
}