<?php
/**
 * Created by PhpStorm.
 * User: CHL
 * Date: 16-Jan-18
 * Time: 07:57 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    public $timestamps = false;
    protected $fillable = [
        'studentId', 'name', 'dateOfBirth', 'gender', 'mobile', 'email', 'religion', 'bloodGroup', 'nationality', 'studentType', 'studentBirthRegNo', 'studentPhotoLink', 'fatherId', 'motherId', 'guardianId', 'emergencyContactId', 'addedBy'
    ];
}