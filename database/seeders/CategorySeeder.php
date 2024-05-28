<?php
    
    namespace Database\Seeders;
    
    use App\Models\Category;
    use Carbon\Carbon;
    use Illuminate\Database\Seeder;
    
    class CategorySeeder extends Seeder
    {
        public function run()
        {
            $category = Category::all();
            
            if(count($category) == 0) {
                $data = [
                    [
                        'nama' => 'Analgesik',
                        'deskripsi' => 'Obat untuk mengurangi rasa nyeri.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antibiotik',
                        'deskripsi' => 'Obat untuk mengobati infeksi bakteri.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antipiretik',
                        'deskripsi' => 'Obat untuk menurunkan demam.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antiseptik',
                        'deskripsi' => 'Obat untuk mencegah infeksi pada luka.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Vitamin',
                        'deskripsi' => 'Suplemen untuk memenuhi kebutuhan vitamin.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antijamur',
                        'deskripsi' => 'Obat untuk mengobati infeksi jamur.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antivirus',
                        'deskripsi' => 'Obat untuk mengobati infeksi virus.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antihistamin',
                        'deskripsi' => 'Obat untuk mengurangi reaksi alergi.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Diuretik',
                        'deskripsi' => 'Obat untuk meningkatkan produksi urin.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Obat Tidur',
                        'deskripsi' => 'Obat untuk membantu tidur.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antikoagulan',
                        'deskripsi' => 'Obat untuk mencegah pembekuan darah.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antiplatelet',
                        'deskripsi' => 'Obat untuk mencegah pembentukan gumpalan darah.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antidepresan',
                        'deskripsi' => 'Obat untuk mengatasi depresi.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antipsikotik',
                        'deskripsi' => 'Obat untuk mengobati gangguan psikosis.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antiemetik',
                        'deskripsi' => 'Obat untuk mencegah dan mengobati mual dan muntah.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antikonvulsan',
                        'deskripsi' => 'Obat untuk mencegah atau mengurangi kejang.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Bronkodilator',
                        'deskripsi' => 'Obat untuk melebarkan saluran udara di paru-paru.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Kortikosteroid',
                        'deskripsi' => 'Obat antiinflamasi yang kuat.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Ekspektoran',
                        'deskripsi' => 'Obat untuk mengencerkan dahak sehingga mudah dikeluarkan.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Mukolitik',
                        'deskripsi' => 'Obat untuk mengencerkan dahak.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Laksatif',
                        'deskripsi' => 'Obat untuk melancarkan buang air besar.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antidiarrheal',
                        'deskripsi' => 'Obat untuk mengobati diare.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Antacids',
                        'deskripsi' => 'Obat untuk mengatasi kelebihan asam lambung.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'Proton Pump Inhibitors',
                        'deskripsi' => 'Obat untuk mengurangi produksi asam lambung.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'nama' => 'H2 Blockers',
                        'deskripsi' => 'Obat untuk mengurangi produksi asam lambung.',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ];
                
                Category::insert($data);
            }
        }
    }
