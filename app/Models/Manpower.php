<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Manpower extends Model
{
    use HasFactory;
    protected $table = 'manpower';
    protected $fillable = [
        'passenger_no',
        'company_name',
        'candidate_id',
        'certificate_no',
        'ffc_name',
        'reg_id',
        'visa_no',
        'visa_issued_date',
        'visa_exp_date',
        'is_delete',
    ];
}
