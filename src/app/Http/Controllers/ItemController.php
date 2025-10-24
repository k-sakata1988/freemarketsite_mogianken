<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $items = Auth::user()->wishlistItems;
            $activeTab = 'mylist';
        } else {
            $items = Item::recommended()->get();
            $activeTab = 'recommended';
        }

        return view('index', compact('items', 'activeTab'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Item::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                  ->orWhere('description', 'LIKE', "%{$keyword}%");
        }

        $items = $query->get();

        return view('items.index', compact('items', 'keyword'));
    }

    public function fetchTabItems($type)
{
    if ($type === 'recommended' || !auth()->check()) {
        $items = \App\Models\Item::recommended()->get();
    } else if ($type === 'mylist' && auth()->check()) {
        $items = auth()->user()->wishlistItems;
    } else {
        $items = collect(); 
    }

    return view('items._items', compact('items'));
}

}
