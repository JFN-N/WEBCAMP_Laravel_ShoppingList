<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CompletedShoppingListController extends Controller
{
    public function index()
    {
        return view('completed_shopping_list.list');
    }
}