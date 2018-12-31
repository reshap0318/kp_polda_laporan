
<div class="text-center">
    <img src="{{asset('img/koppolisi.png')}}" alt="">
    <h3 style="color:black">Pengaduan Masyarakat</h3>
    <h4 style="color:black">{{$pengaduan->created_at->format('d, M Y')}}</h4>
</div>
<br><br>
<div class="form-group"  style="color:black;font-size:16px;text-align:justify;margin-left:20px">

  <table>
    <thead>
      <th style="width:200px;vertical-align: top;"></th>
      <th style="width:30px;vertical-align: top;"></th>
      <th style="width:500px"></th>
    </thead>
    <tbody>
      <tr>
        <td style="width:200px;vertical-align: top;">Nama Pelapor</td>
        <td style="width:30px;vertical-align: top;"> : </td>
        <td>{{$pengaduan->nama}}</td>
      </tr>
      <tr>
        <td style="width:200px;vertical-align: top;">No Telpon/Hp</td>
        <td style="width:30px;vertical-align: top;"> : </td>
        <td>{{$pengaduan->telpon}}</td>
      </tr>
      <tr>
        <td style="width:200px;vertical-align: top;">Email</td>
        <td style="width:30px;vertical-align: top;"> : </td>
        <td>{{$pengaduan->email}}</td>
      </tr>
      <tr>
        <td style="width:200px;vertical-align: top;">Alamat</td>
        <td style="width:30px;vertical-align: top;"> : </td>
        <td>{{$pengaduan->alamat}}</td>
      </tr>
      <tr>
        <td style="width:200px;vertical-align: top;">Perihal</td>
        <td style="width:30px;vertical-align: top;"> : </td>
        <td>
          @foreach($pengaduan->listkasus as $kasus)
            {{$kasus->nama_kasus}},
          @endforeach
        </td>
      </tr>
      <tr>
        <td style="width:200px;vertical-align: top;">Waktu Kejadian</td>
        <td style="width:30px;vertical-align: top;"> : </td>
        <td>{{$pengaduan->waktu_kejadian}}</td>
      </tr>
      <tr>
        <td style="width:200px;vertical-align: top;">Tempat Kejadian</td>
        <td style="width:30px;vertical-align: top;"> : </td>
        <td>{{$pengaduan->tempat_kejadian}}</td>
      </tr>
      <tr>
        <td style="width:200px;vertical-align: top;">Terlapor</td>
        <td style="width:30px;vertical-align: top;"> : </td>
        <td>{{$pengaduan->terlapor}}</td>
      </tr>
      <tr>
        <td style="width:200px;vertical-align: top;">Ketengan Pengaduan</td>
        <td style="width:30px;vertical-align: top;"> : </td>
        <td>{{$pengaduan->pengaduan}}</td>
      </tr>
    </tbody>
  </table>
  <div class="row">
    <div class="col-md-9 col-md-offset-3 text-center">
        <div class="col-md-8">
          <img src="{{ url('avatar/bukti-pict/'.$pengaduan->foto) }}" alt="">
        </div>
    </div>
  </div>
</div>
