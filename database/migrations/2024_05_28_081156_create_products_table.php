<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        public function up()
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('price');
                $table->integer('stok');
                $table->text('deskripsi')->nullable();
                $table->text('indikasi_umum')->nullable();
                $table->text('komposisi')->nullable();
                $table->text('dosis')->nullable();
                $table->string('aturan_pakai')->nullable();
                $table->text('perhatian')->nullable();
                $table->text('kontra_indikasi')->nullable();
                $table->text('efek_samping')->nullable();
                $table->string('golongan_produk')->nullable();
                $table->string('kemasan')->nullable();
                $table->string('manufaktur')->nullable();
                $table->string('image')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
        
        public function down()
        {
            Schema::dropIfExists('products');
        }
    };
