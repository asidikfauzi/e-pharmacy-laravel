<?php
    
    namespace App\Http\Controllers\Auth;
    
    use App\Http\Controllers\Controller;
    use App\Models\Person;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use RealRashid\SweetAlert\Facades\Alert;
    
    class RegisterController extends Controller
    {
        protected function index()
        {
            return view('auth.register');
        }
        
        protected function create(Request $request)
        {
            $request->validate([
                "nama" => "required",
                "email" => "required|email|unique:users",
                "password" => "required|min:5|string",
                "confirm_password" => "required|same:password",
                "no_telp" => "required",
                "tgl_lahir" => "required",
                "jenis_kelamin" => "required",
            ]);
            
            try
            {
                DB::beginTransaction();
               
                $user = new User();
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->role = "user";
                $user->save();
                
                $person = new Person();
                $person->nama = $request->nama;
                $person->no_telp = $request->no_telp;
                $person->tgl_lahir = $request->tgl_lahir;
                $person->jenis_kelamin = $request->jenis_kelamin;
                $person->user_id = $user->id;
                $person->save();
                
                DB::commit();
                
                Alert::success('Success', 'User Berhasil Ditambahkan!');
                return redirect()->route('login');
            }
            catch (\Exception $e)
            {
                DB::rollback();
                return back()->withErrors(['error' => $e->getMessage()]);
            }
        }
    }
