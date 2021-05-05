<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index(){
        return Organization::orderBy('created_at', 'DESC')->get();
    }
}
