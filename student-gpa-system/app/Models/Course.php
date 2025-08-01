<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
