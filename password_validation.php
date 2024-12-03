<?php
function check_min_length($password, $min_length = 8){
    return strlen($password) >= $min_length;
} 

function contains_letter($password){
    return preg_match('/[a-zA-Z]/', $password);
}

function contains_digit($password){
    return preg_match('/\d/', $password);
}

function contains_special_char($password){
    return preg_match('/[!@#$%^&(),.?":{}|<>|]/', $password);
}