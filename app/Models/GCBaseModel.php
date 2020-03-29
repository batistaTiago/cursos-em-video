<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GCBaseModel extends Model
{
    public $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'password',
    ];
}
