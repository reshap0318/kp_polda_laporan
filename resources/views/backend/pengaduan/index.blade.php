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
      <a href="#" class="btn btn-success">Cetak Laporan @if($pp==1)
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
              <td class=" ">{{limit_words($pengaduan->pengaduan,50)}}</td>
              <td class=" last">
                @if (Sentinel::getUser()->hasAccess(['pengaduan.edit']))
                  <a href="{{route('pengaduan.edit', $pengaduan->id)}}" class="btn btn-success btn-xs">edit</a>
                @endif
                @if (Sentinel::getUser()->hasAccess(['pengaduan.destroy']))
                  {!! Form::open(['method'=>'DELETE', 'route' => ['pengaduan.destroy', $pengaduan->id], 'style' => 'display:inline']) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs','id'=>'delete-confirm']) !!}
                  {!! Form::close() !!}
                @endif
              </td>
              </tr>
        @endforeach
      </tbody>
    </table>
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
