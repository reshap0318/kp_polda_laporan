<?php

namespace App\Http\Controllers;

use App\pengaduan_masyarakat as pengaduan;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        $pengaduan = pengaduan::find($id);
        return view('backend.pengaduan.show',compact('pengaduan'));
    }

    public function cetak(Request $request)
    {
      if($request->jenis && $request->waktua && $request->waktub){
        $pengaduans = null;
        if($request->jenis=='1'){
          $pp=1;
          $pengaduans = pengaduan::whereraw("jenis = 1 AND waktu_kejadian BETWEEN '$request->waktua' AND '$request->waktub'")->get();
        }elseif($request->jenis=='2'){
          $pp=2;
          $pengaduans = pengaduan::whereraw("jenis = 2 AND waktu_kejadian BETWEEN '$request->waktua' AND '$request->waktub'")->get();
        }elseif($request->jenis=='3'){
          $pp=3;
          $pengaduans = pengaduan::whereraw("jenis = 3 AND waktu_kejadian BETWEEN '$request->waktua' AND '$request->waktub'")->get();
        }else{
          return view('frontend.404');
        }
        return view('backend.pengaduan.cetakall',compact('pengaduans','pp'));
      }else{
        return redirect()->back();
      }
    }
}
