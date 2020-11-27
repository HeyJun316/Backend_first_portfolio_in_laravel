<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChange;
use App\Http\Requests\UploadUser;
use App\Models\Cart;
// use Illuminate\Support\Facades\Auth;//(+)ForAdd`Log`inName
use App\Models\Size;
use App\Models\Users;
use App\Models\History;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//(+)login中のユーザーを取得

class shoesController extends Controller
{
    /**
     * Undocumented function
     * @return void
     */
    public function user()
    {
        $users = Auth::user();
        // dd($users);
        // $basic_infos = [
        // 'name'=>'氏名','mail'=>'メールアドレス','sex'=>'性別'];
        return view('home.member.user', [
            'users' => $users,
        ]);
        // ->with($basic_infos)
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
        // $order_number =$cart->createNumber();

        // $add_history =$cart->addHistory($order_number);
        // dd(add_history);

        return view('home.cart.payment_conf', $data)->with('users', $users);
    }

    //CART
    public function cart(Cart $cart)
    {
        //modelのCartからshowCartメソッド取得
        //ログインしてるuser_id取得
        $data = $cart->showCart();
        // $add_history =$cart->addHistory();

        return view('home.cart.cart', $data);
    }
    // gonna create cate's html loafer/monk strap...
    // public function loafer()
    // {
    //     $categories = Category::take(4)->get();
    //     $products = Product::take(8)->orderBy(
    //         'created_at',
    //         'desc'
    //     )->simplePaginate(8);
    //     return view('home.items.category.loafer', [
    //         'products' => $products,
    //         'categories' => $categories
    //     ]);
    // }

    //HOME
    public function home(Request $Requeat)
    {
        $categories = Category::take(4)->get();
        //    where('category_id',$request->product()->id)->get();

        $products = Product::take(8)->get();
        //    dd($products);
        return view('home.home', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function single_product(Request $request, int $id)
    {
        $products = Product::find($id);
        $product_id = $products->id;
        $product_name = $products->product_name;
        $price = $products->price;
        $detail = $products->detail;
        $size_id = Size::take(8)->get(); //sizeを8つ取り出し表示
        // $products = Product::take(1)->get(); //(-)
        return view('home.items.single_product', [
            'product_id' => $product_id,
            'product_name' => $product_name,
            'price' => $price,
            'size_id' => $size_id,
            'detail' => $detail,
        ]);
    }
    //PRODUCT_LIST
    public function product_list(Request $request, int $id)
    {
        //最新を見せたい
        // if (!isset($id)) {
        //     $products = Product::take(8)->orderBy(
        //         'created_at',
        //         'desc',
        //     )->get();
        // } else {
        // catefory_id = 1 を取得OK >>NEXT>> category_id = 1の商品だけを表示
        //category名取得
        $categories_name = Category::find($id);
        $category_name = $categories_name->name_jp;
        // category_id = 1の商品だけを表示
        $products = Product::where('category_id', $id)
            ->take(8)
            ->simplePaginate(8);
        // }
        //side_barのcategory用
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
        // dd($histories);
        return view('home.member.history', [
            'histories' => $histories,
        ]);
    }

    // $products = Product::find($request->id); //single_pageでクリックしたproduct_idをget=OK
    // $size = Size::find($id)->size; //size表示
    // dd($size);
    // // dd($sie_id);
    // $product_name = $products->product_name;
    // $price = $products->price;
    // dd($size);
    // return view('home.cart.cart', [
    //     'product_name' => $product_name,
    //     'price' => $price,
    //     'size' => $size,
    // ]);
    // $all_prodcut = $products->all();//全Productのデータが取れる。
    //NEW
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

    public function admin()
    {
        //管理者画面
        return view('home.admin');
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
        $user->delete(); //userが削除される
        return view('home/member/delete_comp');
        // $user = Users::onlyTrashed()->whereNotNull('id');
        // $user->forceDelete();//完全削除？よくわかってないw
    }

    // SEARCH
    public function search(Request $request)
    {
        $categories = Category::take(4)->get();
        $keyword_name = $request->input('product_name', null); //inputで送られてきたname

        $search_products = collect([]);
        if (!is_null($keyword_name)) {
            //空じゃない時
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

    //=========
    //元々//
    //=========
    // public function search(Request $request)
    // {
    //     $categories = Category::take(4)->get();
    //     $keyword_name = $request->product_name; //inputで送られてきたname
    //     // $search_products = '';
    //     if(empty($keyword_name)){
    //         return view('home.items.search.search', [
    //             'categories' => $categories,
    //             'search_products' => $search_products,
    //             'keyword_name' => $keyword_name
    //         ]);
    //     }else{

    //         $query = Product::query();
    //         $search_products = $query->where('product_name', 'LIKE', '%' . $keyword_name . '%')->get();

    //         return view('home.items.search.search', [
    //             'categories' => $categories,
    //             'search_products' => $search_products,
    //             'keyword_name' => $keyword_name
    //             ]);
    //         }
    //     }
}

// $users = Users::firstOrCreate(['name' =>'中村隼']);

// $users = Users::firstOrCreate(
//     ['name'=>'中村隼'],['email'=>'gmail'],
//     ['sex'=>'men'],
//     ['postal_code'=>'1234567'],
//     ['axress'=>'法ﾎ'],
//     ['birthday'=>'1234-31-12'],
//     ['pasword'=>'123456']
// );
// ->orderBy('name', 'desc')
// ->take(5)
// ->get();

//     $total = 0;
// foreach ($users as $user) {
//     $total += $user['postal_code'];

// public function regist_conf(Request $request)
// {
//     $rules =[
//             'name' => 'required|string|max:30',
//             'email' => 'email:filter,spoof,dns,strict',//laravel8
//             'sex' =>'string|max:2',//(+)
//             'postal_code'=>'string|size:7',//(+)
//             'address'=>'string|max:100',//(+)
//             'year'=>'string|size:4',//(+) 4桁nomi
//             'month'=>'integer|between:1,12',//(+)最高2桁
//             'day'=>'integer|between:1,31',//(+)
//             'password' => 'required|string|min:8|confirmed',

//         ];
//         $validator =Validator::make($request->all(),$rules);
//         $validated = $validator->validate();
//         // dd($validated);
//         $data = $validated;
//         // dd($data);

//     return view('home.member.regist_conf',$data);
//
