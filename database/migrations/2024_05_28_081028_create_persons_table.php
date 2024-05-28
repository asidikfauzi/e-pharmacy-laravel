<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        public function up()
        {
            Schema::create('persons', function (Blueprint $table) {
                $table->id();
                
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                
                $table->string('nama');
                $table->string('no_telp');
                $table->string('tgl_lahir');
                $table->string('jenis_kelamin');
                $table->string('bio');
                $table->string('image');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        
        public function down()
        {
            Schema::dropIfExists('persons');
        }
    };
