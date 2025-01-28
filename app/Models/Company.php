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
        'company_type',
    ];

    /**
     * Accessor for created_at attribute
     *
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => date('M d, Y', strtotime($value)),
        );
    }

    /**
     * Accessor for std attribute
     *
     * @return Attribute
     */
    protected function std(): Attribute
    {
        return Attribute::make(
            get: fn($value) => date('M d, Y', strtotime($value)),
        );
    }
}
