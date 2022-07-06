<?php
function renderTemplate($template,$vars = array()){
    extract($vars);

    if(is_array($template)){

        foreach($template as $k){

            $cl = strtolower(get_class($k));
            $$cl = $k;

            include "$cl.php";
        }

    }
    else {
        include "$template.php";
    }
}