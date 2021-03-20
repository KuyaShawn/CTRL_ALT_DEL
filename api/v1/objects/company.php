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

    public $category;

    public function __construct($cnxn)
    {
        $this->connection = $cnxn;
        $this->category = new Category($cnxn);
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

        //Sanitize inputs and get only the initialized ones, putting it in $includedColumns (ignores nulls)
        $this->name = $this->sanitizeCreateInputs($this->name, "name");
        $this->about = $this->sanitizeCreateInputs($this->about, "about");
        $this->category = $this->sanitizeCreateInputs($this->category, "category");
        $this->city = $this->sanitizeCreateInputs($this->city, "city");
        $this->country = $this->sanitizeCreateInputs($this->country, "country");
        $this->email = $this->sanitizeCreateInputs($this->email, "email");
        $this->phone = $this->sanitizeCreateInputs($this->phone, "phone");
        $this->state = $this->sanitizeCreateInputs($this->state, "state");
        $this->tag_cloud = $this->sanitizeCreateInputs($this->tag_cloud, "tag_cloud");
        $this->url = $this->sanitizeCreateInputs($this->url, "url");
        $this->logo_path = $this->sanitizeCreateInputs($this->logo_path, "logo_path");

        $query = "INSERT INTO {$this->tableName} SET " . implode(', ', $this->insertColumns);

        $statement = $this->connection->prepare($query);

        //Required insert statements that should never be null.
        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':about', $this->about);
        $statement->bindParam(':category', $this->category);
        $statement->bindParam(':city', $this->city);
        $statement->bindParam(':country', $this->country);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':state', $this->state);
        $statement->bindParam(':url', $this->url);

        //Optional Data fields that will be bound if exist
        if(!empty($this->phone)){$statement->bindParam(':phone', $this->phone);}
        if(!empty($this->tag_cloud)){$statement->bindParam(':tag_cloud', $this->tag_cloud);}
        if(!empty($this->logo_path)){$statement->bindParam(':logo_path', $this->logo_path);}

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
