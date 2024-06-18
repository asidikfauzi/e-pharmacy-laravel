<?php

    namespace App\Http\Controllers\User;

    use App\Http\Controllers\Controller;
    use App\Models\Cart;
    use Illuminate\Http\Request;
    use RealRashid\SweetAlert\Facades\Alert;

    class CartController extends Controller
    {
        public function index()
        {
            $userId = auth()->user()->id;

            $carts = Cart::select(
                'p.id',
                'p.nama',
                'p.price',
                'p.image',
                'c.id as id_cart',
                \DB::raw('SUM(carts.jumlah) as total_quantity')
            )
                ->join('products as p', 'p.id', '=', 'carts.product_id')
                ->join(\DB::raw('(SELECT MIN(id) as id, product_id FROM carts WHERE deleted_at IS NULL GROUP BY product_id) as c'), function($join) {
                    $join->on('c.product_id', '=', 'carts.product_id');
                })
                ->where('carts.user_id', $userId)
                ->whereNull('carts.deleted_at')
                ->groupBy('p.id', 'p.nama', 'p.price', 'p.image', 'c.id')
                ->get();

            $total = 0;
            foreach ($carts as $cart) {

                $total += $cart->total_quantity * $cart->price;
            }

            return view('user.cart.index', compact('carts', 'total'));
        }

        public function create(Request $request, $id)
        {
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $id;
            $cart->jumlah = $request->jumlah;
            $cart->save();

            Alert::success('Sukses', 'Berhasil Menambah Keranjang');
            return redirect()->back();
        }

        public function store($id)
        {
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $id;
            $cart->jumlah = 1;
            $cart->save();

            Alert::success('Sukses', 'Berhasil Menambah Keranjang');
            return redirect()->back();
        }

        public function destroy($id)
        {
            $cart = Cart::find($id);
            $cart->delete();

            Alert::success('Sukses', 'Berhasil Menghapus Keranjang');
            return redirect()->route('user.cart.index');
        }
    }

