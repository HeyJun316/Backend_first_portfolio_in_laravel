<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChange;
use App\Http\Requests\UploadUser;
use App\Models\Cart;
use App\Models\Size;
use App\Models\Users;
use App\Models\History;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_size;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class shoesController extends Controller
{
    /**
     * Undocumented function
     * @return void
     */
    public function user()
    {
        $users = Auth::user();
        return view('home.member.user', [
            'users' => $users,
        ]);
    }
    public function modify(Request $request)
    {
        $user_info = Auth::user();
        return view('home.member.modify', compact('user_info'));
    }
    public function ship_modify(Request $request)
    {
        $user_info = Auth::user();
        return view('home.member.ship_modify', compact('user_info'));
    }
    public function pass_modify(Request $request)
    {
        $user_info = Auth::user();
        return view('home.member.password_modify', compact('user_info'));
    }

    public function pass_change(PasswordChange $request)
    {
        $user_info = Auth::user();
        $validated = $request->validated();
        $user_info->password = Hash::make($validated['password']);
        $user_info->save();
        return view('home.member.pass_regist_comp');
    }

    public function upload(UploadUser $request)
    {
        $user_id = Auth::id();
        $user = Users::find($user_id);
        $user->fill($request->validated())->save();

        if ($request['jun'] == '2') {
            return view('home.member.regist_comp');
        }
        return view('home.member.ship_regist_comp');
    }

    //PEYMENT_CONF
    public function payment_conf(Request $request, Cart $cart)
    {
        $data = $cart->showCart();
        $user_id = Auth::id();
        $users = Users::where('id', $user_id)->get();

        return view('home.cart.payment_conf', $data)->with('users', $users);
    }

    //CART
    public function cart(Cart $cart)
    {
        $data = $cart->showCart();

        return view('home.cart.cart', $data);
    }

    //HOME
    public function home(Request $Requeat)
    {
        $categories = Category::take(4)->get();

        $products = Product::take(8)->get();
        return view('home.home', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function single_product(Request $request, int $id)
    {
        $products = Product::with(['product_size', 'images'])->find($id);
        return view('home.items.single_product', [
            'products' => $products,
        ]);
    }

    //PRODUCT_LIST
    public function product_list(Request $request, int $id)
    {
        $categories_name = Category::find($id);
        $category_name = $categories_name->name_jp;
        $products = Product::where('category_id', $id)
            ->take(8)
            ->simplePaginate(8);
        $categories = Category::take(4)->get();

        return view('home.items.product_list', [
            'products' => $products,
            'categories' => $categories,
            'name' => $category_name,
        ]);
    }
    // //HISOTRY
    public function history(Request $request)
    {
        $user_id = Auth::id();
        $histories = History::where('user_id', $user_id)->get();
        return view('home.member.history', [
            'histories' => $histories,
        ]);
    }

    public function new(Request $request)
    {
        $products = Product::take(8)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        $categories = Category::take(4)->get();

        return view('home.items.product_list', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function cheap(Request $request)
    {
        $products = Product::take(8)
            ->orderBy('price', 'asc')
            ->paginate(8);
        $categories = Category::take(4)->get();
        return view('home.items.product_list', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function pricy()
    {
        $products = Product::take(8)
            ->orderBy('price', 'desc')
            ->paginate(8);
        $categories = Category::take(4)->get();
        return view('home.items.product_list', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function login()
    {
        return view('home.member.login');
    }
    public function regist()
    {
        return view('home.member.regist');
    }

    public function regist_comp()
    {
        return view('home.member.regist_comp');
    }

    public function delete_conf(Request $request)
    {
        return view('home.member.delete_conf');
    }

    public function delete_comp(Request $request)
    {
        $user = Users::find($request->user()->id);
        $user->delete();
        return view('home/member/delete_comp');
    }

    // SEARCH
    public function search(Request $request)
    {
        $categories = Category::take(4)->get();
        $keyword_name = $request->input('product_name', null);

        $search_products = collect([]);
        if (!is_null($keyword_name)) {
            $search_products = Product::where(
                'product_name',
                'LIKE',
                '%' . $keyword_name . '%',
            )->get();
        }

        return view('home.items.search.search', [
            'categories' => $categories,
            'search_products' => $search_products,
            'keyword_name' => $keyword_name,
        ]);
    }
}
