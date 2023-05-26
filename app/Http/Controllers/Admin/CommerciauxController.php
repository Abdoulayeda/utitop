<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommerciauxController extends Controller
{
    public function index()
    {
        $commerciaux = User::where('role', 'commerciale')->get();
       
        return view('admin.commerciaux.index', compact('commerciaux'));
    }
}
