<?php 

 include("database_connection.php");
 
 $data  = array(
   ":category_name" => $_POST['category_name'],
   ':parent_category_id' => $_POST['parent_category']
 );


  //check if the category already added
  $checkquery = "SELECT * FROM tbl_category WHERE  category_name='".$_POST['category_name']."'";
  $statement  = $connect->prepare($checkquery);
  $statement->execute();
  $result = $statement->fetchAll();
  
  if($result > 0 )
  {
     echo "Category Already added";
  }
  else{
    
        $query = "INSERT INTO  tbl_category (category_name,parent_category_id) 
        VALUES (:category_name,:parent_category_id)";
        $statement  = $connect->prepare($query);

        if($statement->execute($data))
        {
           echo "Category Added";
       }

  }




?>