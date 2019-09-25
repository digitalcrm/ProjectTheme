<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facuz\Theme\Contracts\Theme;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    	/**
	 * Theme instance.
	 *
	 * @var \Facuz\Theme\Theme
	 */
    	protected $theme;

	/**
	 * Construct
	 *
	 * @return void
	 */
	public function __construct(Theme $theme)
	{
		// Using theme as a global.
		$this->theme = $theme->uses('default')->layout('ipad');
	}

	public function getIndex()
	{
		$this->theme->uses('default');//newone is new theme download first

	// or just override layout
		//$this->theme->layout('desktop'); //desktop layout folder

		return $this->theme->of('somewhere.index')->render(); //somewhere folder inside resources/views/somewhere/index.blade.php
	}
}
