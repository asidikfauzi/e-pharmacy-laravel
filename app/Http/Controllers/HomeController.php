<?php

    namespace App\Http\Controllers;

    use App\Models\Category;
    use App\Models\Product;
    use Illuminate\Http\Request;

    class HomeController extends Controller
    {
        public function index(Request $request)
        {
            $query = Product::select('products.*')
                ->join('product_has_categories as phs', 'products.id', '=', 'phs.product_id')
                ->groupBy('products.id');

            $categories = Category::all();

            $sliderProduct = $query->take(10)->get();

            if ($request->has('category_id') && $request->category_id != 'all') {
                $query->where('phs.category_id', $request->category_id);
            }
            $products = $query->take(8)->get();

            if ($request->ajax()) {
                return view('partials.products', compact('products'))->render();
            }

            return view('welcome', compact('categories', 'sliderProduct', 'products'));
        }

        public function shop(Request $request)
        {
            $query = Product::select('products.*')
                ->join('product_has_categories as phs', 'products.id', '=', 'phs.product_id')
                ->groupBy('products.id');

            $categories = Category::all();

            if ($request->has('category_id') && $request->category_id != 'all') {
                $query->where('phs.category_id', $request->category_id);
            }

            if ($request->has('search') && $request->search != '') {
                $query->where('products.name', $request->search);
                $query->orWhere('products.indikasi', $request->search);
            }

            $products = $query->paginate(9);
            $count = $products->total();

            if ($request->ajax()) {
                return view('partials.products', compact('products'))->render();
            }

            return view('shop', compact('categories', 'products', 'count'));
        }

        public function show($id)
        {
            $product = Product::findOrFail($id);
            $categories = Category::select('categories.*')
                ->join('product_has_categories as phs', 'phs.category_id', '=', 'categories.id')
                ->where('phs.product_id', $product->id)
                ->whereNull('phs.deleted_at')
                ->get();

            $categoryName = "";
            foreach ($categories as $key => $category) {
                if($key > 0 ){
                    $categoryName .= ", ";
                }
                $categoryName .= $category->nama;
            }

            $product->categories = $categoryName;

            return view('detail', compact('product'));
        }
    }
