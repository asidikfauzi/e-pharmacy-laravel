<?php

    namespace App\Http\Controllers\User;

    use App\Helper\Storage;
    use App\Http\Controllers\Controller;
    use App\Models\Address;
    use App\Models\Cart;
    use App\Models\Payment;
    use App\Models\Person;
    use Illuminate\Http\Request;
    use RealRashid\SweetAlert\Facades\Alert;

    class PaymentController extends Controller
    {
        public function index($id)
        {
            $person = Person::select('persons.*', 'u.id as id_user', 'u.email')
                ->join('users as u', 'u.id', '=', 'persons.user_id')
                ->where('u.id', auth()->user()->id)
                ->first();

            $addresses = Address::where('person_id', $person->id)->get();

            $payments = Payment::find($id);


            $dataListProducts = json_decode($payments->list_produk);
            $listProducts = $dataListProducts->list_products;

            return view('user.payment.index', compact('person', 'addresses', 'payments', 'listProducts'));
        }

        public function store(Request $request)
        {
            $carts = Cart::select('p.*')
                ->join('products as p', 'carts.product_id', '=', 'p.id')
                ->whereNull('carts.deleted_at')
                ->get();

            $listProducts = [];
            $total = 0;

            foreach ($carts as $cart) {

                $qty = $request->jumlah[$cart->id];
                $price = $cart->price * $qty;

                $listProducts[] = [
                    'id' => $cart->id,
                    'nama' => $cart->nama,
                    'price' => $price,
                    'qty' => $qty,
                    'image' => Storage::getImageProduct($cart->image),
                ];
                $total += $price;
            }

            $dataList = [
                'list_products' => $listProducts,
                'alamat' => "",
            ];

            $listProductsJson = json_encode($dataList);

            $payment = new Payment();
            $payment->user_id = auth()->user()->id;
            $payment->nota = Payment::generateInvoiceCode();
            $payment->list_produk = $listProductsJson;
            $payment->total = $total;
            $payment->status = false;
            $payment->save();

            return redirect()->route('user.payment.index', $payment->id);
        }

        public function update(Request $request, $id)
        {
            if (!$request->hasFile('image')) {
                Alert::warning('Perhatian!', 'Isi Bukti Pembayaran dengan benar');
                return back();
            }

            Cart::where('user_id', auth()->user()->id)->whereNull('deleted_at')->delete();

            $payment = Payment::find($id);

            $dataListProduct = json_decode($payment->list_produk);
            $dataListProduct->alamat = $request->alamat;
            $listProducts = json_encode($dataListProduct);

            $payment->list_produk = $listProducts;
            $payment->image = Storage::uploadImageBuktiTF($request->file('image'));
            $payment->save();

            Alert::success('Berhasil!', 'Bukti Pembayaran Berhasil Diupload');
            return redirect()->route('user.history.index');
        }
    }
