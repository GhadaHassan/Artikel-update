<?php

/**
 * @param string $routename
 * @return active
 */

function is_active(string $routename){
    return null !== request()->segment(2) && request()->segment(2) == $routename ? 'active' : '';
}

?>