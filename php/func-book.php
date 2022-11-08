<?php

function get_all_books($con){
    // global $con;
    $sql = "SELECT * FROM books ORDER bY id DESC";
    // $stmt = $con->prepare($sql);
    // $stmt->execute();
    $result = $con->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc())
            $books[] = $row;

        }else{
            $books = 0;
        }

            return $books;

}





?>