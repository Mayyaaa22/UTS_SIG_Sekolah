<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function index()
    {
        $data = Sekolah::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Data semua sekolah berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $sekolah = Sekolah::find($id);
        if (!$sekolah) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sekolah tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail sekolah berhasil diambil',
            'data' => $sekolah
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'jenis_sekolah' => 'required',
            'status_sekolah' => 'required',
            'akreditasi' => 'required',
            'website' => 'nullable',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $sekolah = Sekolah::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Sekolah berhasil ditambahkan',
            'data' => $sekolah
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $sekolah = Sekolah::find($id);
        if (!$sekolah) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sekolah tidak ditemukan',
                'data' => null
            ], 404);
        }

        $validated = $request->validate([
            'nama' => 'sometimes|required',
            'alamat' => 'sometimes|required',
            'telepon' => 'sometimes|required',
            'email' => 'sometimes|required|email',
            'jenis_sekolah' => 'sometimes|required',
            'status_sekolah' => 'sometimes|required',
            'akreditasi' => 'sometimes|required',
            'website' => 'nullable',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $sekolah->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Sekolah berhasil diperbarui',
            'data' => $sekolah
        ], 200);
    }

    public function destroy($id)
    {
        $sekolah = Sekolah::find($id);
        if (!$sekolah) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sekolah tidak ditemukan',
                'data' => null
            ], 404);
        }

        $sekolah->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Sekolah berhasil dihapus',
            'data' => null
        ], 200);
    }
}
