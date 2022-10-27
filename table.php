



<?php

$connect = new PDO("mysql:host=localhost;dbname=student", "root", "");

$query = "SELECT * FROM studentinfo WHERE status='1'";
$result = $connect->query($query);
$con = mysqli_connect("localhost","root","","student");
if(isset($_POST['search']))
                                    {
                                        
                                        $filtervalues = $_POST['search_box'];
                                        $query = "SELECT * FROM studentinfo WHERE CONCAT(indexnumber,studentname,submissiondate,transactionmethod,email,rimage,bankname,specialreason) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);


                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                         
                                            { 
                                                $img_URL = 'image/'.$items["rimage"];
                                                $pdf_store="pdf/".$items["pdf"];
                                                ?>
                                                <div class="maindivv">
                                                <tr >
                                                <span class="thespantag">Indexnumber : </span> <td><?= $items['indexnumber']; ?></td><br><br>
                                                <span class="thespantag">Studentname : </span> <td><?= $items['studentname']; ?></td><br><br>
                                                <span class="thespantag">submissiondate : </span> <td><?= $items['submissiondate']; ?></td> <br><br>
                                                <span class="thespantag">Fee type : </span> <td><?= $items['transactionmethod']; ?></td> <br><br>
                                                
                                                <span class="thespantag">Email : </span> <td><?= $items['email']; ?></td><br><br>
                                                <span class="thespantag">Phone number : </span> <td><?= $items['phonenumber']; ?></td><br><br>
                                                
                                                
                                                <span class="thespantag">Recipt Image : </span>    <?php    echo ' <td> <img src='.$img_URL.' height="200" width="150" alt="No recipt attached" class="thefilteredimage"> </td>';?><br> <br>
                                                <span class="thespantag">PDF file : </span>    <?php    echo ' <td> <a href="display_pdf.php?id='.$items["id"].'& pdfile='.$pdf_store.'& nameofstudent='.$items["studentname"].'" id="showthepdftext" title="Read the PDF file" target="_blank">'.$items["pdf"].'</a> </td>';?><br> <br>
                                                <span class="thespantag">Bankname : </span> <td><?= $items['bankname']; ?></td><br><br>
                                                <span class="thespantag">Special reason : </span> <td><?= $items['specialreason']; ?></td><br><br>
                                                </tr>
                                                <hr>
                                                </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <div class="maindivvvvv">
                                                <tr >
                                                    <td colspan="5">No Record Found !</td>
                                                </tr>
                                                </div>
                                            <?php
                                             
                                        }
                                    }

?>

<?php

$server="localhost";
$username ="root";
$password ="";
$dbname = "student";
$sonnection = mysqli_connect($server,$username,$password,$dbname);


   if(isset($_GET['image']))
   {

 
 
   
    $file = $_GET['image'];
    $folder = "./image/" . $file;
 
            header("Cache-Control:public");
            header('Content-Description: File Transfer');
            header('Content-Type: application/image');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Content-Transfer-Encoding:binary');
        
            header('Content-Length: ' . filesize($folder));
            flush();  
            readfile($folder);
     
            exit;
   

   }
 
 

?>



<?php

$server="localhost";
$username ="root";
$password ="";
$dbname = "student";
$sonnection = mysqli_connect($server,$username,$password,$dbname);

   if(isset($_GET['id'])){
    
 
 $id = $_GET['id'];




 $selectsql = "SELECT * FROM studentinfo WHERE id = '$id'";
 $query_run = mysqli_query($sonnection, $selectsql);
 $count = mysqli_fetch_assoc($query_run);

  
 $studentid = $count['id'];
 $studentindex = $count['indexnumber'];
 $studenname = $count['studentname'];
 $studentemail = $count['email'];
 $studentphonenumner = $count['phonenumber'];
 $studentamount = $count['amount'];
 $studenttransactionmethod = $count['transactionmethod'];
 $studentbankname = $count['bankname'];
 $studentspecialreason = $count['specialreason'];
 $studentsubmissiondate = $count['submissiondate'];
 $studentrimage = $count['rimage'];
 $studentpdf = $count['pdf'];

 $sqlnew = " INSERT INTO deletedrecords(id , indexnumber, studentname, email, phonenumber, amount, transactionmethod, bankname, specialreason, submissiondate, rimage, pdf) VALUES('$studentid', 
 
 ' $studentindex' , '$studenname' , '$studentemail' , '$studentphonenumner' , '$studentamount' , '$studenttransactionmethod', '$studentbankname' , '$studentspecialreason', 
 '$studentsubmissiondate' , '$studentrimage' , ' $studentpdf' )";

 $secondquery = mysqli_query($sonnection,  $sqlnew);

 if($secondquery ){
  echo "inserted";
 }else{
  echo "not insertedddd";
 }
 
 
 $selete = mysqli_query($sonnection, "DELETE FROM studentinfo WHERE id= '$id'");





   }
 
 

