<?php
    
    namespace App\Http\Controllers\Auth;
    
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use RealRashid\SweetAlert\Facades\Alert;
    
    class PasswordController extends Controller
    {
        public function index()
        {
            return view('auth.change-password');
        }
        
        public function update(Request $request)
        {
            $request->validate([
                "old_password" => "required",
                "new_password" => "required|min:5",
                "confirm_password" => "required|same:new_password",
            ]);
            
            $user = auth()->user();
            
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'The old password is incorrect.']);
            }
            
            $user->password = Hash::make($request->new_password);
            $user->save();
            
            Alert::success('Success', 'Password Berhasil Diubah!');
            return back();
        }
    }
