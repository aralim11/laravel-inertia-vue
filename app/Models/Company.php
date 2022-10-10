<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_name',
        'slogan',
        'std',
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('M d, Y', strtotime($value)),
        );
    }
}
