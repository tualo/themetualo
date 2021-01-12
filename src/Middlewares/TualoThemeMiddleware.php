<?php

namespace Tualo\Office\TualoTheme\Middlewares;
use Tualo\Office\Basic\TualoApplication;
use Tualo\Office\Basic\IMiddleware;

class TualoThemeMiddleware implements IMiddleware{
    public static function register(){
        TualoApplication::use('theme',function(){
            try{
                TualoApplication::stylesheet("./theme-material/resources/theme-material-all.css" ,12);
                TualoApplication::stylesheet("./theme/loader/style.css" ,12);
                TualoApplication::javascript(  'theme', './theme-material/theme-material.js', [], 1 );
            }catch(Exception $e){
                TualoApplication::set('maintanceMode','on');
                TualoApplication::addError($e->getMessage());
            }
        },0);
    }
}