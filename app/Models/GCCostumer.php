<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class GCCostumer extends GCBaseModel
{
    use HasApiTokens;

    public $table = 'costumers';

    public $fillable = [
        'name',
        'email',
        'password',
        'document_code'
    ];
}
