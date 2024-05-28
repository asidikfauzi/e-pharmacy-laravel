<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        public function up()
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('price');
                $table->integer('stok');
                $table->text('deskripsi');
                $table->text('indikasi_umum');
                $table->text('komposisi');
                $table->text('dosis');
                $table->string('aturan_pakai');
                $table->text('perhatian');
                $table->text('kontra_indikasi');
                $table->text('efek_samping');
                $table->string('golongan_produk');
                $table->string('kemasan');
                $table->string('manufaktur');
                $table->string('image');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        
        public function down()
        {
            Schema::dropIfExists('products');
        }
    };
