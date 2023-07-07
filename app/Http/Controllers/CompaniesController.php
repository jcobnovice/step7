<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;

class CompaniesController extends Controller
{
    public function showList() {
        return view('list');
    }
}
