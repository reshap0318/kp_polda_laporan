@extends('layouts.frontend')
@section('title')
  List Kasus
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Daftar Kasus</h2>
    <ul class="nav navbar-right panel_toolbox">
      @if (Sentinel::getUser()->hasAccess(['kasus.create']))
        <a href="{{route('kasus.create')}}" class="btn btn-success">New Kasus</a>
      @endif
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-bordered table-striped table-hover" id="tblkasus">
      <thead>
        <tr class="headings">
          <th class="text-center">No</th>
          <th>Nama Kasus</th>
          <th>Email Tujuan</th>
          <th class="no-link last"><span class="nobr">Action</span></th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>
        <?php $no=0?>
      <tbody>
        @foreach($kasuss as $kasus)
              <td class=" text-center">{{ ++$no }}</td>
              <td class=" ">{{$kasus->nama_kasus}}</td>
              <td class=" ">{{$kasus->email}}</td>
              <td class=" last">
                @if (Sentinel::getUser()->hasAccess(['kasus.edit']))
                  <a href="{{route('kasus.edit', $kasus->id)}}" class="btn btn-success btn-xs">edit</a>
                @endif
                @if (Sentinel::getUser()->hasAccess(['kasus.destroy']))
                  {!! Form::open(['method'=>'DELETE', 'route' => ['kasus.destroy', $kasus->id], 'style' => 'display:inline']) !!}
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
      table = $('#tblkasus').DataTable({
          'columnDefs': [{
             'targets': 0,
             'searchable':false,
             'orderable':false,
            }],
        });
    });

  $("input#delete-confirm").on("click", function(){
      return confirm("Yakin Ingin Menghapus Kasus Ini?");
  });

</script>
@stop
