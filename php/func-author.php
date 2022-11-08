<?php

function get_all_author($con){

    $sql = "SELECT * FROM authors";

    $result = $con->query($sql);

        if($result->num_rows > 0 ){
            while($row = $result->fetch_assoc())
            $authors[] = $row;

        }else{
            $authors = 0;
        }

            return $authors;

}

?>