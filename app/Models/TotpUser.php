<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TotpUser extends Model
{
    public $timestamps = false;

    protected $table = 'totp_users';

    protected $primaryKey = 'username';

    protected $fillable = [
        'username',
        'secret'
    ];
}