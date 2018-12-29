<?php

namespace App\Http\Controllers;

use App\pengaduan_masyarakat as pengaduan;
use Illuminate\Http\Request;
use App\Role;

class PengaduanMasyarakatController extends Controller
{

    public function index(Request $request)
    {
      if($request->jenis){
        $pengaduans = null;
        $pp=0;
        if($request->jenis=='Pengaduan Masyarakat'){
          $pp=1;
          $pengaduans = pengaduan::where('jenis',1)->get();
        }elseif($request->jenis=='Pengaduan Pungli'){
          $pp=2;
          $pengaduans = pengaduan::where('jenis',2)->get();
        }elseif($request->jenis=='Pengaduan Penanganan Perkara'){
          $pp=3;
          $pengaduans = pengaduan::where('jenis',3)->get();
        }else{
          return view('frontend.404');
        }
        return view('backend.pengaduan.index',compact('pengaduans','pp'));
      }else{
        return view('frontend.404');
      }

    }


    public function create(Request $request)
    {
      //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(pengaduan_masyarakat $pengaduan_masyarakat)
    {
        return view('backend.pengaduan.show',compact('pengaduan_masyarakat'));
    }

    public function edit(pengaduan_masyarakat $pengaduan_masyarakat)
    {
        //
    }

    public function update(Request $request, pengaduan_masyarakat $pengaduan_masyarakat)
    {
        //
    }

    public function destroy(pengaduan_masyarakat $pengaduan_masyarakat)
    {
        //
    }
}
