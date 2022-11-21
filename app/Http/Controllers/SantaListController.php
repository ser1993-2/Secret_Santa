<?php

namespace App\Http\Controllers;

use App\Models\SantaList;
use App\Models\User;
use Illuminate\Http\Request;

class SantaListController extends Controller
{
    public function getWardById($id) {
        return response()->json(User::with('santa')->find($id));
    }

    public function getSantaById($id) {
        return response()->json(User::with('ward')->find($id));
    }
}
