<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class KODController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $isAdministrator = false;
    protected $isCoordinator = false;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->isCoordinator = Auth::user()->isCoordinator();
            $this->isAdministrator = Auth::user()->isAdministrator();
            return $next($request);
        });
    }

}
