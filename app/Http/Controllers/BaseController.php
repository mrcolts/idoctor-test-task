<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as GenesisBaseController;

class BaseController extends GenesisBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
