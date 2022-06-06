<?php
    class Company{
        //DB stuff
        private $conn;
        private $table = 'company';
        
        //company properties
        public $id;
        public $company_name;
        public $address;
        public $phone;
        public $fax;
        public $email;
        public $website;
        public $description;

        //Constructor
        public function __construct($db){
            $this->conn = $db;
        }

        //Get companys
        public function read(){
            //CREATE query
            $query =
            'SELECT c.id, c.company_name, c.address, c.phone, c.fax, c.email, c.website, c.description
            FROM ' . $this->table . ' c
            ORDER BY c.id ASC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }


        //Get single company
        public function read_single(){
            //CREATE query
            $query =
            'SELECT c.id, c.company_name, c.address, c.phone, c.fax, c.email, c.website, c.description
            FROM ' . $this->table . ' c
            WHERE c.id = ?
            LIMIT 0,1';
            
            //Prepare statment
            $stmt = $this->conn->prepare($query);

            //Bind id
            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set properties
            $this->company_name = $row['company_name'];
            $this->address = $row['address'];
            $this->phone = $row['phone'];
            $this->fax = $row['fax'];
            $this->email = $row['email'];
            $this->website = $row['website'];
            $this->description = $row['description'];
        }


        //Create company
        public function create(){
            $query =
            'INSERT INTO ' . $this->table . '
            SET company_name = :company_name, address = :address, phone = :phone, fax = :fax, email = :email, website = :website, description = :description';
            
            $stmt = $this->conn->prepare($query);

            $this->company_name = htmlspecialchars(strip_tags($this->company_name));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->fax = htmlspecialchars(strip_tags($this->fax));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->website = htmlspecialchars(strip_tags($this->website));
            $this->description = htmlspecialchars(strip_tags($this->description));

            $stmt->bindParam(':company_name', $this->company_name);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':fax', $this->fax);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':website', $this->website);
            $stmt->bindParam(':description', $this->description);

            if($stmt->execute()){
                return true;
            }
            else{
                printf("Error: %s\n", $stmt->error);
                return false;
            }
        }

        //Update company
        public function update(){
            $query =
            'UPDATE ' . $this->table . '
            SET company_name = :company_name, address = :address, phone = :phone, fax = :fax, email = :email, website = :website, description = :description
            WHERE id = :id';
            
            $stmt = $this->conn->prepare($query);

            $this->company_name = htmlspecialchars(strip_tags($this->company_name));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->fax = htmlspecialchars(strip_tags($this->fax));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->website = htmlspecialchars(strip_tags($this->website));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':company_name', $this->company_name);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':fax', $this->fax);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':website', $this->website);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }
            else{
                printf("Error: %s\n", $stmt->error);
                return false;
            }
        }

        //Delete company
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