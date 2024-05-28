<?php
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    
    class ProductHasCategories extends Model
    {
        use SoftDeletes;
        protected $table = 'product_has_categories';
        protected $guarded = [];
    }
