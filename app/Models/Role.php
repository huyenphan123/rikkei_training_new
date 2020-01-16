<?php


namespace App\Models;


use App\Models\Department;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $table = 'roles';
    protected $dates = ['deleted_at'];
    protected $fillable = ['type','user_id','department_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

//    public function getUserNameAttribute() {
//        $userID = $this->user_id;
//        dd(User::findOrFail($userID)->name);
////        return User::findOrFail($userID)->name;
//    }

//    public function getDepartmentNameAttribute() {
//        $departmentID = $this->department_id;
//        return Department::where('id',$departmentID)->first()->name;
//
//    }
}
