<?php

#Get all Categories function


function get_all_category($con){

    $sql = "SELECT * FROM categories";

    $result = $con->query($sql);


        if($result->num_rows > 0 ){
            while($row = $result->fetch_assoc())
            $categories[] = $row;

        }else{
            $categories = 0;
        }

            return $categories;

}

?>