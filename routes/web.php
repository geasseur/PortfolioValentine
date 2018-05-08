<?php

//index
Route::get('/', function () {
    return view('index');
});

// Route::get('/', 'IndexController@displayLastWork')->name('index.display');

//contact

Route::get('/contact', 'contactController@createContact')->name('display.contact');

//CV

route::get('/apropos', function(){
  return view('aPropos');
})->name('display.cv');


//illustration

Route::get('/illustrations','IllustrationController@displayIllustrations')->name('illustrations.display');

Route::post('/illustrations','IllustrationController@displayIllustrations')->name('illustrations.display');

route::post('/illustration/newIllustration', 'IllustrationController@addIllustration')->name('illustration.newIllustration');


//animation

Route::post('/animations','animationController@displayAnimations')->name('animations.display');

Route::get('/animations','animationController@displayAnimations')->name('animations.displayReturn');

route::post('/animations/newAnimation', 'animationController@addAnimation')->name('animations.newAnimation');

route::post('/animations/deleteAnimation/{id}/', 'animationController@deleteAnimation')->name('animation.deleteVideo');

route::post('/animations/updateAnimation/{id}', 'animationController@updateAnimation')->name('animation.update');
