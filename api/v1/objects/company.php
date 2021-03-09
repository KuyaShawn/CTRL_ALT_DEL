<?php
class Company{

    private $connection;
    private $tableName = "company";

    public $id;
    public $name;
    public $about;
    public $category;
    public $city;
    public $country;
    public $email;
    public $phone;
    public $state;
    public $tag_cloud;
    public $url;

    public function __construct($cnxn)
    {
        $this->connection = $cnxn;
    }

    public function readUsingId(){
        $query = "SELECT 
                    *
                FROM
                    {$this->tableName}
                WHERE
                    id = :id
                LIMIT
                    0,1;";

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $this->id, PDO::PARAM_INT);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $this->name = $result['name'];
        $this->about = $result['about'];
        $this->category = $result['category'];
        $this->city = $result['city'];
        $this->country = $result['country'];
        $this->email = $result['email'];
        $this->phone = $result['phone'];
        $this->state = $result['state'];
        $this->tag_cloud = $result['tag_cloud'];
        $this->url = $result['url'];
    }
}
