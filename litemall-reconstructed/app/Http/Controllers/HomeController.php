<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Production;

class HomeController extends Controller
{
    //
    public function testCollection(){
        // $c = collect([1,2,3]);

        // phpinfo();
        // dd();
        // //dd($c->all());
        // $res = Production::all();
        // $res = $res->map(function($item){
        //     return $item->name;
        // })->toArray();

        // $res2 = $res->keyBy('id')->toArray();
        // dd($res->toArray(), $res2);
        // $res3 = $res->groupBy('content');
        // $res4 = $res->filter(function($item){
        //     return $item->id > 1;
        // });
        // dd($res4->toArray(), $res->toArray());

        //$c = collect(['k1'=> 'v1', 'k2'=>'v2', 'k3'=>'v3']);
        // $res2 = $res->sortBy('id')->toArray();

        //dd($res2);
        //dd($c->sortBy()->toArray());

        // collect(['k1', 'k2'])->combine(['v1', 'v2'])->dd();

        Cache::put('k1', 222, 200);
        dd(Cache::get('k1'));
    }

    public function cacheTest(){
        Cache::put('k1', '222');
        return Cache::get('k1', 'default');
    }
}
