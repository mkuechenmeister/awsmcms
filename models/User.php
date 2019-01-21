<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 16.01.2019
     * Time: 16:26
     */

    require_once "DatabaseObject.php";

    class User implements DatabaseObject
    {
        private $id;
        private $username;
        private $firstName;
        private $lastName;
        private $email;
        private $hashedPwd;
        private $timeCreated;

        /**
         * User constructor.
         * @param $id
         * @param $username
         * @param $firstName
         * @param $lastName
         * @param $email
         * @param $hashedPwd
         * @param $timeCreated
         */
        public function __construct($id, $username, $firstName, $lastName, $email, $hashedPwd, $timeCreated)
        {
            $this->id = $id;
            $this->username = $username;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->hashedPwd = $hashedPwd;
            $this->timeCreated = $timeCreated;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getUsername()
        {
            return $this->username;
        }

        /**
         * @param mixed $username
         */
        public function setUsername($username)
        {
            $this->username = $username;
        }

        /**
         * @return mixed
         */
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * @param mixed $firstName
         */
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        /**
         * @return mixed
         */
        public function getLastName()
        {
            return $this->lastName;
        }

        /**
         * @param mixed $lastName
         */
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getHashedPwd()
        {
            return $this->hashedPwd;
        }

        /**
         * @param mixed $hashedPwd
         */
        public function setHashedPwd($hashedPwd)
        {
            $this->hashedPwd = $hashedPwd;
        }

        /**
         * @return mixed
         */
        public function getTimeCreated()
        {
            return $this->timeCreated;
        }

        /**
         * @param mixed $timeCreated
         */
        public function setTimeCreated($timeCreated)
        {
            $this->timeCreated = $timeCreated;
        }


        /**
         * Creates a new object in the database
         * @return integer ID of the newly created object (lastInsertId)
         */
        public function create()
        {
            $db = Database::connect();
            $sql = "INSERT INTO tbluser (uUsername, uFirstname, uLastname, uEmail, uHashedPw) values(?, ?, ?, ?,?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($this->username, $this->firstName, $this->lastName, $this->email,$this->hashedPwd));
            $lastId = $db->lastInsertId();
            Database::disconnect();
            return $lastId;
        }

        public static function createNewUser($username, $firstname, $lastname, $email, $uHashedPwd)
        {
            $db = Database::connect();
            $sql = "INSERT INTO tbluser (uUsername, uFirstname, uLastname, uEmail, uHashedPw) values(?, ?, ?, ?,?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($username, $firstname, $lastname, $email, $uHashedPwd));
            $lastId = $db->lastInsertId();
            Database::disconnect();
            return $lastId;

        }

        /**
         * Update an existing object in the database
         * @return boolean true on success
         */
        public function update()
        {
            $db = Database::connect();
            $sql = "UPDATE tbluser set uUsername = ?, uFirstname = ?, uLastname = ?, uEmail = ?, uHashedPw = ? where uID = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($this->username, $this->firstName, $this->lastName, $this->email, $this->hashedPwd, $this->id));
            Database::disconnect();

        }

        /**
         * Get an object from database
         * @param integer $id
         * @return object single object or null
         */
        public static function get($id)
        {
            $db = Database::connect();
            $sql = "Select * from tbluser where uID = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($id));
            $u = $stmt->fetch(PDO::FETCH_ASSOC);
            Database::disconnect();

            if ($u == null) {
                return null;
            }else{

                return new User($u['uID'], $u['uUsername'], $u['uFirstname'],
                    $u['uLastname'], $u['uEmail'], $u['uHashedPw'], $u['uTimeCreated']);
            }

        }

        /**
         * Get an array of objects from database
         * @return array array of objects or empty array
         */
        public static function getAll()
        {
            $db = Database::connect();
            $sql = "Select * from tbluser";
            $stmt = $db->prepare($sql);
            $stmt->exec(array());
            $u = $stmt->fetchAll();
            Database::disconnect();
            $data = [];
            if ($u == null) {
                return null;
            }else {



                foreach ($u as $item) {


                    $data[] = new User($item['uID'], $item['uUsername'], $item['uFirstname'],
                        $item['uLastname'], $item['uEmail'], $item['uHashedPw'], $item['uTimeCreated']);
                }
                return $data;
            }
        }

        /**
         * Deletes the object from the database
         * @param integer $id
         */
        public static function delete($id)
        {
            $db = Database::connect();
            $sql = "DELETE FROM tbluser WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($id));
            Database::disconnect();
        }

        public static function getUserByUsername($username)
        {
            $db = Database::connect();
            $sql = "Select * from tbluser where uUsername = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($username));
            $u = $stmt->fetch(PDO::FETCH_ASSOC);
            Database::disconnect();

            if ($u == null) {
                return null;
            }else{
                return new User($u['uID'], $u['uUsername'], $u['uFirstname'],
                    $u['uLastname'], $u['uEmail'], $u['uHashedPw'], $u['uTimeCreated']);
            }
        }
    }