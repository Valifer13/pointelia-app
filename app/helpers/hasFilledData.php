<?php 

/**
 * Function for validate data either it's empty or not
 */
function hasFilledData(array $array) {
    foreach ($array as $key => $value) {
        if (isset($value) && trim($value) !== '') {
            return true;
        }
    }
    return false;
}

?>