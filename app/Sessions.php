<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 1/1/2018
 * Time: 2:53 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    protected $table = 'academic_sessions';
    protected $sessionId = 'sessionId';
    public $timestamps = false;
    protected $fillable = ['sessionName'];
}