
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
         
    </style>
</head>
<body>
    
<input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search By Any Information">

<div id="serachresult">

</div>
 



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>





<?php
 $server="localhost";
 $username ="root";
 $password ="";
 $dbname = "student";
 $sonnection = mysqli_connect($server,$username,$password,$dbname);


 $sql = "SELECT * FROM studentinfo WHERE status='0'  ";
 $query = mysqli_query($sonnection ,  $sql);
 

  if(mysqli_num_rows($query) == 0){
    echo '<div class="alert alert-danger" role="alert">
    There are Cheched data yet. Once they are <b>Checked</b> they will appear here !!
  </div>';
    
  }
  
  else{

    ?>




     <h1 align="center">History Of Records</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Index #</th>
      <th scope="col">StudentName</th>
      <th scope="col">Email</th>
      <th scope="col">Phone #</th>
      <th scope="col">Amount</th>
      <th scope="col">Trans Method</th>
      <th scope="col">BankName</th>
      <th scope="col">SpecialReason</th>
      <th scope="col">Sub Date</th>
      <th scope="col">R image</th>
      <th scope="col">PDF</th>

      
      
    </tr>
  </thead>
  <tbody>
    <?php

     while($newrow = mysqli_fetch_assoc($query)){
        $img_URL = 'image/'.$newrow["rimage"];
        $pdf_URL = 'pdfaa/'.$newrow["pdf"];
                 ?>

 

    <tr>
      <th scope="row"><?php echo $newrow['id']; ?></th>
      <td><?php echo  $newrow['indexnumber'] ; ?></td>
      <td><?php echo  $newrow['studentname'] ; ?></td>
      <td><?php echo  $newrow['email'] ; ?></td>
      <td><?php echo  $newrow['phonenumber'] ; ?></td>
       <?php echo  ' <td>'.number_format($newrow["amount"],2).'</td>' ?>  
      <td><?php echo  $newrow['transactionmethod'] ; ?></td>
      <td><?php echo  $newrow['bankname'] ; ?></td>
      <td><?php echo  $newrow['specialreason'] ; ?></td>
      <td><?php echo  $newrow['submissiondate'] ; ?></td>
      <td><?php echo     '<img src='.$img_URL.' height="35" width="35" alt="No recipt attached" class="themainimage  gallery-item" alt="Gallery1">'  ; ?></td>
      <td><?php echo   ' <a href="display_pdf.php?id='.$newrow["id"].'& pdfile='.$pdf_URL.'& nameofstudent='.$newrow["studentname"].'" id="showthepdftext" title="Read the PDF file" target="_blank">'.$newrow["pdf"].'</a>' ; ?></td>
      
    </tr>
     
  </tbody>


     <?php           
     }
    

  }


?></table>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<script   >






$(document).ready(function(){

  $("#live_search").keyup(function(){
    var input  =  $(this).val();
  if(input !=""){
    $.ajax({
        url:"livesearch.php",
        method : "post",
        data:{input:input},

        success:function(data){
          $("#serachresult").html(data);
        }
    });
  }
  });
    

});

 </script>

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>