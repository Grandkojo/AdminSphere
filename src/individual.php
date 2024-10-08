<?php

    class Individual{
        public $username;
        public $uniqueId;
        public $gender;
        public $email;
        public $department_id;
        public $entity;
        public $identity_key;
        
        protected $conn;
        
        public function __construct()
        {
            $conn = new DB();
            $this->conn = $conn->connect();
            
        }
        
        public function generateUniqueId(){

        }

        function setUniqueId($id){
            $this->uniqueId = $id;
        }

        function getUniqueId(){
            return $this->uniqueId;
        }

        public function setFullProps($uniqueId, $username, $email, $gender, $identity_key, $department_id) : void {
            $this->uniqueId = $uniqueId;
            $this->username = $username;
            $this->email = $email;
            $this->identity_key = $identity_key;
            $this->gender = $gender;
            $this->department_id = $department_id;
        }

        public function setSomeProps($uniqueId, $username, $email, $gender, $identity_key) : void {
            $this->uniqueId  = $uniqueId;
            $this->identity_key = $identity_key;
            $this->username = $username;
            $this->email = $email;
            $this->gender = $gender;
        }

        public function getDepartments(){
            $sql = "SELECT department_name, department_id FROM departments";
            $query = $this->conn->prepare($sql);
            $query->execute();

            if ($query->rowCount() > 0){
                $departments = $query->fetchAll(PDO::FETCH_ASSOC);
                return $departments;
                // var_dump($departments);
                // exit;
            } else {
                return "No departments found!";
            }
        }

        
        public function login($email, $identity_key){
        
        }

        public function signup(){

        }

        public function logout(){

        }

        public function updateProfile() {
            
        }

        public function changeIdentityKey(){
            
        }

    }

    
?>