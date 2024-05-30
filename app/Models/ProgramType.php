<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function fees()
    {
        return $this->hasMany(ProgrameFee::class, 'program_type_id');
    }

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class, 'program_type_id');
    }

}
