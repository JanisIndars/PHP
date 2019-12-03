<?php
    class DB {
        static $host = 'localhost';
        static $user = 'root';
        static $password = 'G7kQkk6wZLcx8bT0';
        static $db = 'rcs';

        private $link;

        function __construct() {
            $this->connect();
        }

        public function connect() {
            $this->link = new mysqli(self::$host, self::$user, self::$password, self::$db);

            if ($this->link->connect_error) {
                throw new Exception("Database connection error");
            }
        }

        public function query($sql) {
            return $this->link->query($sql);
        }

        public function escape_string($string) {
            return mysqli_real_escape_string($this->link, $string);
        }

        public function close() {
            mysql_close($this->link);
        }
    }
?>
