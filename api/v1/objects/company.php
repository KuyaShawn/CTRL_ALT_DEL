<?php

require 'category.php';

class Company{

    private $connection;
    private $tableName = "company";
    private $insertColumns = [];

    public $errorString;

    public $id;
    public $company_name;
    public $about;
    public $tag_cloud;
    public $street_address;
    public $city;
    public $state;
    public $country;
    public $service_area;
    public $public_email;
    public $public_phone;
    public $url;
    public $logo_path;
    public $private_contact_name;
    public $private_email;
    public $private_phone;
    public $status;
    public $category_id;

    public $category;

    public function __construct($cnxn)
    {
        $this->connection = $cnxn;
        $this->category = new Category($cnxn);
    }

    public function adminSearch(){

        $query = "SELECT * 
        FROM company com 
        INNER JOIN categories cat
        ON com.category_id = cat.category_id
        WHERE status = :status";

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':status', $this->status);

        $statement->execute();

        return $statement;
    }

    public function readUsingId(){
        $query = "SELECT 
                    *
                FROM
                    {$this->tableName} com
                INNER JOIN 
                    {$this->category->getTableName()} cat
                ON
                    com.category_id = cat.category_id
                WHERE
                    id = :id
                LIMIT
                    0,1;";

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $this->id, PDO::PARAM_INT);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $this->company_name = $result['company_name'];
        $this->about = $result['about'];
        $this->tag_cloud = $result['tag_cloud'];
        $this->street_address = $result['street_address'];
        $this->city = $result['city'];
        $this->state = $result['state'];
        $this->country = $result['country'];
        $this->service_area = $result['service_area'];
        $this->public_email = $result['public_email'];
        $this->public_phone = $result['public_phone'];
        $this->url = $result['url'];
        $this->logo_path = $result['logo_path'];
        $this->private_contact_name = $result['private_contact_name'];
        $this->private_email = $result['private_email'];
        $this->private_phone = $result['private_phone'];
        $this->status = $result['status'];

        $this->category->category_id = $result['category_id'];
        $this->category->category_name = $result['category_name'];
        $this->category->category_icon_path = $result['category_icon_path'];
        $this->category->category_icon_type = $result['category_icon_type'];
    }

    public function create(){

        $this->status = "PENDING"; //All new additions go into PENDING

        //Sanitize inputs and get only the initialized ones, putting it in $includedColumns (ignores nulls)
        $this->company_name = $this->sanitizeCreateInputs($this->company_name, "company_name");
        $this->about = $this->sanitizeCreateInputs($this->about, "about");
        $this->tag_cloud = $this->sanitizeCreateInputs($this->tag_cloud, "tag_cloud");
        $this->street_address = $this->sanitizeCreateInputs($this->street_address, "street_address");
        $this->city = $this->sanitizeCreateInputs($this->city, "city");
        $this->state = $this->sanitizeCreateInputs($this->state, "state");
        $this->country = $this->sanitizeCreateInputs($this->country, "country");
        $this->service_area = $this->sanitizeCreateInputs($this->service_area, "service_area");
        $this->public_email = $this->sanitizeCreateInputs($this->public_email, "public_email");
        $this->public_phone = $this->sanitizeCreateInputs($this->public_phone, "public_phone");
        $this->url = $this->sanitizeCreateInputs($this->url, "url");
        $this->logo_path = $this->sanitizeCreateInputs($this->logo_path, "logo_path");
        $this->private_contact_name = $this->sanitizeCreateInputs($this->private_contact_name, "private_contact_name");
        $this->private_email = $this->sanitizeCreateInputs($this->private_email, "private_email");
        $this->private_phone = $this->sanitizeCreateInputs($this->private_phone, "private_phone");
        $this->category_id = $this->sanitizeCreateInputs($this->category_id, "category_id");
        $this->status = $this->sanitizeCreateInputs($this->status, "status");


        $query = "INSERT INTO {$this->tableName} SET " . implode(', ', $this->insertColumns);

        $statement = $this->connection->prepare($query);

        //Required insert statements that should never be null.
        $statement->bindParam(':company_name', $this->company_name);
        $statement->bindParam(':about', $this->about);
        $statement->bindParam(':city', $this->city);
        $statement->bindParam(':state', $this->state);
        $statement->bindParam(':country', $this->country);
        $statement->bindParam(':service_area', $this->service_area);
        $statement->bindParam(':url', $this->url);
        $statement->bindParam(':private_email', $this->private_email);

        $statement->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
        $statement->bindParam(':status', $this->status);

        //Optional Data fields that will be bound if exist
        if(!empty($this->tag_cloud)){$statement->bindParam(':tag_cloud', $this->tag_cloud);}
        if(!empty($this->street_address)){$statement->bindParam(':street_address', $this->street_address);}
        if(!empty($this->public_email)){$statement->bindParam(':public_email', $this->public_email);}
        if(!empty($this->public_phone)){$statement->bindParam(':public_phone', $this->public_phone);}
        if(!empty($this->logo_path)){$statement->bindParam(':logo_path', $this->logo_path);}
        if(!empty($this->private_contact_name)){$statement->bindParam(':private_contact_name', $this->private_contact_name);}
        if(!empty($this->private_phone)){$statement->bindParam(':private_phone', $this->private_phone);}

        if($statement->execute()){
            return true;
        }
        //$this->errorString = $statement->errorInfo();
        return false;
    }

    private function sanitizeCreateInputs($data, $name){
        if($data != null){
            $data = htmlspecialchars(strip_tags($data)); //prevents XSS
            array_push($this->insertColumns, "$name=:$name");
        }
        return $data;
    }
}
