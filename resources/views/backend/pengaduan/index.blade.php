@extends('layouts.frontend')
@section('title')
  Daftar Laporan @if($pp==1)
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
    <h2>Daftar Laporan @if($pp==1)
      Pengaduan Masyarakat
      @elseif($pp==2)
      Pengaduan Pungli
      @elseif($pp==3)
      Pengaduan Penanganan Perkara
    @endif</h2>
    <ul class="nav navbar-right panel_toolbox">
      <a data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-success">Cetak Laporan @if($pp==1)
        Pengaduan Masyarakat
        @elseif($pp==2)
        Pengaduan Pungli
        @elseif($pp==3)
        Pengaduan Penanganan Perkara
      @endif</a>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-bordered table-striped table-hover" id="tbllprn">
      <thead>
        <tr class="headings">
          <th class="text-center">No</th>
          <th>Nama</th>
          <th>Perihal</th>
          <th>Pengaduan</th>
          <th class="no-link last"><span class="nobr">Action</span></th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>
        <?php $no=0;
          function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
          }
        ?>
      <tbody>
        @foreach($pengaduans as $pengaduan)
              <td class=" text-center">{{ ++$no }}</td>
              <td class=" ">{{$pengaduan->nama}}</td>
              <td class=" ">
                @foreach($pengaduan->listkasus as $kasus)
                  {{$kasus->nama_kasus}},
                @endforeach
              </td>
              <td class=" ">{{limit_words($pengaduan->pengaduan,19)}}</td>
              <td class=" last">
                @if (Sentinel::getUser()->hasAccess(['pengaduan.edit']))
                  <a href="{{route('pengaduan.show', $pengaduan->id)}}" class="btn btn-success btn-xs">Detail</a>
                @endif
              </td>
              </tr>
        @endforeach
      </tbody>
    </table>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <form action="{{url('cetak')}}" method="GET">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Modal title</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" name="jenis" value="{{$pp}}">
                dari : <input type="date" name="waktua" value=""><br>
                sampai : <input type="date" name="waktub" value="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>

            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
      table = $('#tbllprn').DataTable({
          'columnDefs': [{
             'targets': 0,
             'searchable':false,
             'orderable':false,
            }],
        });
    });

  $("input#delete-confirm").on("click", function(){
      return confirm("Yakin Ingin Menghapus Pengaduan Ini?");
  });

</script>
@stop
