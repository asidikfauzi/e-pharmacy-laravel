<?php
    
    namespace App\Http\Controllers\Auth;
    
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    
    class LoginController extends Controller
    {
        public function index() {
            return view('auth/login');
        }
        
        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
            
            if(auth()->attempt(array('email'=>$request->email, 'password'=>$request->password))) {
                if(auth()->user()->role == "admin")
                {
                    return redirect()->route('admin.index');
                } else {
                    return redirect()->route('user.index');
                }
            } else {
                return redirect()->route('login')
                    ->withErrors(['error'=>'Incorrect username or password!']);
            }
        }
        
        public function logout()
        {
            Auth::logout();
            return redirect('login');
        }
    }
