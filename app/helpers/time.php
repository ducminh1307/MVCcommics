<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    function time_stamp($time_ago){
        $day = $time_ago;
        $time_ago = strtotime($time_ago);
        $cur_time = time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed ;
        $minutes = round($time_elapsed / 60 );
        $hours = round($time_elapsed / 3600);
        // Seconds
        if($seconds < 60) {
            echo "$seconds giây trước";
        } else if($minutes < 60) {
            echo "$minutes phút trước";
        } else if($hours < 24) {
            echo "$hours giờ trước";
        } else {
            echo format_day($day);
        }
    }
    function time_stamp_chat($time_ago){
        $day = $time_ago;
        $time_ago = strtotime($time_ago);
        $cur_time = time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed ;
        $minutes = round($time_elapsed / 60 );
        $hours = round($time_elapsed / 3600);
        // Seconds
        if($seconds < 60) {
            $data = "vài giây trước";
        } else if($minutes < 60) {
            $data = "$minutes phút trước";
        } else if($hours < 24) {
            $data = "$hours giờ trước";
        } else {
            $data = format_day_chat($day);
        }
        return $data;
    }
?>