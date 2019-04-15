<?php
    class User{
        private $username;
        private $password;
        private $first_name;
        private $last_name;
        private $date_of_birth;
        private $gender;
        private $state;
        private $telephone;
        private $email;
        private $profile_picture;
        private $user_rank;
        private $banned;
        private $create_time;
        
        public function __construct($username, $password, $first_name, $last_name, $date_of_birth, $gender,
         $state, $telephone, $email, $profile_picture, $user_rank, $banned, $create_time)
        {
            $this->username = $username;
            $this->password = $password;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->date_of_birth = $date_of_birth;
            $this->gender = $gender;
            $this->state = $state;
            $this->telephone = $telephone;
            $this->email = $email;
            $this->profile_picture = $profile_picture;
            $this->user_rank = $user_rank;
            $this->banned = $banned;
            $this->create_time = $create_time;
        }

        public function __get($attribute){
            return $this->$attribute;
        }

        // test function
        public static function getAllUsers(){
            $db = dbConf::getInstance();

            $sqlQuery = "SELECT * FROM users";
            $result = $db->query($sqlQuery);

            $resultArray = [];

            foreach ($result->fetchAll() as $row){
                $resultArray[] = new User(
                    $row['username'],
                    $row['password'],
                    $row['first_name'],
                    $row['last_name'],
                    $row['date_of_birth'],
                    $row['gender'],
                    $row['state'],
                    $row['telephone'],
                    $row['email'],
                    $row['profile_picture'],
                    $row['user_rank'],
                    $row['banned'],
                    $row['create_time']
                );
            }

            return $resultArray;
        }

    }

?>