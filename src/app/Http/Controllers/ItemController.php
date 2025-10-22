<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function search(Request $request)
{
    $keyword = $request->input('keyword');

    $query = Item::query();

    if (!empty($keyword)) {
        $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('description', 'LIKE', "%{$keyword}%");
    }

    $items = $query->get();

    return view('items.index', compact('items', 'keyword'));
}

}
