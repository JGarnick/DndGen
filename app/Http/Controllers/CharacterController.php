<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    public function index()
	{
		$characters = Character::where('user_id', Auth::user()->id);
		return view('character.index', ['character' => $character]);
	}
	
	public function create()
	{
		return view('character.create');
	}
	
	public function show($id)
	{
		$character = Character::find($id);
		return view('character.show', ['character' => $character]);
	}
}
