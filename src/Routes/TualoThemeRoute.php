<?php
namespace tualo\Office\TualoTheme\Routes;
use tualo\Office\Basic\TualoApplication;
use tualo\Office\Basic\Route;
use tualo\Office\Basic\IRoute;


class TualoThemeRoute implements IRoute{
    public static function register(){

        Route::add('/theme/loader/style.css',function($matches){
            $path = dirname(dirname(__DIR__)).'';
            $data = file_get_contents( $path."/loader/style.css" );
            TualoApplication::body( $data );
            TualoApplication::contenttype('text/css');
        },array('get','post'),false);

        Route::add('/theme-material/(?P<file>[\/.\w\d\-\_]+)',function($matches){
            if (file_exists( dirname(dirname(__DIR__)).'/theme-material/'.$matches['file'])){
                /*
                readfile( dirname(dirname(__DIR__)).'/theme-material/'.$matches['file'] );
                exit();
                */
                TualoApplication::etagFile( dirname(dirname(__DIR__)).'/theme-material/'.$matches['file'] , true);
            }
        },array('get'),false);

        Route::add('/theme-neptune/(?P<file>[\/.\w\d\-\_\?]+)',function($matches){
            if (file_exists( dirname(dirname(__DIR__)).'/theme-neptune/'.$matches['file'])){
                /*
                readfile( dirname(dirname(__DIR__)).'/theme-material/'.$matches['file'] );
                exit();
                */
                TualoApplication::etagFile( dirname(dirname(__DIR__)).'/theme-neptune/'.$matches['file'] , true);
            }
        },array('get'),false);
        
    }
}