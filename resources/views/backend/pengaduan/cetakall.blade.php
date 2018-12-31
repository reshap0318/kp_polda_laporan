@extends('layouts.frontend')
@section('title')
  Cetak Semua Laporan @if($pp==1)
    Pengaduan Masyarakat
    @elseif($pp==2)
    Pengaduan Pungli
    @elseif($pp==3)
    Pengaduan Penanganan Perkara
  @endif
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Cetak Semua Laporan @if($pp==1)
      Pengaduan Masyarakat
      @elseif($pp==2)
      Pengaduan Pungli
      @elseif($pp==3)
      Pengaduan Penanganan Perkara
    @endif</h2>
    <ul class="nav navbar-right panel_toolbox">
      <a onclick="printContent('cetak')" class="btn btn-success">Cetak Laporan @if($pp==1)
        Pengaduan Masyarakat
        @elseif($pp==2)
        Pengaduan Pungli
        @elseif($pp==3)
        Pengaduan Penanganan Perkara
      @endif</a>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content" id="cetak">
    @foreach($pengaduans as $pengaduan)
      @include('backend.pengaduan.detail')
    @endforeach
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
