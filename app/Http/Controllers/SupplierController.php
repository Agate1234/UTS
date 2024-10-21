<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\support\Facades\Validator;

class SupplierController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
           ];
       
           $page = (object) [
            'title' => 'Daftar supplier yang terdaftar dalam sistem'
           ];
       
           $activeMenu = 'supplier';
       
          return view('supplier.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $supplier = SupplierModel::select('supplier_id', 'supplier_kode', 'supplier_name', 'supplier_alamat');

        return DataTables::of($supplier)
            ->addIndexColumn() 
            ->addColumn('aksi', function ($sup) { 
            /* $btn = '<a href="'.url('/supplier/' . $sup->supplier_id).'" class="btn btn-info btnsm">Detail</a> ';
            $btn .= '<a href="'.url('/supplier/' . $sup->supplier_id . '/edit').'" class="btn btnwarning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/sup/'.$supplier->supplier_id).'">'
            . csrf_field() . method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return
            confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';*/
            $btn = '<button onclick="modalAction(\''.url('/supplier/' . $sup->supplier_id . '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> ';
            $btn .= '<button onclick="modalAction(\''.url('/supplier/' . $sup->supplier_id . '/edit_ajax').'\')" class="btn btn-warning btn-sm">Edit</button> ';
            $btn .= '<button onclick="modalAction(\''.url('/supplier/' . $sup->supplier_id . '/delete_ajax').'\')" class="btn btn-danger btn-sm">Hapus</button> ';

            return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function create() {
        $breadcrumb = (object) [
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Supplier Baru'
        ];

        $activeMenu = 'supplier';
        
        return view('supplier.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store (Request $request) {
        $request->validate([
            'supplier_kode' => 'required|string|min:3|unique:m_supplier,supplier_kode',
            'supplier_name' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:225'
        ]);

        SupplierModel::create([
            'supplier_kode' => $request->supplier_kode,
            'supplier_name' => $request->supplier_name,
            'supplier_alamat' => $request->supplier_alamat
        ]);

        return redirect('/supplier')->with('success', 'Data Supplier berhasil disimpan');
    }

    public function show (string $id) {
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];

        $page = (object) [
            'title' =>  'Detail Supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'supplier' => $supplier, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id) {
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Supplier'
        ];

        $activeMenu = 'supplier'; 

        return view('supplier.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'supplier' => $supplier, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'supplier_kode' => 'required|string|min:3|unique:m_supplier,supplier_kode',
            'supplier_name' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:225'
        ]);

        SupplierModel::find($id)->update([
            'supplier_kode' => $request->supplier_kode,
            'supplier_name' => $request->supplier_name,
            'supplier_alamat' => $request->supplier_alamat
        ]);

        return redirect('/supplier')->with('success', 'Data Supplier berhasil diubah');
    }

    public function destroy(string $id) {
        $check = SupplierModel::find($id);
        if(!$check) { 
            return redirect('/supplier')-with('error', 'Data supplier tidak ditemukan');
        }

        try{
            SupplierModel::destroy($id); 

            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus');
        }catch (\Illuminate\Database\QueryException $e){

            return redirect('/supplier')->with('error', 'Data supplier gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function create_ajax() {
        return view('supplier.create_ajax');
    }

    public function store_ajax(Request $request) {
        //cek apakah request berupa ajax
        if($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode' => 'required|string|min:3|unique:m_supplier,supplier_kode',
                'supplier_name' => 'required|string|max:100',
                'supplier_alamat' => 'required|string|max:225'
            ] ;

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            SupplierModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data Supplier berhasil disimpan'
            ]);
        }
        redirect('/');
    }

    public function edit_ajax(string $id) {
        $supplier = SupplierModel::find($id);

        return view('supplier.edit_ajax', ['supplier' => $supplier]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode' => 'required|string|min:3|unique:m_supplier,supplier_kode',
                'supplier_name' => 'required|string|max:100',
                'supplier_alamat' => 'required|string|max:225'
            ] ;

            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, 
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
            $check = SupplierModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function confirm_ajax (string $id) {
        $supplier = SupplierModel::find($id);

        return view('supplier.confirm_ajax', ['supplier' => $supplier]);
    }

    public function delete_ajax (Request $request, $id) {
        if ($request->ajax() || $request->wantsJson()) {
            $user = SupplierModel::find($id);
            if ($user) {
                $user->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'    
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function show_ajax(string $id)
    {
        $supplier = SupplierModel::find($id);

        if ($supplier) {
            return view('supplier.show_ajax', ['supplier' => $supplier]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }
}
