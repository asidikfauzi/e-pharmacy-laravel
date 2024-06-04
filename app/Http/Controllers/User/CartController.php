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
                \DB::raw('SUM(carts.jumlah) as total_quantity')
            )
                ->where('carts.user_id', $userId)
                ->join('products as p', 'p.id', '=', 'carts.product_id')
                ->groupBy('p.id', 'p.nama', 'p.price')
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
    }
    
