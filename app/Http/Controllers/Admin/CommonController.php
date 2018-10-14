<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Model\Resolution;

class CommonController extends Controller

{

    $resolutions=Resolution::get();
    print_r($resolutions);

}

