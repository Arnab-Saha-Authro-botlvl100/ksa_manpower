<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Agents extends Model
{
    use HasFactory;
    protected $table = 'agents';
    protected $fillable = [
        'agent_name',
        'agent_phone',
        'agent_email',
        'agent_address',
        'agent_e_phone',
        'agent_picture',
    ];
}
