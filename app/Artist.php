<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Concert;

class Artist extends Model
{
    //

    public function concerts()
    {
      return $this->hasMany(Concert::class);
    }
}
