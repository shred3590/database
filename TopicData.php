<?php
class TopicData
{

    protected $connection = null;
    protected $db = null;
    protected $query = array(array());

    public function connect()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=cubScout", "root", "");
        } catch (Exception $e) {
            echo $e->getMessage() . " connect";
        }
    }

    public function getAllTopics($table, $constraint)
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM $table WHERE $constraint");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        } catch (Exception $e) {
            echo $e->getMessage() . " all topics";
        }
        return $query;
        reset($query);
    }

    public function getColumns($table)
    {
// Prepare input table for connection string
        $data = $this->connection->prepare(
            "SELECT COLUMN_NAME 
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE table_name = '$table'"
        );

// Obtain and process result for the columns
        try {
            if ($data->execute()) {
                $raw_column_data = $data->fetchAll(PDO::FETCH_ASSOC);
                foreach ($raw_column_data as $outer_key => $array) {
                    foreach ($array as $inner_key => $value) {
                        if (!(int)$inner_key) {
                            $this->column_names[] = $value;
                        }
                    }
                }
            }
            return $this->column_names;
        } catch (Exception $e) {
            echo $e->getMessage() . ' columns';
            exit;
        }

    }

    public function updateTable($table, $row, $change)
    {
        $update = $this->connection->prepare("UPDATE $table SET $row={$change}");
    }

// All class related functions belong above this line
}
