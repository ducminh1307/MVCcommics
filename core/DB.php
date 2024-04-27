<?php
    class DB {
        public $conn;
        protected $servername = 'localhost';
        protected $username = 'root';
        protected $password = '';
        protected $databasename = 'truyentranh';

        function __construct() {
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
            mysqli_query($this->conn, "SET NAMES 'utf8'");
        }
    }
?>