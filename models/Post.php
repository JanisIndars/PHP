<?php
    class Post {
        public $name;
        public $title;
        public $content;
        public $image;
        public $email;
        private $password;
        public $data;

        /*public function validPassword($password) {
            return $password === $this->password;
        }

        public function update($name, $image) {
            global $db;

            $name = $db->escape_string($name);

            $sql = "UPDATE user SET name='$name', image='$image' WHERE email='$this->email'";

            $db->query($sql);

            return true;
        }*/

        public function map($post_data) {
            $this->email = $post_data['email'];

            if (isset($post_data['image'])) {
                $this->image = $post_data['image'];
            }

            if (isset($post_data['title'])) {
                $this->title = $post_data['title'];
            }
            if (isset($post_data['content'])) {
                $this->content = $post_data['content'];
            }
            if (isset($post_data['data'])){
                $this->data = $post_data['data'];
            }
        }

        public static function insert($title, $content, $image, $email) {
            global $db;

            $sql = "INSERT INTO post (`title`, `content`, `image`, `email`) VALUES ('".$title."','".$content."','" . $image . "', '".$email."')";
            $success = $db->query($sql);
            return $success;
        }

        public static function get($email) {
            global $db;

            $sql = "SELECT * FROM post WHERE email='$email'";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                $post_data = $result->fetch_assoc();
                $post = new Post();
                $post->map($post_data);
                return $post;
            } else {
               return null;
            }
        }
    }
?>