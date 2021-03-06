<?php

namespace App\Http\Controllers\Api\Pemilik;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        try {
            $produks = Produk::where('id_pemilik', Auth::user()->pemilik->id)->get();

            return response()->json([
                'message' => 'berhasil mengambil data berdasarkan user',
                'status' => true,
                'data' => ProdukResource::collection($produks)
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'panjang' => 'required|numeric',
                'lebar' => 'required|numeric',
                'masa_berdiri' => 'required',
                'sisi' => 'required',
                'keterangan' => 'required|',
                'harga_sewa' => 'required|numeric',
                'foto' => 'required|file|image',
                'alamat' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors(),
                    'status' => false,
                    'data' => (object)[]
                ]);
            }

//            $photo = $request->file('foto');
//            $filename = time() . '.' . $photo->getClientOriginalExtension();
//            $filepath = 'produk/' . $filename;
//            Storage::disk('s3')->put($filepath, file_get_contents($photo));


            $response = cloudinary()->upload($request->file('foto')->getRealPath(),
                array("folder" => "produk", "overwrite" => TRUE, "resource_type" => "image"))->getSecurePath();


            $produk = new Produk();
            $produk->id_pemilik = Auth::user()->pemilik->id;
            $produk->id_kecamatan = $request->id_kecamatan;
            $produk->type = $request->type;
            $produk->panjang = $request->panjang;
            $produk->lebar = $request->lebar;
            $produk->masa_berdiri = $request->masa_berdiri;
            $produk->sisi = $request->sisi;
            $produk->keterangan = $request->keterangan;
            $produk->harga_sewa = $request->harga_sewa;
            $produk->foto = $response;
            $produk->alamat = $request->alamat;
            $produk->status = true;
            $produk->save();

            return response()->json([
                'message' => 'berhasil menambahkan data',
                'status' => true,
                'data' => (object)[]
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'panjang' => 'numeric',
                'lebar' => 'numeric',
                'masa_berdiri' => 'required',
                'sisi' => 'required',
                'harga_sewa' => 'numeric',
                'foto' => 'file|image',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors(),
                    'status' => false,
                    'data' => (object)[]
                ]);
            }

            $produk = Produk::findOrFail($id);
            $produk->id_kecamatan = $request->id_kecamatan ?? $produk->id_kecamatan ;
            $produk->panjang = $request->panjang ?? $produk->panjang;
            $produk->lebar = $request->lebar ?? $produk->lebar ;
            $produk->masa_berdiri = $request->masa_berdiri ?? $produk->masa_berdiri;
            $produk->sisi = $request->sisi ?? $produk->sisi;
            $produk->keterangan = $request->keterangan ?? $produk->keterangan;
            $produk->harga_sewa = $request->harga_sewa ?? $produk->harga_sewa;
            $produk->alamat = $request->alamat ?? $produk->alamat;
            $produk->update();


            return response()->json([
                'message' => 'berhasil update',
                'status' => true,
                'data' => (object)[]
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }


    public function updatePhoto(Request $request, $id)
    {
//        $photo = $request->file('foto');
//        $filename = time() . '.' . $photo->getClientOriginalExtension();
//        $filepath = 'produk/' . $filename;
//        Storage::disk('s3')->put($filepath, file_get_contents($photo));



        if ($request->hasFile('foto')){
            $response = cloudinary()->upload($request->file('foto')->getRealPath(),
                array("folder" => "produk", "overwrite" => TRUE, "resource_type" => "image"))->getSecurePath();
            $produk = Produk::findOrFail($id);
            $produk->foto = $response;
            $produk->update();
        }

        return response()->json([
            'message' => 'berhasil update',
            'status' => true,
            'data' => (object)[]
        ]);
    }

    public function delete($id)
    {
        try {
            $produk = Produk::find($id);
            $produk->delete();

            return response()->json([
                'message' => 'Berhasil Dihapus',
                'status' => true,
                'data' => (object)[]
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }
}
