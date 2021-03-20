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

}