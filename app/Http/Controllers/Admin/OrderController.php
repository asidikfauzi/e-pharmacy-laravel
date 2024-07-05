<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Storage;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Payment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }

    public function getData()
    {
        $payments = Payment::select('payments.*', 'ps.nama')
            ->join('users as u', 'u.id', 'payments.user_id')
            ->join('persons as ps', 'u.id', 'ps.user_id')
            ->get();

        return DataTables::of($payments)->addIndexColumn()
            ->addColumn('action', function ($row){
                return
                    '<a href="#" class="accept-payment" data-id="'.$row->id.'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16"  style="color: green">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </a>
                    <a href="#" class="reject-payment" data-id="'.$row->id.'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16" style="color: red">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                        </svg>
                    </a>';
            })->addColumn('show', function($row){
                return
                    '<a href="#" class="show-payment" data-id="'.$row->id.'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                        </a>';
            })->addColumn('image', function($row){
                $image = Storage::getImageBuktiTF($row->image);
                return
                    '<a href="'.$image.'" target="_blank">
                            <img src="'.$image.'" alt="image" style="width: 50px; height: 50px;">
                        </a>';
            })->rawColumns([
                'action',
                'show',
                'image',
            ])->make(true);
    }

    public function show($id)
    {
        $payment = Payment::find($id);

        $dataListProduct = json_decode($payment->list_produk);

        $address = Address::find($dataListProduct->alamat);
        $alamat = $address->jalan . ", " . $address->kota . ", " . $address->provinsi . ", " . $address->kode_pos . ", " . $address->negara;
        $payment->alamat = $alamat;
        $payment->image = Storage::getImageBuktiTF($payment->image);
        $payment->product = $dataListProduct->list_products;

        return view('user.history.show', compact('payment'));
    }

    public function accept($id)
    {
        $payment = Payment::find($id);
        $payment->status = "SUCCESS";
        $payment->save();

        Alert::success('Sukses', 'Pesanan Diterima!');
        return back();
    }

    public function reject($id)
    {
        $payment = Payment::find($id);
        $payment->status = "FAILED";
        $payment->save();

        Alert::success('Sukses', 'Pesanan Ditolak!');
        return back();
    }

}
