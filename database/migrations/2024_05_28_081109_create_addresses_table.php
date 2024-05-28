<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        public function up()
        {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id();
                
                $table->unsignedBigInteger('person_id');
                $table->foreign('person_id')->references('id')->on('persons');
                
                $table->string('jalan');
                $table->string('kota');
                $table->string('provinsi');
                $table->string('kode_pos');
                $table->string('negara');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        
        public function down()
        {
            Schema::dropIfExists('addresses');
        }
    };
