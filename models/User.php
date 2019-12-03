<?php
    class User {
        public $name;
        public $image;
        public $email;
        private $password;

        public function validPassword($password) {
            return $password === $this->password;
        }

        public function update($name, $image) {
            global $db;

            $name = $db->escape_string($name);

            $sql = "UPDATE user SET name='$name', image='$image' WHERE email='$this->email'";

            $db->query($sql);

            return true;
        }

        public function map($user_data) {
            $this->email = $user_data['email'];
            $this->password = $user_data['pass'];

            if (isset($user_data['image'])) {
                $this->image = $user_data['image'];
            }

            if (isset($user_data['name'])) {
                $this->name = $user_data['name'];
            }
        }

        public static function insert($email, $password, $name, $last) {
            global $db;

            $sql = "INSERT INTO user (`name`, `last`, `email`, `pass`) VALUES ('".$name."','".$last."','" . $email . "', '" . $password . "')";
            $success = $db->query($sql);
            return $success;
        }

        public static function get($email) {
            global $db;

            $sql = "SELECT * FROM user WHERE email='$email'";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                $user_data = $result->fetch_assoc();

                $user = new User();
                $user->map($user_data);

                return $user;
            } else {
                return null;
            }
        }
    }
?>
