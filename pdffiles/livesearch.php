<?php
  $server="localhost";
  $username ="root";
  $password ="";
  $dbname = "student";
  $sonnection = mysqli_connect($server,$username,$password,$dbname);

  if(isset($_POST['input'])){
    $input = $_POST['input'];

    $query = "SELECT * FROM studentinfo WHERE studentname LIKE '{$input}%' OR email LIKE '{$input}%' OR phonenumber LIKE'{$input}%' OR bankname LIKE '{$input}%' OR specialreason LIKE'{$input}%' OR submissiondate LIKE'{$input}%' OR indexnumber LIKE'%$input%'";

    $result = mysqli_query( $sonnection , $query );


    if(mysqli_num_rows($result) == 0){
        echo '<div class="alert alert-danger" role="alert">
         No matching values !!
      </div>';
        
      }else
      {?>

   

<h1 align="center">Searching Results</h1>
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

  <tbody>
    <?php

     while($newrow = mysqli_fetch_assoc($result)){
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
                 ?>

  </tbody>





<?php
      }








  }

?>