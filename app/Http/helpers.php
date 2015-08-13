<?php 

    function setActive($path,$strict = false, $active = 'active') {

            if($strict){
                return  Request::is($path) ? $active : '';
            }

        return  (strpos(Request::path(), $path)!==false) ? $active : '';

    }

