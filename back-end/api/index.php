<?php

// define('URLR','http://localhost/ajax/test/Api');

require 'autoload.php';
if(isset($_GET['page']))
$parametrs=explode('/',$_GET['page']);
if(isset($parametrs[0]) & !empty($parametrs[0]) )
{
    $controller=ucfirst($parametrs[0]);
    $file='controllers/'.$controller.'Controller'.'.php';
    if(file_exists($file)){
  
        require_once $file;
        
        $controller=$controller.'Controller';
        if(class_exists($controller))
        {
            $obj=new $controller();
            if(isset($parametrs[1]) & !empty($parametrs[1]))
            { 
                $action=$parametrs[1]; 
                if(method_exists($obj,$action))
                {
                    if (isset($parametrs[2]) && !empty($parametrs[2])) 
                    {
                        $obj->$action($parametrs[2]);
                    }else
                    {

                        $obj->$action();
                    }
                }else
                {
                    http_response_code(404);
				    echo "<h1>this method doesn't exist</h1>";
                }

            }else
            {
                $action="index";
                $obj->$action();
            }
        }else
        {
            http_response_code(404);
            echo "<h1>this classe doesn't exist</h1>";
        }
        

    }else
    {
        http_response_code(404);
        echo "<h1>this page doesn't exist</h1>";
    }
}
