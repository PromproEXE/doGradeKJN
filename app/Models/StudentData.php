<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'studentdata';
    protected $primaryKey = 'std_id';
    protected $fillable = [
        'std_id',
        'name',
        'class',
        'room',
        'number',
        'grade_term_1',
        'grade_term_2',
        'grade_term_3',
        'grade_term_4',
        'grade_term_5',
        'grade_term_6',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
