<?php

namespace App\Http\Controllers;

use App\kasus;
use Illuminate\Http\Request;

class KasusController extends Controller
{
  public function index()
  {
      $kasuss = kasus::all();
      return view('backend.kasus.index',compact('kasuss'));
  }


  public function create()
  {
      return view('backend.kasus.create');
  }

  public function store(Request $request)
  {
      $request->validate([
        'nama_kasus' => 'required',
        'email' => 'required'
      ]);

      $kasus = new kasus;
      $kasus->nama_kasus = $request->nama_kasus;
      $kasus->email = $request->email;
      if($kasus->save()){
        return redirect()->route('kasus.index');
      }else{

      }
  }

  public function show($id)
  {
      return redirect()->back();;
  }

  public function edit($id)
  {
    $kasus = kasus::find($id);
    return view('backend.kasus.edit',compact('kasus'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'nama_kasus' => 'required',
      'email' => 'required'
    ]);

    $kasus = kasus::find($id);
    $kasus->nama_kasus = $request->nama_kasus;
    $kasus->email = $request->email;
    if($kasus->update()){
      return redirect()->route('kasus.index');
    }else{

    }
  }

  public function destroy($id)
  {
      $kasus = kasus::find($id);
      try {
        $kasus->delete();
        return redirect()->route('kasus.index');
      } catch (\Exception $e) {
        toast()->error($e);
        return redirect()->back();
      }

  }
}
