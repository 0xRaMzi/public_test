<?php


if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) &&  $_SERVER['HTTP_X_FORWARDED_FOR'] == '127.0.0.1' ){
    echo "miniCTF{sqlinj_&_http_h34d3r}";
}else{
    echo "you are not 127.0.0.1";
}


?>



