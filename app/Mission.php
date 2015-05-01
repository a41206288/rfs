<?php namespace App;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Mission extends Eloquent{
    protected $table = "mission"; //要刪掉這行要把資料庫的table名稱改成missions
    public $timestamps = false; //不加會出現   SQLSTATE[42S22]: Column not found: 1054 Unknown column 'updated_at' in 'field list'
}