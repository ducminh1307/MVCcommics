<?php
    class session {
        public static function checkSession($key) {
            if( isset($_SESSION[$key]) ) {
                return true;
            }
            return false;
        }
        public static function getSession($key) {
            return $_SESSION[$key];
        }
        public static function setSession($key, $value='') {
                $_SESSION[$key] = $value;
        }
        public static function deleteSession($key) {
            unset($_SESSION[$key]);
        }
    }
?>