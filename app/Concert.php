<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Artist;

class Concert extends Model
{
    //

    public function artist()
    {
      return $this->belongsTo(Artist::class);
    }
}
