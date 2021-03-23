<?php
class Category
{

    private $connection;
    private $tableName = "categories";
    private $insertColumns = [];

    public $category_id;
    public $category_name;
    public $category_icon_path;
    public $category_icon_type;

    public function __construct($cnxn)
    {
        $this->connection = $cnxn;
    }

    public function getTableName(){
        return $this->tableName;
    }

    public function getCategoryId(){
        $query = "SELECT category_id FROM {$this->tableName} WHERE UPPER(category_name) = UPPER(:category_name);";

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':category_name', $this->category_name);

        $statement->execute();

        $retrievedId = $statement->fetchColumn();

        if(empty($retrievedId)){
            return 1;
        } else {
            return $retrievedId;
        }
    }

}