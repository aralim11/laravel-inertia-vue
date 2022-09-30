<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;

    public function month(){
        return Attendence::groupBy(DB::raw('MONTH(created_at)'))->get();
    }
}
