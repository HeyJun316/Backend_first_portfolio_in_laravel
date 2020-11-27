<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryConteroller extends Controller
{
  public function index(Request $request)
  {
      $items = Category::all();
      return view('home.items.category.loafer', ['items' => $items]);

  }
}
