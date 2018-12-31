<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kasus extends Model
{
    protected $table = 'kasuses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
       'nama_kasus'    => 'string',
       'email'     => 'string',
    ];

    protected $fillable = [
      'nama_kasusn',
      'email',
    ];

    public function pengaduan($value='')
    {
        return $this->belongsToMany(pengaduan_masyarakat::class);
    }
}
