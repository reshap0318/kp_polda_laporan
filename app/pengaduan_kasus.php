<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengaduan_kasus extends Model
{
  protected $table = 'pengaduan_kasuses';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
     'id_pengaduan'    => 'integer',
     'id_kasus'     => 'integer',
  ];

  protected $fillable = [
    'id_pengaduan',
    'id_kasus',
  ];

  public function pengaduan($value='')
  {
      return $this->belongsToMany(pengaduan_masyarakat::class, 'id_pengaduan', 'id');
  }

  public function kasus($value='')
  {
      return $this->belongsToMany(kasus::class, 'id_kasus', 'id');
  }
}
