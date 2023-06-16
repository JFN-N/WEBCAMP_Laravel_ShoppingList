<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\shopping_lists as Shopping_listsModel;
use App\Models\completed_shopping_lists as completed_shopping_listsModel;
use Illuminate\Http\Request;

use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{


    public function register(TaskRegisterPostRequest $request)
    {
        // validate済みのデータの取得
        $datum = $request->validated();
        //
        //$user = Auth::user();
        //$id = Auth::id();
        //var_dump($datum, $user, $id); exit;

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

    /**
     * 削除処理
     */
    public function delete(Request $request, $shopping_list_id)
    {
        // task_idのレコードを取得する
        $Shopping_lists = $this->getShopping_listsModel(shopping_list_id);

        // タスクを削除する
        if ($Shopping_lists !== null) {
            $Shopping_lists->delete();
            $request->session()->flash('front.task_delete_success', true);
        }

        // 一覧に遷移する
        return redirect('shopping_list.list');
    }

    /**
     * タスクの完了
     */
    public function complete(Request $request, $shopping_list_id)
    {
        /* タスクを完了テーブルに移動させる */
        try {
            // トランザクション開始
            DB::beginTransaction();

            // task_idのレコードを取得する
            $Shopping_lists = $this->Shopping_listsModel($shopping_list_id);
            if ($Shopping_lists === null) {
                // task_idが不正なのでトランザクション終了
                throw new \Exception('');
            }

            // tasks側を削除する
            $Shopping_lists->delete();
//var_dump($task->toArray()); exit;

            // completed_tasks側にinsertする
            $dask_datum = $Shopping_lists->toArray();
            unset($dask_datum['created_at']);
            unset($dask_datum['updated_at']);
            $r = completed_shopping_listsModel::create($dask_datum);
            if ($r === null) {
                // insertで失敗したのでトランザクション終了
                throw new \Exception('');
            }
//echo '処理成功'; exit;

            // トランザクション終了
            DB::commit();
            // 完了メッセージ出力
            $request->session()->flash('front.task_completed_success', true);
        } catch(\Throwable $e) {
//var_dump($e->getMessage()); exit;
            // トランザクション異常終了
            DB::rollBack();
            // 完了失敗メッセージ出力
            $request->session()->flash('front.task_completed_failure', true);
        }

        // 一覧に遷移する
        return redirect('shopping_list.list');
    }

    public function list()
    {

        // 1Page辺りの表示アイテム数を設定
        $per_page = 3;

        // 一覧の取得
        $list = Shopping_listsModel::where('user_id', Auth::id())
                         ->orderBy('created_at','DESC')
                         ->orderBy('name')
                         ->paginate($per_page);

        //echo "<pre>\n"; var_dump($sql, $list); exit;
        return view('shopping_list.list', ['list' => $list]);
    }
}