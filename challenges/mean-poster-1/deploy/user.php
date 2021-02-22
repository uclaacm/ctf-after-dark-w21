<?php
    class User {
        private $username;
        private $password;
        private $status;

        function __construct($username, $password, $status) {
            $this->username = $username;
            $this->password = $password;
            $this->status = $status;
        }

        public function get_name() {
            return $this->username;
        }

        public function get_pwd() {
            return $this->password;
        }

        public function get_status() {
            return $this->status;
        }
    }
?>