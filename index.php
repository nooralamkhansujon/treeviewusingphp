<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>How to Add New Node in Dynamic 
    Treeview using PHP Mysql Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js">
    </script>

   <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />

</head>
<body>
   <br /> <br />
   <div class="container" style="width:900px;">
         <h2 align="center">How to Add New Node in Dynamic Treeview using PHP Mysql Ajax</h2>
         <br /> <br />
         <div class="row">
            <div class="col-md-6">
               <h3 align="center"><u>Add New Category</u></h3>
               <br />
               <form action="" method="post" id="treeview_form">
                   <div class="form-group">
                      <label >Select Parent Category</label>
                      <select name="parent_category" id="parent_category" class="form-control">
                         
                      </select>
                   </div>
                   <div class="form-group">
                       <label>Enter Category Name</label>
                       <input type="text" name="category_name" id="category_name" class="form-control">
                   </div>
                   <div class="form-group">
                     <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
                   </div>
               </form>
            </div>
            <div class="col-md-6">
               <h3 align="center"><u>Category Tree</u></h3>
               <br />
               <div id="treeview"></div>
            </div>
         </div>
   </div>   

</body>
</html>



<script>
$(document).ready(function(){
     
     fill_parent_category();
     fill_treeview();

     function fill_treeview(){

          $.ajax({
              url     :"fetch.php",
              dataType:"json",
              success :function(data){
                  $("#treeview").treeview({
                          data:data,
                      });
              }

          });
     }
     function fill_parent_category()
     {
       $.ajax({
           url    : "fill_parent_category.php",
           success: function(data)
           {
               $("#parent_category").html(data);
           }

       });
     }

     $("#treeview_form").on('submit',function(event){
         event.preventDefault();
         $.ajax({
             url    : "action.php",
             method : "POST",
             data   : $(this).serialize(),
             success: function(data){
                fill_treeview();
                 fill_parent_category();
                 $("#treeview_form")[0].reset();
                 alert(data);
             }
         })
     });
   
      fill_view();
     function fill_view(){
         
         $.ajax({
             url     :"fetch.php",
             dataType:"json",
             success :function(data){
                   console.log(data);
             }

         });
    }
});

</script>