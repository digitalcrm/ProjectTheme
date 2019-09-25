<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Inherit from another theme
	|--------------------------------------------------------------------------
	|
	| Set up inherit from another if the file is not exists, this 
	| is work with "layouts", "partials", "views" and "widgets"
	|
	| [Notice] assets cannot inherit.
	|
	*/

	'inherit' => null, //default

	/*
	|--------------------------------------------------------------------------
	| Listener from events
	|--------------------------------------------------------------------------
	|
	| You can hook a theme when event fired on activities this is cool 
	| feature to set up a title, meta, default styles and scripts.
	|
	| [Notice] these event can be override by package config.
	|
	*/

	'events' => array(

		'before' => function($theme)
		{
			$theme->setTitle('DefaultTheme');
			$theme->setAuthor('Jonh Doe');

			// Breadcrumb template.
			/*$theme->breadcrumb()->setTemplate(`        
				 <ul class="breadcrumb">
				 @foreach($crumbs as $i => $crumb)
					 @if($i != (count($crumbs) - 1))
						<li>
	                    	<a href="{{ $crumb["url"] }}">{{ $crumb["label"] }}</a>
	                        <span class="divider">/</span>
						</li>
					 @else
						<li class="active">{{ $crumb["label"] }}</li>
					 @endif
				 @endforeach
				 </ul>             
			 `);*/

		},

		'asset' => function($asset)
		{
			$asset->themePath()->add([
										['style', 'css/bootstrap.min.css'],
										['script', 'js/bootstrap.min.js']
									 ]);

			// You may use elixir to concat styles and scripts.
			
			$asset->themePath()->add([
										['styles', 'css/style.css'],
										['scripts', 'js/script.js']
									 ]);
			

			// Or you may use this event to set up your assets.
			
			$asset->themePath()->add('core', 'core.js');			
			$asset->add([
							['jquery', 'js/jquery-3.4.1.min.js'],
							//['jquery', 'vendor/jquery/jquery.min.js'],
							//['jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', ['jquery']]
						]);
			
		},


		'beforeRenderTheme' => function($theme)
		{
			// To render partial composer
			
	        $theme->partialComposer('header', function($view){
	            $view->with('auth', Auth::user());
	        });
			

		},

		'beforeRenderLayout' => array(

			'mobile' => function($theme)
			{
				$theme->asset()->themePath()->add('ipad', 'css/layouts/ipad.css');
			}

		)

	)

);