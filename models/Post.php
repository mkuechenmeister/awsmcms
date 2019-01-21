<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 16.01.2019
     * Time: 16:32
     */

    class Post implements DatabaseObject
    {
        private $id;
        private $title;
        private $inhalt;
        private $user;
        private $timeCreated;


        /**
         * Post constructor.
         * @param $id
         * @param $title
         * @param $inhalt
         * @param $user
         * @param $timeCreated
         */
        public function __construct($id, $title, $inhalt, $user, $timeCreated)
        {

            $this->id = $id;
            $this->title = $title;
            $this->inhalt = $inhalt;
            $this->user = $user;
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
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getInhalt()
        {
            return $this->inhalt;
        }

        /**
         * @param mixed $inhalt
         */
        public function setInhalt($inhalt)
        {
            $this->inhalt = $inhalt;
        }

        /**
         * @return mixed
         */
        public function getUser()
        {
            return $this->user;
        }

        /**
         * @param mixed $user
         */
        public function setUser($user)
        {
            $this->user = $user;
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
            $sql = "Insert into tbl_beitrag (bTitel, bInhalt, bBesitzer ) VALUES (?,?,?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($this->title, $this->inhalt, $this->user));
            $lastID = $db->lastInsertId();
            Database::disconnect();
            /*$this->setId($lastID);//set ID of This Post
            $temp = self::get($lastID);
            $this->setTimeCreated($temp->getTimeCreated());*/
            return $lastID;
        }

        public static function createNewPost($title, $inhalt, $besitzer, $timeCreated)
        {
            $db = Database::connect();
            if ($timeCreated == null) {
                $sql = "Insert into tbl_beitrag (bTitel, bInhalt, bBesitzer ) VALUES (?,?,?)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array($title, $inhalt, $besitzer));
                $lastID = $db->lastInsertId();
                Database::disconnect();
            }else{
                $sql = "Insert into tbl_beitrag (bTitel, bInhalt, bBesitzer, bTimeCreated ) VALUES (?,?,?,?)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array($title, $inhalt, $besitzer, $timeCreated));
                $lastID = $db->lastInsertId();
                Database::disconnect();
            }

            /*$this->setId($lastID);//set ID of This Post
            $temp = self::get($lastID);
            $this->setTimeCreated($temp->getTimeCreated());*/
            return $lastID;
        }

        /**
         * Update an existing object in the database
         * @return boolean true on success
         */
        public function update()
        {
            $db = Database::connect();
            $sql = "Update tbl_beitrag set bTitel = ?, bInhalt = ?, bBesitzer = ?, bTimeCreated = ? where bID = ? ";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($this->title, $this->inhalt, $this->user, $this->timeCreated, $this->id));
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
            $sql = "select * from tbl_beitrag where bID = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($id));
            $pst = $stmt->fetch(PDO::FETCH_ASSOC);
            Database::disconnect();

            if ($pst == null) {
                return null;
            }else{}
            return new Post($pst['bID'], $pst['bTitel'], $pst['bInhalt'], $pst['bBesitzer'], $pst['bTimeCreated']);
        }

        /**
         * Get an array of objects from database
         * @return array array of objects or empty array
         */
        public static function getAll()
        {
            $db = Database::connect();
            $sql = "select * from tbl_beitrag";
            $stmt = $db->prepare($sql);
            $stmt->execute(array());
            $data = $stmt->fetchAll();
            Database::disconnect();
            $tmp = [];

            if ($data == null) {

                return null;

            }else{

                foreach ($data as $pst){

                    $tmp[]= new Post($pst['bID'], $pst['bTitel'], $pst['bInhalt'], $pst['bBesitzer'], $pst['bTimeCreated']);
                }
                return $tmp;
            }


        }

        /**
         * Deletes the object from the database
         * @param integer $id
         */
        public static function delete($id)
        {
            $db = Database::connect();
            $sql = " DELETE FROM `tbl_beitrag` WHERE `tbl_beitrag`.`bID` = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute(array($id));
            Database::disconnect();
        }

        public static function getAllJoined()
        {
            $db = Database::connect();
            $sql = "select bID, bTitel, bInhalt, bTimeCreated, uUsername from tbl_beitrag
                    JOIN tbluser on tbl_beitrag.bBesitzer = tbluser.uID";
            $stmt = $db->prepare($sql);
            $stmt->execute(array());
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            Database::disconnect();


            if ($data == null) {

                return null;

            }else{


                return $data;
            }
        }
    }