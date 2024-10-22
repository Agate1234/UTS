<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfilController extends Controller
{
    public function index() {
        $breadcrumb = (object) [
            'title' => 'Profil User',
            'list' => ['Home', 'Profil']
        ];
    
        $activeMenu = 'profil'; // Set menu as active
        $level = LevelModel::all(); // If you're using levels
    
        $page = (object) [
            'title' => 'Profil User'
        ];
    
        $user = auth()->user();
    
        return view('profil.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'user' => $user, // Pass the user to the view
            'activeMenu' => $activeMenu
        ]);
    }    

    public function ubah_foto () {
        return view('profil.ubah_foto');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:4096',
        ]);

        $file = $request->file('foto');

        $fileContents = file_get_contents($file->getRealPath());

        $user = auth()->user(); 
        $user->image = $fileContents;

        $user->save(); 

        return back()->with('success', 'Foto berhasil diperbarui.');
    }

    public function showProfileImage()
    {
        $user = auth()->user();

        if ($user && $user->image) {
            return response($user->image)->header('Content-Type', 'image/jpeg'); // Adjust MIME type accordingly
        } else {
            return response('No image', 404);
        }
    }

    public function ubah () {
        $user = auth()->user();

        return view('profil.ubah_data', ['user' => $user]);
    }

    public function update_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'nama' => 'required|min:3|max:100'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, 
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() 
                ]);
            }

            $user = auth()->user();

            if ($user) {
                $user->update($request->all());
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

    public function ubah_pass(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $user = auth()->user();

            $rules = [
                'username' => 'required|max:20|unique:m_user,username,' . $user->user_id . ',user_id',
                'password' => 'nullable|min:6|max:20'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            if ($user) {
                $user->update($request->all());
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

}