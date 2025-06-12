<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class RouteListController extends Controller
{
    public function getAllRoutes(){
        Artisan::call('route:list','');
        return "<pre>" . \Artisan::output() . "</pre>";
    }
}
