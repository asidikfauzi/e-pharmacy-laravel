<?php
    
    namespace App\Http\Controllers\User;
    
    use App\Http\Controllers\Controller;
    use App\Models\Address;
    use Illuminate\Http\Request;
    use RealRashid\SweetAlert\Facades\Alert;
    
    class AddressController extends Controller
    {
        public function index()
        {
            $address = Address::select('addresses.*')
                ->join('persons as p', 'p.id', '=', 'addresses.person_id')
                ->join('users as u', 'u.id', '=', 'p.user_id')
                ->where('u.id', auth()->user()->id)
                ->get();
            
            return view('user.address.index', compact('address'));
        }
        
        public function create()
        {
            return view('user.address.create');
        }
        
        public function store(Request $request)
        {
            $address = new Address();
            $address->person_id = auth()->user()->id;
            $address->jalan = $request->jalan;
            $address->kota = $request->kota;
            $address->provinsi = $request->provinsi;
            $address->kode_pos = $request->kode_pos;
            $address->negara = $request->negara;
            $address->save();
            
            Alert::success('Sukses', 'Data Alamat berhasil ditambahkan');
            return redirect()->route('user.address.index');
        }
        
        public function edit($id)
        {
            $address = Address::find($id);
            return view('user.address.edit', compact('address'));
        }
        
        public function update($id, Request $request)
        {
            $address = Address::find($id);
            $address->jalan = $request->jalan;
            $address->kota = $request->kota;
            $address->provinsi = $request->provinsi;
            $address->kode_pos = $request->kode_pos;
            $address->negara = $request->negara;
            $address->save();
            
            Alert::success('Sukses', 'Data Alamat berhasil diubah!');
            return redirect()->route('user.address.index');
        }
        
        public function destroy($id)
        {
            $address = Address::find($id);
            $address->delete();
            
            Alert::success('Sukses', 'Data Alamat berhasil dihapus!');
            return redirect()->route('user.address.index');
        }
    }
