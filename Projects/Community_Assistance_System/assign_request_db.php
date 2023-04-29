<?php
class CategoryDB {
    public static function getRequests() {
        $conn = Database::getDB();
        $query = 'SELECT * FROM requests
                  ORDER BY request_id';
        $statement = $conn->prepare($query);
        $statement->execute();
        
        $requests = [];
        foreach ($statement as $row) {
            $category = new Request($row['request_id'],
                                     $row['service']);
            $requests[] = $request;
        }
        return $requests;
    }

    public static function getRequest($category_id) {
        $conn= Database::getDB();
        $query = 'SELECT * FROM requests
                  WHERE request_id = :request_id';    
        $statement = $conn->prepare($query);
        $statement->bindValue(':request_id', $request_id);
        $statement->execute();   
        
        $row = $statement->fetch();
        $statement->closeCursor();    
        $category = new Request($row['request_id'],
                                 $row['service']);
        return $category;
    }
}
?>