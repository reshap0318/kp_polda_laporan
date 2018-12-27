<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;

class pengaduan_masyarakat extends Model
{
  use PostgisTrait;
  protected $table = 'pengaduan_masyarakats';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $casts = [
     'jenis'    => 'integer',
     'nama'     => 'string',
     'email'    => 'string',
     'telpon'   => 'string',
     'stpl'     => 'string',
     'polres'   => 'string',
     'polsek'   => 'string',
     'uraian'   => 'string',
     'alamat'   => 'string',
     'pengaduan'=> 'string',
     'foto'     => 'string',
  ];

  protected $fillable = [
    'jenis',
    'nama',
    'email',
    'telpon',
    'stpl',
    'polres',
    'polsek',
    'uraian',
    'alamat',
    'pengaduan',
    'foto',
    'geom'
  ];

  protected $postgisFields = [
        'geom'
    ];

    protected $postgisTypes = [
        'geom' => [
            'geomtype' => 'geometry',
            'srid' => 0
        ]
    ];
}
