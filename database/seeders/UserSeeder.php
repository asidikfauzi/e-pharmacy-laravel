<?php
    
    namespace Database\Seeders;
    
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;
    
    class UserSeeder extends Seeder
    {
        public function run()
        {
            $user = User::all();
            
            if(count($user) == 0) {
                $data = [
                    [
                        'id' => 1,
                        'email' => 'admin@gmail.com',
                        'password' => Hash::make("12345678"),
                        "role" => "admin",
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'id' => 2,
                        'email' => 'user@gmail.com',
                        'password' => Hash::make("12345678"),
                        "role" => "user",
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ];
                
                User::insert($data);
            }
        }
    }
