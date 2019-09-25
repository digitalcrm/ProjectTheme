<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Theme;

class HomeController extends Controller
{
    public function getIndex()
	{

		$theme = Theme::uses('default');

		$data = ['info' => 'Hello World'];
		//return theme::view('home.index', $data);
		return $theme->of('home.index', $data)->render(200);// It will look up the path 'resources/views/home/index.php':
		//return $theme->scope('home.index', $data)->render();// It will look up the path 'public/themes/default/views/home/index.php':

	}

}
