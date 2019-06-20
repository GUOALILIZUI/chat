<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class CeshiController extends Controller
{
    //
    public  function cut()
    {
        $uid= Redis::incr('id');
        $table_id=$uid % 3;
//        echo $table_id;die;

        $data=[
            'uid'=>$uid,
            'name'=>Str::random(5),
        ];

        $table='p_user'.$table_id;

        DB::table($table)->insertGetId($data);


        echo 222;

    }
}
