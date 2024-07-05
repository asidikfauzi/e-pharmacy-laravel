<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void
	{
		Schema::table('payments', function (Blueprint $table) {
            // Drop the existing status column
            DB::table('payments')->update(['status' => 'PENDING']);

            // Add the new enum status column with default value 'PENDING'
            $table->enum('status', ['PENDING', 'FAILED', 'SUCCESS'])->default('PENDING')->change();
		});
	}

	public function down(): void
	{
		Schema::table('payments', function (Blueprint $table) {
			//
            // Ubah kembali tipe kolom status menjadi boolean
            $table->boolean('status')->default(false)->change();
		});
	}
};
