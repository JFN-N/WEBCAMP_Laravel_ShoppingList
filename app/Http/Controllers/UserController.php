<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterPost;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function register(UserRegisterPost $request)
    {
        // validate済みのデータの取得
        //$datum = $request->validate([
            //'password' =>['required','confirmed']
        //]);

        // validate済みのデータの取得
        $datum = $request->validated();

        $datum['password'] = Hash::make($datum['password']);

        // テーブルへのINSERT
        try {
            $r = UserModel::create($datum);
            //var_dump($r); exit;
        } catch(\Throwable $e) {
            // XXX 本当はログに書く等の処理をする。今回は一端「出力する」だけ
            echo $e->getMessage();
            exit;
        }

        // タスク登録成功
        $request->session()->flash('front.user_register_success', true);


        //return redirect('/login');
        return view('index');
    }
}