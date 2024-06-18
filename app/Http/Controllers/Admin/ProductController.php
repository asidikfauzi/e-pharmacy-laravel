<?php

    namespace App\Http\Controllers\Admin;

    use App\Helper\Storage;
    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\ProductHasCategories;
    use Illuminate\Http\Request;
    use RealRashid\SweetAlert\Facades\Alert;
    use Yajra\DataTables\Facades\DataTables;

    class ProductController extends Controller
    {
        public function index()
        {
            return view('admin.product.index');
        }

        public function getData()
        {
            $products = Product::all();

            foreach ($products as $value) {
                $categories = Category::select('categories.*')
                    ->join('product_has_categories as phs', 'phs.category_id', '=', 'categories.id')
                    ->where('phs.product_id', $value->id)
                    ->whereNull('phs.deleted_at')
                    ->get();

                $categoryName = "";
                foreach ($categories as $key => $category) {
                    if($key > 0 ){
                        $categoryName .= ", ";
                    }
                    $categoryName .= $category->nama;
                }

                $value->categories = $categoryName;
            }

            return DataTables::of($products)->addIndexColumn()
                ->addColumn('edit', function($row){
                    return
                        '<a href="'.route('admin.product.edit', $row->id).'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16" style="color: green">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>';
                })->addColumn('delete', function($row){
                    return
                        '<a class="modal-deletetab" href="#" data-id="'.$row->id.'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16" style="color: red">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg>
                        </a>';
                })->addColumn('image', function($row){
                    if ($row->image) {
                        $image = Storage::getImageProduct($row->image);
                        return
                            '<a href="'.$image.'" target="_blank">
                                <img src="'.$image.'" alt="image" style="width: 50px; height: 50px;">
                            </a>';
                        }
                })->rawColumns([
                    'edit',
                    'delete',
                    'image'
                ])->make(true);
        }

        public function create()
        {
            $categories = Category::all();
            $index = 0;

            return view('admin.product.create', compact('categories', 'index'));
        }

        public function store(Request $request)
        {
            \DB::beginTransaction();

            try
            {
                $product = new Product();
                $product->nama = $request->nama;
                $product->price = $request->price;
                $product->stok = $request->stok;
                $product->deskripsi = $request->deskripsi;
                $product->indikasi_umum = $request->indikasi_umum;
                $product->komposisi = $request->komposisi;
                $product->dosis = $request->dosis;
                $product->aturan_pakai = $request->aturan_pakai;
                $product->perhatian = $request->perhatian;
                $product->kontra_indikasi = $request->kontra_indikasi;
                $product->efek_samping = $request->efek_samping;
                $product->golongan_produk = $request->golongan_produk;
                $product->kemasan = $request->kemasan;
                $product->manufaktur = $request->manufaktur;

                if ($request->hasFile('image')) {
                    $image = Storage::uploadImageProduct($request->file('image'));
                    $product->image = $image;
                }
                $product->save();


                foreach ($request->categories as $category) {
                    $productCategory = new ProductHasCategories();
                    $productCategory->product_id = $product->id;
                    $productCategory->category_id = $category;
                    $productCategory->save();
                }

                \DB::commit();

                Alert::success('Success', 'Sukses menambah data product');
                return redirect()->route('admin.product.index');

            } catch (\Exception $e) {
                \DB::rollback();
                Alert::error('Error', $e->getMessage());
                return back();
            }
        }

        public function edit($id)
        {
            $index = 0;
            $product = Product::find($id);
            $categories = Category::all();
            $selectedCategories = $product->categories()
                ->whereNull('product_has_categories.deleted_at')
                ->pluck('categories.id')
                ->toArray();

            return view('admin.product.update', compact('product','categories', 'selectedCategories', 'index'));
        }

        public function update(Request $request, $id)
        {
            \DB::beginTransaction();

            try
            {
                $product = Product::find($id);
                $product->nama = $request->nama;
                $product->price = $request->price;
                $product->stok = $request->stok;
                $product->deskripsi = $request->deskripsi;
                $product->indikasi_umum = $request->indikasi_umum;
                $product->komposisi = $request->komposisi;
                $product->dosis = $request->dosis;
                $product->aturan_pakai = $request->aturan_pakai;
                $product->perhatian = $request->perhatian;
                $product->kontra_indikasi = $request->kontra_indikasi;
                $product->efek_samping = $request->efek_samping;
                $product->golongan_produk = $request->golongan_produk;
                $product->kemasan = $request->kemasan;
                $product->manufaktur = $request->manufaktur;

                if ($request->hasFile('image')) {
                    $image = Storage::uploadImageProduct($request->file('image'));
                    $product->image = $image;
                }
                $product->save();

                $categories = ProductHasCategories::where('product_id', $id)->get();

                foreach ($categories as $value) {
                    $value->delete();
                }

                foreach ($request->categories as $category) {
                    $productCategory = new ProductHasCategories();
                    $productCategory->product_id = $product->id;
                    $productCategory->category_id = $category;
                    $productCategory->save();
                }

                \DB::commit();

                Alert::success('Success', 'Sukses mengubah data product');
                return redirect()->route('admin.product.index');

            } catch (\Exception $e) {
                \DB::rollback();
                Alert::error('Error', $e->getMessage());
                return back();
            }
        }

        public function destroy($id)
        {
            $category = Product::find($id);
            $category->delete();

            Alert::success('Success', 'Sukses menghapus data produk');
            return redirect()->route('admin.product.index');
        }
    }
