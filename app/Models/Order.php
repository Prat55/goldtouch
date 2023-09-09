<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'u_id',
        'cname',
        'cadd',
        'cgstin',
        'cstyle_ref',
        'email',
        'email2',
        'email3',
        'email4',
        'email5',
        'phone',
        'phone2',
        'phone3',
        'phone4',
        'phone5',
        'created_at',
    ];

    protected function uid()
    {
        return $this->belongsTo(User::class, 'u_id', 'id');
    }
}
