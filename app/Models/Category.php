<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    
    class Category extends Model
    {
        use SoftDeletes;
        protected $table = 'categories';
        protected $guarded = [];
        
        public function products()
        {
            return $this->belongsToMany(Product::class, 'product_has_categories', 'category_id', 'product_id');
        }
    }
