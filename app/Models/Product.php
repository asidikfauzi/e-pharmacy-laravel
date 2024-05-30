<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    
    class Product extends Model
    {
        use SoftDeletes;
        protected $table = 'products';
        protected $guarded = [];
        
        public function categories()
        {
            return $this->belongsToMany(Category::class, 'product_has_categories', 'product_id', 'category_id');
        }
    }
