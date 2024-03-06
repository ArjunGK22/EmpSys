<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Family;
use App\Models\Education;
use App\Models\Experience;

class Employee extends Model
{
    use HasFactory;
    public $table = 'employees';

    protected $primaryKey = 'id';

    public $timestamps = false;
    
    protected $fillable = ['admin', 'first_name', 'last_name', 'date_of_birth', 'gender', 'email', 'password', 'phone_number', 'address', 'city', 'state', 'pincode', 'start_date', 'department', 'position', 'salary'];

    // protected $guarded = [];


    public function families()
    {

        return $this->hasMany(Family::class, 'emp_id');
    }

    public function educations()
    {

        return $this->hasMany(Education::class, 'emp_id');
    }

    public function experiences()
    {

        return $this->hasMany(Experience::class, 'emp_id');
    }
}
