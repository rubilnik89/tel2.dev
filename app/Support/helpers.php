<?php

function get_phones_arr($request)
{
    $phones = [];
    for($i = 1; $i < 11; $i++) {
        $var = 'phone' . $i;
        if(isset($request->$var)){
            array_push($phones, $request->$var);
        }
    }
    return $phones;
}