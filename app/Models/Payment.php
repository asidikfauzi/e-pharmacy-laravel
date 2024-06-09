<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    
    class Payment extends Model
    {
        use SoftDeletes;
        protected $table = 'payments';
        protected $guarded = [];
        
        public static function generateInvoiceCode()
        {
            do {
                $code = 'INV-' . strtoupper(\Str::random(8));
            } while (self::where('nota', $code)->exists());
            
            return $code;
        }
    }
