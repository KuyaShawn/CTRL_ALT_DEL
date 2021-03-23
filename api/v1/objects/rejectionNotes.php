<?php


class RejectionNotes
{
    private $connection;
    private $tableName = "rejection_notes";
    private $insertColumns = [];

    public $company_id;
    public $reason;
    public $notified;


    public function __construct($cnxn)
    {
        $this->connection = $cnxn;
    }

    public function adminCreate(){
        $this->reason = htmlspecialchars(strip_tags($this->reason));

        $query = "REPLACE INTO {$this->tableName} SET company_id = :company_id, notified = :notified";
        if(!empty($this->reason)){
            $query .= ", reason = :reason";
        }

        $statement = $this->connection->prepare($query);
        $statement->bindParam(':company_id', $this->company_id, PDO::PARAM_INT);
        $statement->bindParam(':notified', $this->notified, PDO::PARAM_BOOL);

        if(!empty($this->reason)){
            $statement->bindParam(':reason', $this->reason);
        }

        if($statement->execute()){
            return true;
        }
        return false;
    }
}