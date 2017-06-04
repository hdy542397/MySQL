<?php
    function curlget($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $ch,CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        $data = curl_exec($ch);
        if ($data === false) {
            header('HTTP/1.1 400 Bad Request');
            exit;
        } else {
            echo $data;
        }
    }
    $url = $_REQUEST["url"];
     echo curlget($url);
?>