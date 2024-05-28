<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        public function up()
        {
            Schema::create('product_has_categories', function (Blueprint $table) {
                $table->id();
                
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')->references('id')->on('categories');
                
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
        
        public function down()
        {
            Schema::dropIfExists('product_has_categories');
        }
    };