?>


 



<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="camp.png">
    <title>Saegis campus - Nugegoda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body{
            background-color: rgb(244, 244, 244);
        }
        .studenttable{
    width: 98%;
 margin: 0 auto;
 text-align: center;
 
 margin: 30px;
  border-collapse: collapse;
  background-color: white;
 

 }
 .thespantag{
    color: blue;
         font-weight: bold;
}
.thefilteredimage:hover{
    height: 650px;
 width: 550px;
 transition: 0.2s all ease-in-out;
 cursor: pointer;
 border: 2px solid rgba(0, 0, 255, 0.415);
}
.thefilteredimage{
    transition: 0.2s all ease-in-out;
 
}
 
 
 .studenttable th{
    background-color: rgb(0, 0, 75);
color: white;
position: sticky;
top: 0px;
z-index: 50;
margin: 0;
padding: 10px 0px;
font-size: 18px;
font-weight: bold;
border: 1px solid white;
 border-collapse: collapse;
 }
 .studenttable td{
    font-size: 19px;
 padding: 10px;
 background-color: white;
 border: 1px solid black;
 border-collapse: collapse;
 }
 #sortatoz{
    position: relative;
    width: 100%;
 height: 100%;
 
 
 
}
#sortatoz input{
    width:50%;
    height:30px;
    cursor: pointer;
    font-size: 15px;
    font-family: sans-serif;
font-weight: bold;
color: black;
}
#sortatoz input:hover{
    
 background: none;
 color: rgb(255, 255, 255);
 border: 2px solid white;
 transition: 0.15s all ease-in-out;
}
#downloadicon{
    position: fixed;
       width: 30px;
       height: 30px;
       top:10px;
       right:40px;
       padding: 6px;
      border-radius: 100rem;
      background-color: white;
       cursor: pointer;
       transition:  0.1s all ease-in-out;
       
    
}
#downloadicon:hover{
    opacity:0.7;
    transition:  0.1s all ease-in-out;
 
   
      border-radius: 100rem;
}
.thedeletbutton{
 
 color: red;
 font-family: Arial, Helvetica, sans-serif;
 font-size: 1rem;
 padding: 16px 16px;
 border-radius: 20px;
 text-decoration: none;
 cursor: pointer;
 transition: 0.1s all ease-in-out;
}
.thedeletbutton:hover{
 opacity: 0.7;
 border: 2px solid red;
 border-radius: 30px;
 background-color: rgba(255, 0, 0, 0.137);
 transition: 0.2s all ease-in-out;
 color: rgb(255, 0, 0);
}
.thedeletbutton:active{
 background: none;
color: red;
border: 1px solid red;
}
#thetrashimage{
    width:18px ;
     bottom:3px;
   position: relative;
    height:18px;
  
}
#theupdatebutton{
    border-radius: 30px;
    color: white;
background-color: rgb(0, 172, 0);
 font-family: Arial, Helvetica, sans-serif;
 font-size: 1rem;
 padding: 8px 25px;
 text-decoration: none;
 cursor: pointer;
 transition: 0.1s all ease-in-out;
}
#theupdatebutton:hover{

 
    background-color: rgba(255, 222, 173, 0);
    color: green;
 border: 2px solid green;
