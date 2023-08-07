<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  use HasFactory;

  public function texts()
  {
    return $this->hasMany(Text::class);
  }

  public function buttons()
  {
    return $this->hasMany(Button::class);
  }
}
