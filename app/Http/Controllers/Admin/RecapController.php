<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Storage;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RecapController extends Controller
{
	public function index()
	{
        return view('admin.recap.index');
	}

    public function getData(Request $request)
    {
        $payments = Payment::select('payments.*', 'ps.nama')
            ->join('users as u', 'u.id', 'payments.user_id')
            ->join('persons as ps', 'u.id', 'ps.user_id')
            ->where('payments.status', 'SUCCESS');

        if($request->month) {
            $payments->whereMonth('payments.created_at', $request->month);
        }

        if($request->year) {
            $payments->whereYear('payments.created_at', $request->year);
        }

        $payments = $payments->get();

        $total = $payments->sum('total');

        return DataTables::of($payments)->addIndexColumn()
            ->addColumn('show', function($row){
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
            })->with([
                'total_payments' => $total,
            ])->rawColumns([
                'show',
                'image',
            ])->make(true);
    }
}
