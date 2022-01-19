<?php

function flash($name = '', $message='', $class=''){
    
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name.'_class'])){
                unset($_SESSION[$name.'_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }
        elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
            echo '<div class="'.$class.' alert-dismissible fade show" role="alert">'.$_SESSION[$name].'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}

