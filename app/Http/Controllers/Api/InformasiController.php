<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class InformasiController extends Controller
{
    public function informasi()
    {
        $informasi = Informasi::all();

        if($informasi){
            return ApiFormater::createApi(200, 'Data Berhasil', $informasi);
        }else{
            return ApiFormater::createApi(400, 'Data Gagal');
        }
    }

    public function show($id)
    {
        $informasi = Informasi::where('id', '=', $id)->get();
        
        if($informasi){
            return ApiFormater::createApi(200, 'Data Berhasil Ditampilkan', $informasi);
        }else{
            return ApiFormater::createApi(400, 'Data Gagal Diinput');
        }
    }

    public function store(Request $request)
    {
        $request->validate([        

            'judul' => 'required',
            'keterangan_pekerjaan' => 'required',
            'tanggal' => 'required',
            'status_pekerjaan' => 'required',

        ]);

        $informasi = Informasi::create([

            'judul' => $request->judul,
            'keterangan_pekerjaan' => $request->keterangan_pekerjaan,
            'tanggal' => $request->tanggal,
            'status_pekerjaan' => $request->status_pekerjaan,

        ]);

        if($informasi){
            return ApiFormater::createApi(200, 'Data Berhasil Diinput', $informasi);
        }else{
            return ApiFormater::createApi(400, 'Data Gagal Diinput');
        }

    }

    public function update(Request $request, $id)
    {
        
         $informasi = Informasi::where("id", $id)
        ->update([

            'judul' => $request->judul,
            'keterangan_pekerjaan' => $request->keterangan_pekerjaan,
            'tanggal' => $request->tanggal,
            'status_pekerjaan' => $request->status_pekerjaan,

        ]);

        if($informasi){
            return ApiFormater::createApi(200, 'Data Berhasil Diupdate', $informasi);
        }else{
            return ApiFormater::createApi(400, 'Data Gagal Diupdate');
        }

    }

    public function destroy($id)
    {
        try {
            $informasi = Informasi::findOrFail($id);

            $informasi = $informasi->delete();
    
            if($informasi){
                return ApiFormater::createApi(200, 'Data Berhasil Dihapus');
            }else{
                return ApiFormater::createApi(400, 'Data Gagal Dihapus');
            } 
        } catch (Exception $error) {
            return ApiFormater::createApi(400, 'Data Gagal Dihapus');
        }
       
    }
}

