<?php
    function format_day($day){
        $date = new DateTime($day);
        echo $date->format('d/m/Y');
    }
    function format_day_chat($day){
        $date = new DateTime($day);
        return $date->format('H:i d/m/Y');
    }
?>