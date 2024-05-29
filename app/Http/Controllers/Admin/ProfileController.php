<?php
    
    namespace App\Http\Controllers\Admin;
    
    use App\Http\Controllers\Controller;
    use App\Models\Person;
    
    class ProfileController extends Controller
    {
        public function index()
        {
            //
            $data = Person::where('user_id', auth()->user()->id)->first();
            
            return view('admin.index', compact('data'));
        }
    }
