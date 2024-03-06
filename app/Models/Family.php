<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Family extends Model
{
    use HasFactory;

    public $table = 'families';
    
    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

  


}
