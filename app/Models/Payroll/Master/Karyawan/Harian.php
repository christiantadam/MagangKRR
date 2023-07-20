<?php

namespace App\Models\Payroll\Master\Karyawan;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Harian extends Authenticatable
{
    protected $connection = 'ConnPayroll';
    protected $table = 'ListCartridge';
    protected $fillable = ['User','Type'];
    public $timestamps = false;
}
