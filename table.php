<?php

require TopicData.php;

class TableBuild
{
    
    private $display;
    private $dbcall;
    
    private function Call()
    {
        $dbcall = new TopicData;

        try {
            $dbcall->connect();
            
        } catch (Exception $e) {
            echo "$e->getMessage() table call";
            exit;
        }
    }
    
    private function table($tables)
    {
        if ($tables['elective'] === null) {
            // pull data and display
            
             
        } else {
            // put not null code here
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
}