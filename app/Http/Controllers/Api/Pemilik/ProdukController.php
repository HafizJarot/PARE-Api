<?php

namespace App\Http\Controllers\Api\Pemilik;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(){
	    try{
	        $produk = Produk::where('id_user', Auth::user()->id);

	        return response()->json([
                'message' => 'berhasil',
                'status' => true,
                'data' => $produk
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
               'panjang' => 'required|numeric',
               'lebar' => 'required|numeric',
               'masa_berlaku' => 'required',
               'keterangan' => 'required|',
               'harga_sewa' => 'required|numeric',
               'foto' => 'required|file|image',
                'alamat' => 'required'
            ]);

            if ($validator->fails()){
                return response()->json([
                    'message' => $validator->errors(),
                    'status' => false,
                    'data' => (object)[]
                ]);
            }

            $photo = $request->file('foto');
            $path = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('uploads/produk');
            $photo->move($destinationPath, $path);

            $produk = new Produk();
            $produk->id_user = Auth::user()->id;
            $produk->panjang = $request->panjang;
            $produk->lebar = $request->lebar;
            $produk->masa_berlaku = $request->masa_berlaku;
            $produk->keterangan = $request->keterangan;
            $produk->harga_sewa = $request->harga_sewa;
            $produk->foto = $path;
            $produk->alamat = $request->alamat;
            $produk->status = false;
            $produk->save();

            return response()->json([
                'message' => 'berhasil menambahkan data',
                'status' => true,
                'data' => new ProdukResource($produk)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function update(Request $request,$id){
        try{
            $validator = Validator::make($request->all(),[
                'panjang' => 'numeric',
                'lebar' => 'numeric',
                'harga_sewa' => 'numeric',
                'foto' => 'file|image',
            ]);

            if ($validator->fails()){
                return response()->json([
                    'message' => $validator->errors(),
                    'status' => false,
                    'data' => (object)[]
                ]);
            }

            $produk = Produk::findOrFail($id);
            $produk->id_user = Auth::user()->id;
            $produk->panjang = $request->panjang;
            $produk->lebar = $request->lebar;
            $produk->masa_berlaku = $request->masa_berlaku;
            $produk->keterangan = $request->keterangan;
            $photo = $request->file('foto');
            if ($photo){
                $path = time() . '.' . $photo->getClientOriginalExtension();
                $destinationPath = public_path('uploads/produk');
                $photo->move($destinationPath, $path);
                $produk->foto = $path;
            }
            $produk->harga_sewa = $request->harga_sewa;
            $produk->alamat = $request->alamat;
            $produk->status = false;
            $produk->update();

            return response()->json([
                'message' => 'berhasil update',
                'status' => true,
                'data' => new ProdukResource($produk)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function delete ($id) {

	    try{
	        $produk = Produk::find($id);
	        $produk->delete();

            return response()->json([
                'message' => 'Berhasil Dihapus',
                'status' => true,
                'data' => (object)[]
            ]);

        } catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }
}