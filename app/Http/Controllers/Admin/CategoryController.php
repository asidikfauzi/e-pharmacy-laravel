<?php
    
    namespace App\Http\Controllers\Admin;
    
    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use Illuminate\Http\Request;
    use RealRashid\SweetAlert\Facades\Alert;
    use Yajra\DataTables\Facades\DataTables;
    
    class CategoryController extends Controller
    {
        public function index()
        {
            return view('admin.category.index');
        }
        
        public function getData()
        {
            $category = Category::all();
            
            return DataTables::of($category)->addIndexColumn()
                ->addColumn('edit', function($row){
                    return
                        '<a href="'.route('admin.category.edit', $row->id).'">
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
                })->rawColumns([
                    'edit',
                    'delete',
                ])->make(true);
        }
        
        public function create()
        {
            return view('admin.category.create');
        }
        
        public function store(Request $request)
        {
            $category = new Category();
            $category->nama = $request->nama;
            $category->deskripsi = $request->deskripsi;
            $category->save();
            
            Alert::success('Success', 'Sukses menambah data kategori');
            return redirect()->route('admin.category.index');
        }
        
        public function edit($id)
        {
            $category = Category::find($id);
            
            return view('admin.category.update', compact('category'));
        }
        
        public function update(Request $request, $id)
        {
            $category = Category::find($id);
            $category->nama = $request->nama;
            $category->deskripsi = $request->deskripsi;
            $category->save();
            
            Alert::success('Success', 'Sukses mengubah data kategori');
            return redirect()->route('admin.category.index');
        }
        
        public function destroy($id)
        {
            $category = Category::find($id);
            $category->delete();
            
            Alert::success('Success', 'Sukses menghapus data kategori');
            return redirect()->route('admin.category.index');
        }
    }
