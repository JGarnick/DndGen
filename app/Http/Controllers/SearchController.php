<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spell;

class SearchController extends Controller
{
    function index()
    {
        return view("search")->with("spells", Spell::all());
    }
}