transition: 0.1s all ease-in-out;
}
#showthepdftext{
    color: rgba(255, 0, 0, 0.811);
      text-decoration: none;
      font-size: 15px;
      font-weight: bold;
      transition: 0.1s all ease-in-out;
}
#showthepdftext:hover{
    opacity: 0.7;
      transition: 0.1s all ease-in-out;
      
}
.studentidexnumbers{
    color: rgb(0, 25, 186);
 font-size: 28px;
 font-weight: bold;
}
.themainimage{
    cursor: pointer;
    transition:  0.2s all ease-in-out;
}
.themainimage:hover{
    box-shadow: 1px 1px 20px 1px rgba(0, 0, 0, 0.451);
    transition:  0.2s all ease-in-out;
}

.serachdiv{
    margin: 0 auto;
   width: 40%;
   display: flex;
   justify-content: space-between;
   align-items: center;
 
   flex-wrap: wrap;
}
.serachdiv img{
    width: 30px;
  height: 30px;
}
.thesearchbar{
    width: 91%;
    height: 38px;
    border: 1px solid blue;
 
    font-family: Arial, Helvetica, sans-serif;
    padding: 5px;
    font-size: 18px;
 
  
}
.thesearchbtn{
    width: 16%;
    margin-top: 10px;
   height: 40px;
   border-radius: 20px;
   background-color: blue;
   color: white;
   font-weight: bold;
   font-size: 18px;
   outline: none;
   cursor: pointer;
   border: none;
}
.thesearchbtn:hover{
    opacity: 0.7;
   transition: 0.1s all ease-in-out;
}
.thesearchbtn:active{
    
  background-color: white;
  color: blue;
  border: 1px solid blue;

}
.serachformdiv{
    display: flex;
      justify-content: space-evenly;
      align-items: center;
      width: 95%;
     
      flex-direction: column;
      margin: 10px auto;
}
.serachformdiv span{
    color: black;
     font-size: 18px;
     font-family: sans-serif;
     margin: 5px;
}
.maindivv{
    width: 90%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 10px;
            background-color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.16);

          
  }
  .maindivvvvv{
    width: 90%;
            padding: 10px;
            margin: 10px auto;
            
            border-radius: 10px;
            color: red;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.16);

}
.searchNoneError{
    border: 2px solid red;
}
#btnScrollToTop{
      position: fixed;
      right: 10px;
      bottom: 10px;
      width: 50px;
      height: 50px;
      border-radius: 100rem;
      cursor: pointer;
      background-color: rgba(220, 220, 220, 0.912);
      border: 2px solid blue;
      transition: 0.2s all ease-in-out;

    }
    #btnScrollToTop:hover{
      box-shadow: 1px 1px 10px 5px rgba(0, 0, 0, 0.453);
      transition: 0.2s all ease-in-out;
    }
    #btnScrollToTop img{
      width: 20px;
      height: 20px;
    }
    .deltedbtn{
      position: absolute;
      right: 15px;
      color: white;
      background-color: rgba(255, 0, 0, 0.881);
      border: 1px solid red;
      cursor: pointer;
      padding: 7px 20px;
      font-size: 16px;
      font-family: Arial, Helvetica, sans-serif;
      border-radius: 10px;
      text-decoration: none;

    }
    .deltedbtn:hover{
      background-color: rgba(255, 0, 0, 0);
      color: red;
      border: 1px solid red;
      transition: 0.1 ease-in all;
      font-weight: bold;
      text-decoration: none;


    }
    #check{
 
      cursor: pointer;

  
    }
    .thecheckbox:hover{
      background-color: rgba(255, 0, 0, 0.438);
     transition: 0.5   ease-in-out all;
    }
    </style>
</head>
<body>
    





<form  name="search_form" method="post" action="table.php" class="serachformdiv">
 
 <span> Search by any information </span> 
 
 <a href="pdffiles/deleted_records.php?Redirecting_to_Hostory" class="deltedbtn">History</a>


 <div class="serachdiv">
 <img src="icons/search.png" alt="">
 <input type="text" placeholder="Search by any information" class="thesearchbar" id="thesearchbar" name="search_box" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>"/>

 </div>
 <input  class="thesearchbtn" type="submit" name="search" value="Search" onclick="return checktheterm()"/>

</form>
 










