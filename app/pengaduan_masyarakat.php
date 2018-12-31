<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengaduan_masyarakat extends Model
{
  protected $table = 'pengaduan_masyarakats';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
     'jenis'    => 'integer',
     'nama'     => 'string',
     'telpon'   => 'string',
     'email'    => 'string',
     'alamat'   => 'string',
     'pengaduan'=> 'string',
     'waktu_kejadian'=> 'string',
     'tempat_kejadian'=> 'string',
     'stpl'     => 'string',
     'polres'   => 'string',
     'polsek'   => 'string',
     'foto'     => 'string',
  ];

  protected $fillable = [
    'jenis',
    'nama',
    'telpon',
    'email',
    'alamat',
    'pengaduan',
    'stpl',
    'polres',
    'polsek',
    'foto',
  ];

  public function listkasus($value='')
  {
    return $this->belongsToMany(kasus::class, 'pengaduan_kasuses', 'id_pengaduan', 'id_kasus');
  }

}
