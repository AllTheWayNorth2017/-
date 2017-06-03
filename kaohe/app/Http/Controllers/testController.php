<?php
	namespace App\Http\Controllers;
	use Illuminate\Support\Facades\DB;

	class TestController extends Controller
	{
		public function test($value='')
		{
			dd('hello'.$value);
		}
	}