<table class="studenttable"  >
            <tr>
                 <th>ID</th>
                 <th>Paid date</th>


                <th>SID</th>
                <th>Student info</th>
                <th>Fee type</th>
                <th>Amount</th>

                 <th>Recipt</th>
              
                 <th id=" ">Bank</th>
                <th id=" ">Delete</th>
                <th id=" ">Update</th>
      

            </tr>
            <?php
           
 
            foreach($result as $row)
                    {
                        $img_URL = 'image/'.$row["rimage"];
                   
                        $pdf_URL = 'pdf/'.$row["pdf"];
                   
                        echo '
                        <tr> 
                          <td>'.$row["id"].'</td>
                          <td>'.$row["submissiondate"]. '</td>
                            <td class="studentidexnumbers">'.$row["indexnumber"].'</td>
                            <td><b>'.$row["studentname"]. '</b><br> <hr>'.$row["email"].'<br> <hr>' .$row["phonenumber"].'</td>
                            <td>'.$row["transactionmethod"].'</td>

                            <td>'.number_format($row["amount"],2).'</td>
                         
                       
                  
                            <td>
                             



                           
                            
                            <img src='.$img_URL.' height="35" width="35" alt="No recipt attached" class="themainimage  gallery-item" alt="Gallery1">

                            <div class="modal fade" id="gallery-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <a href="table.php?image='.$row["rimage"].'" ><img src="icons/download.png" alt="" id="downloadicon"></a>
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                              <div class="modal-content">
                              
                                <div class="modal-header">
                                  <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <img src="images/1.jpg" class="modal-img" alt="No recipt attached" style="max-width: 100%;">
                                </div>
                              </div>
                            </div>
                          </div>


                          <hr>

                        <a href="display_pdf.php?id='.$row["id"].'& pdfile='.$pdf_URL.'& nameofstudent='.$row["studentname"].'" id="showthepdftext" title="Read the PDF file" target="_blank">'.$row["pdf"].'</a>


                               <td>'.$row["bankname"].'<br> <hr>'.$row["specialreason"].'</td>





                            <td> 
                         
                         
                          
                           ';
                           ?>
                       
                            <input class="form-check-input thecheckbox" <?php if($row["status"]=='0'){echo "checked" ; }?>     onclick="toggleStatus(<?php echo $row['id'];?>),  isCkecked()" type="checkbox" role="switch" id="check">

                            <?php echo '
                             </td>

                             <td>
                             <form action="index.php" method="get">
                            <a href="pdffiles/update.php?id='.$row["id"].'& indexnumber='.$row["indexnumber"].' & studentname='.$row["studentname"].'& transactionmethod='.$row["transactionmethod"].'& submitiondate='.$row["submissiondate"].'& emailaddress='.$row["email"].' & phonenumber='.$row["phonenumber"].' & amount='.$row["amount"].' & bankname='.$row["bankname"].' & specialreason='.$row["specialreason"].'"  id="theupdatebutton">Update</a>
                            </form>
                             </td>
                             
                              
                             </td>

                        
                        
                      


                        
                        </tr>
                        ';
                    }
                    ?>
        </table>



        <button id="btnScrollToTop"><img src="icons/up-arrow.png" alt="">   </button>


<script>
      function isCkecked(){
       thecheckedbox = document.getElementById("check");
       if(thecheckedbox.checked){
        thecheckedbox.style.backgroundColor = "red";
       }else{
        thecheckedbox.style.backgroundColor = "white";
       }
      }
</script>

<script src="toggleStatus.js"></script>
  <script src="jquery.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
          const btnScrollToTop = document.getElementById('btnScrollToTop');
          btnScrollToTop.addEventListener('click', function(){
            window.scrollTo({
           top:0,
           left:0,
           behavior:"smooth"
            
            });
          })
        </script>

<script>
    function checktheterm(){
        if(document.getElementById('thesearchbar').value == ""){
       alert("Enter any information about student");
       document.getElementById('thesearchbar').classList.toggle("searchNoneError"); 
       return false;
    }else{
        return true;
    }
    }
    
</script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        

        <script type="text/javascript">
document.addEventListener("click",function (e){
 if(e.target.classList.contains("gallery-item")){
       const src = e.target.getAttribute("src");
       document.querySelector(".modal-img").src = src;
       const myModal = new bootstrap.Modal(document.getElementById('gallery-popup'));
       myModal.show();
 }
})
</script>

<script>
    
    function checkdelete(){
            
                return confirm('Do you need to delete the record ?');
 
                
            }
</script>



        </body>
</html>


