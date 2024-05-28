<?php
    
    namespace Database\Seeders;
    
    use App\Models\Person;
    use Carbon\Carbon;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;
    
    class PersonSeeder extends Seeder
    {
        public function run()
        {
            $person = Person::all();
            
            if(count($person) == 0) {
                $data = [
                    [
                        'id' => 1,
                        'nama' => 'Super Admin',
                        'no_telp' => '087890987654',
                        'tgl_lahir' => Carbon::create('2002', '01', '01'),
                        'jenis_kelamin' => 'Laki-laki',
                        'bio' => 'Ini adalah Admin',
                        'image' => 'admin.jpg',
                        'user_id' => 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'id' => 2,
                        'nama' => 'User Tester',
                        'no_telp' => '087890987654',
                        'tgl_lahir' => Carbon::create('2002', '01', '01'),
                        'jenis_kelamin' => 'Perempuan',
                        'bio' => 'Ini adalah User',
                        'image' => 'user.jpg',
                        'user_id' => 2,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ];
                
                Person::insert($data);
            }
        }
    }
