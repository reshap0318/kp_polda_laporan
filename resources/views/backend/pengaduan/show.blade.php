@extends('layouts.frontend')
@section('title')
  Detail {{$pengaduan->nama}}#{{$pengaduan->waktu_kejadian}}
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Detail Pengaduan {{$pengaduan->nama}}#{{$pengaduan->waktu_kejadian}}</h2>
    <ul class="nav navbar-right panel_toolbox">
      <a onclick="printContent('cetak')" class="btn btn-success">Cetak Laporan</a>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" id="cetak">
    @include('backend.pengaduan.detail')
  </div>
</div>

<script>
  function printContent(el){
  	var restorepage = document.body.innerHTML;
  	var printcontent = document.getElementById(el).innerHTML;
  	document.body.innerHTML = printcontent;
  	window.print();
  	document.body.innerHTML = restorepage;
  }
</script>
@endsection
