<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public static function test(Request $request)
	{
		$a = 1;
		$test = '123';
		return response()->json(['result' => 'test']);
    }
}
