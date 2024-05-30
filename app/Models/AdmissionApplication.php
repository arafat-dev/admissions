<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionApplication extends Model
{
	protected $table = 'application_record';

    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function programAdmission()
    {
        return $this->belongsTo(ProgramAdmission::class, 'program_id_of_admission');
    }

    public function programType()
    {
        return $this->belongsTo(ProgramType::class, 'program_type_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_record_id');
    }

    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }

    public function session(){
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function degreeGroup()
    {
        return $this->belongsTo(DegreeGroup::class, 'degree_group_id');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion_record_id');
    }

    public function aLeveldegree()
    {
        return $this->belongsTo(Gender::class, 'a_level_degree_id');
    }

    public function aLevelBoard()
    {
        return $this->belongsTo(Board::class, 'a_level_board_id');
    }

    public function aLevelDegreeGroup()
    {
        return $this->belongsTo(DegreeGroup::class, 'a_level_degree_group_id');
    }

    public function oLeveldegree()
    {
        return $this->belongsTo(Gender::class, 'o_level_degree_id');
    }

    public function oLevelBoard()
    {
        return $this->belongsTo(Board::class, 'o_level_board_id');
    }

    public function oLevelDegreeGroup()
    {
        return $this->belongsTo(DegreeGroup::class, 'o_level_degree_group_id');
    }
}
