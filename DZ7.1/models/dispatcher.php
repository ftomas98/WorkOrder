<?php
    class Dispatcher{
        //DB stuff
        private $conn;
        private $table = 'dispatcher';
        
        //dispatcher properties
        public $id;
        public $name;
        public $phone;
        public $users_name;

        //Constructor
        public function __construct($db){
            $this->conn = $db;
        }

        //Get dispatchers
        public function read(){
            //CREATE query
            $query =
            'SELECT d.id, d.name, d.phone, u.name as users_name
            FROM ' . $this->table . ' d
            LEFT JOIN users u ON d.users_id = u.id
            ORDER BY d.id ASC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }


        //Get single dispatcher
        public function read_single(){
            //CREATE query
            $query =
            'SELECT d.id, d.name, d.phone, u.name as users_name
            FROM ' . $this->table . ' d
            LEFT JOIN users u ON d.users_id = u.id
            WHERE d.id = ?
            LIMIT 0,1';
            
            //Prepare statment
            $stmt = $this->conn->prepare($query);

            //Bind id
            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set properties
            $this->name = $row['name'];
            $this->phone = $row['phone'];
            $this->users_name = $row['users_name'];
        }


        //Create dispatcher
        public function create(){
            $query =
            'INSERT INTO ' . $this->table . '
            SET name = :name, phone = :phone, users_id = :users_id';
            
            $stmt = $this->conn->prepare($query);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->users_id = htmlspecialchars(strip_tags($this->users_id));

            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':users_id', $this->users_id);

            if($stmt->execute()){
                return true;
            }
            else{
                printf("Error: %s\n", $stmt->error);
                return false;
            }
        }

        //Update dispatcher
        public function update(){
            $query =
            'UPDATE ' . $this->table . '
            SET name = :name, phone = :phone, users_id = :users_id
            WHERE id = :id';
            
            $stmt = $this->conn->prepare($query);

            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->users_id = htmlspecialchars(strip_tags($this->users_id));
            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':users_id', $this->users_id);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }
            else{
                printf("Error: %s\n", $stmt->error);
                return false;
            }
        }

        //Delete dispatcher
        public function delete(){
            // Create query
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Bind data
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()){
                return true;
            }
            else{
                printf("Error: %s.\n", $stmt->error);
                return false;
            }
        }
    }