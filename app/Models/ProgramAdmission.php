<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramAdmission extends Model
{
    use HasFactory;

    protected $table = 'program_of_admission';

    protected $guarded = ['id'];
}
