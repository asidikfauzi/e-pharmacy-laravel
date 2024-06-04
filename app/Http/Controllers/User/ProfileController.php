<?php
    
    namespace App\Http\Controllers\User;
    
    use App\Helper\Storage;
    use App\Http\Controllers\Controller;
    use App\Models\Person;
    use App\Models\User;
    use Illuminate\Http\Request;
    use RealRashid\SweetAlert\Facades\Alert;
    
    class ProfileController extends Controller
    {
        public function index()
        {
            $user = User::select('users.email', 'p.*')
                ->join('persons as p', 'p.user_id', '=', 'users.id')
                ->where('users.id', auth()->user()->id)
                ->first();
            
            return view('user.index', compact('user'));
        }
        
        public function update(Request $request)
        {
            $person = Person::where('user_id', auth()->user()->id)->first();
            $person->nama = $request->nama;
            $person->no_telp = $request->no_telp;
            $person->tgl_lahir = $request->tgl_lahir;
            $person->jenis_kelamin = $request->jenis_kelamin;
            $person->bio = $request->bio;
            
            if ($request->hasFile('image')) {
                $image = Storage::uploadImageUser($request->file('image'));
                $person->image = $image;
            }
            $person->save();
            
            Alert::success('Sukses!', 'Data Berhasil Diupdate');
            return redirect()->back();
        }
    }
