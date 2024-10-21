<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\SupplierModel;
use App\Models\UserModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok']
        ];
       
           $page = (object) [
            'title' => 'Daftar stok yang terdaftar dalam sistem'
        ];
       
           $activeMenu = 'stok';
       
          return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $stoks = StokModel::select('stok_id', 'supplier_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah')
                ->with(['supplier','barang', 'user']);

        return DataTables::of($stoks)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) {
                return '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ' .
                       '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ' .
                       '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        $supplier = SupplierModel::select('supplier_id', 'supplier_name')->get();
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();
        $user = UserModel::select('user_id', 'nama')->get();

        return view('stok.create_ajax')
                ->with('supplier', $supplier)
                ->with('barang', $barang)
                ->with('user', $user);
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) { 

            $rules = [
                'supplier_id' => 'required|integer',
                'barang_id' => 'required|integer',
                'user_id' => 'required|integer',
                'stok_tanggal' => 'required|date',
                'stok_jumlah' => 'required|integer',
            ];

            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            StokModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil disimpan'
            ]);
        }

        return redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $stok = StokModel::find($id);
        
        $supplier = SupplierModel::select('supplier_id', 'supplier_name')->get();
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();
        $user = UserModel::select('user_id', 'nama')->get();

        return view('user.edit_ajax', ['stok' => $stok, 'supplier' => $supplier, 'barang' => $barang, 'user' => $user]);
    }

    public function update_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) { 

            $rules = [
                'supplier_id' => 'required|integer',
                'barang_id' => 'required|integer',
                'user_id' => 'required|integer',
                'stok_tanggal' => 'required|date',
                'stok_jumlah' => 'required|integer',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $check = StokModel::find($id);

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
        $stok = StokModel::find($id);

        return view('stok.confirm_ajax', ['stok' => $stok]);
    }

    public function delete_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $stok = StokModel::find($id);

            if ($stok) {
                $stok->delete();
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

    public function export_pdf()
    {
        $stok = StokModel::with(['supplier', 'barang', 'user'])->get();

        $pdf = Pdf::loadView('stok.export_pdf', ['stok' => $stok]);
        return $pdf->stream('Data Stok ' . date('Y-m-d H:i:s') . '.pdf');
    }

    public function show_ajax(string $id)
    {
        $stok = StokModel::find($id);

        if ($stok) {
            return view('stok.show_ajax', ['stok' => $stok]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }
}