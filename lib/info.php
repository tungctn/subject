<?php

function name($code) {
    global $list_course;
    for ($i = 0; $i < sizeof($list_course);$i++) {
        if ($list_course[$i]['code'] == $code) {
            return $list_course[$i]['name'];
        }
        
    }
    
}