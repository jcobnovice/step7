<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Companies extends Model
{
    use HasFactory;

    public function getCreate() {
        
        $companies = DB::table('companies')->get();

        return $companies;
    }

    public function getCompanyList() {
        
        $companies = DB::table('companies')->get();

        return $companies;
    }
}
