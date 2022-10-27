
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="camp.png">
    <title>Saegis campus - Nugegoda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        body{
            background-color: rgb(231, 231, 231,0.5);
        }
        .thebackdiv{
            background-color:  white;
            width: 1500px;
            height: 700px;
            margin:10px auto;
            position: relative;
        }
        .thebackdiv img{
            width:20px;
            height:20px;
        }
        .saysuccesss{
            position: absolute;
            width:100% ;
            height:100%;
            display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
            margin-top:20px;
          
        }
        .saysuccesss h1{
            color: rgb(52, 224, 0) ;    
 font-family: Arial, Helvetica, sans-serif;
 font-size: 180px;
 position: relative;
bottom: 200px;
        }
        .saysuccesss span{
             opacity:0.6;
             color:red;
            position: absolute;
 bottom: 260px;
 font-size: 250px;
        }
        .saysuccesss h2{
            font-family: sans-serif;
  font-size: 28px;
  color: rgba(0, 0, 0, 0.81);
        }
    </style>
</head>
<body>
    
</body>
</html>
 

<?php

$connect = new PDO("mysql:host=localhost;dbname=student", "root", "");

$query = "SELECT * FROM studentinfo";
$result = $connect->query($query);
$con = mysqli_connect("localhost","root","","student");
if(isset($_POST['search']))
                                    {
                                        
                                        $filtervalues = $_POST['search_box'];
                                        $query = "SELECT * FROM studentinfo WHERE CONCAT(indexnumber,studentname,transactionmethod,submissiondate,rimage) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);


                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                         
                                            { 
                                                $img_URL = 'image/'.$items["rimage"];
                                                ?>
                                                <div class="maindivv">
                                                <tr >
                                                <span class="thespantag">Indexnumber : </span> <td><?= $items['indexnumber']; ?></td><br><br>
                                                <span class="thespantag">Studentname : </span> <td><?= $items['studentname']; ?></td><br><br>
                                                <span class="thespantag">Transactionmethod : </span> <td><?= $items['transactionmethod']; ?></td> <br><br>
                                                <span class="thespantag">submissiondate : </span> <td><?= $items['submissiondate']; ?></td> <br><br>
                                                <span class="thespantag">Recipt Image : </span>    <?php    echo ' <td> <img src='.$img_URL.' height="200" width="150" alt="No recipt attached" class="thefilteredimage"> </td>';?><br> 
                                                
                                            
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
 


   if(isset($_POST['insert'])){
     
    


	$indexnumber = $_POST['indexnumber'];
	$studentname = $_POST['studentname'];
	$emailaddress = $_POST['emailaddress'];
	$phonenumberr = $_POST['phonenumberr'];
	$paidamount = $_POST['paidamount'];
	$bank = $_POST['bank'];
	$specialreason = $_POST['specialreason'];



	$transactionmethod = $_POST['transactionmethod'];
    $submissiondate = date('Y-m-d', strtotime($_POST['submissiondate']));
 
   
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $fsize = $_FILES['image']['size'];
    $extension = explode('.',$filename);
    $extension = strtolower(end($extension));  
	$fnew = uniqid().'.'.$extension;
    $folder = "./image/" . $filename;


    $pdf=$_FILES['pdf']['name'];
            $pdf_type=$_FILES['pdf']['type'];
            $pdf_size=$_FILES['pdf']['size'];
            $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
            $pdf_store="pdf/".$pdf;
        
            
        
            move_uploaded_file($pdf_tem_loc,$pdf_store );
          
         
            
        
            $query = "INSERT INTO studentinfo(indexnumber,studentname,email,phonenumber,amount,transactionmethod,bankname,specialreason,submissiondate,rimage,pdf) VALUES('$indexnumber', '$studentname','$emailaddress','$phonenumberr','$paidamount', '$transactionmethod','$bank','	$specialreason','$submissiondate','$filename','$pdf')";
           
        
            $query_run = mysqli_query($sonnection, $query) or die(mysqli_error());
          
        
            if (move_uploaded_file($tempname, $folder)) {
                echo '  <div class="thebackdiv">
                            <a href="index.php"> <img src="arrow.png" ></a>   
                            <div class="saysuccesss">
                            <h1>Success</h1>
                            <span>☺</span>
                            <h2>Now you can close the window</h2>
                            </div>   
                </div>
                                ';
            } else {
                 
                echo '  <div class="thebackdiv">
                <a href="index.php"> <img src="arrow.png" ></a>   
                <div class="saysuccesss">
                <h1>Success</h1>
                <span>☺</span>
                <h2>Now you can close the window</h2>
                </div>   
        </div>
                    ';
         
            }
        
            if($query_run){
                echo '<script type="text/javascript">alert("Successfully completed") </script>';
         
                   exit;
                  
            }


    if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' ){
        if($fsize>=1000000){
             echo "<script> alert('Image is too large') </script>";
        }else{
            $pdf=$_FILES['pdf']['name'];
            $pdf_type=$_FILES['pdf']['type'];
            $pdf_size=$_FILES['pdf']['size'];
            $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
            $pdf_store="pdf/".$pdf;
        
            
        
            move_uploaded_file($pdf_tem_loc,$pdf_store );
          
         
            
        
            $query = "INSERT INTO studentinfo(indexnumber,studentname,email,phonenumber,amount,transactionmethod,bankname,specialreason,submissiondate,rimage,pdf) VALUES('$indexnumber', '$studentname','$emailaddress','$phonenumberr','$paidamount', '$transactionmethod','$bank','	$specialreason','$submissiondate','$filename','$pdf')";
           
        
            $query_run = mysqli_query($sonnection, $query) or die(mysqli_error());
          
        
            if (move_uploaded_file($tempname, $folder)) {
                echo '  <div class="thebackdiv">
                            <a href="index.php"> <img src="arrow.png" ></a>   
                            <div class="saysuccesss">
                            <h1>Success</h1>
                            <span>☺</span>
                            <h2>Now you can close the window</h2>
                            </div>   
                </div>
                                ';
            } else {
                 
                echo '  <div class="thebackdiv">
                <a href="index.php"> <img src="arrow.png" ></a>   
                <div class="saysuccesss">
                <h1>Success</h1>
                <span>☺</span>
                <h2>Now you can close the window</h2>
                </div>   
        </div>
                    ';
         
            }
        
            if($query_run){
                echo '<script type="text/javascript">alert("Successfully completed") </script>';
         
                   exit;
                  
            }
         $pdf=$_FILES['pdf']['name'];
            $pdf_type=$_FILES['pdf']['type'];
            $pdf_size=$_FILES['pdf']['size'];
            $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
            $pdf_store="pdf/".$pdf;
        
            
        
            move_uploaded_file($pdf_tem_loc,$pdf_store );
          
         
            
        
            $query = "INSERT INTO studentinfo(indexnumber,studentname,email,phonenumber,amount,transactionmethod,bankname,specialreason,submissiondate,rimage,pdf) VALUES('$indexnumber', '$studentname','$emailaddress','$phonenumberr','$paidamount', '$transactionmethod','$bank','	$specialreason','$submissiondate','$filename','$pdf')";
           
        
            $query_run = mysqli_query($sonnection, $query) or die(mysqli_error());
          
        
            if (move_uploaded_file($tempname, $folder)) {
                echo '  <div class="thebackdiv">
                            <a href="index.php"> <img src="arrow.png" ></a>   
                            <div class="saysuccesss">
                            <h1>Success</h1>
                            <span>☺</span>
                            <h2>Now you can close the window</h2>
                            </div>   
                </div>
                                ';
            } else {
                 
                echo '  <div class="thebackdiv">
                <a href="index.php"> <img src="arrow.png" ></a>   
                <div class="saysuccesss">
                <h1>Success</h1>
                <span>☺</span>
                <h2>Now you can close the window</h2>
                </div>   
        </div>
                    ';
         
            }
        
            if($query_run){
                echo '<script type="text/javascript">alert("Successfully completed") </script>';
         
                   exit;
                  
            } 
          
           }
        }
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
 $selete = mysqli_query($sonnection, "DELETE FROM studentinfo WHERE id= '$id'");


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
 
            header("Cache-Control:public");
            header('Content-Description: File Transfer');
            header('Content-Type: application/image');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Content-Transfer-Encoding:binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            flush();  
            readfile($file);
            header("Location:index.php");
            exit;
   

   }
 
 

?>

 
<html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

      

    <style>

 
        body{
            background-color: rgb(244, 244, 244);
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
 

.thespantag{
    color: blue;
         font-weight: bold;
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
  .maindivv{
    width: 90%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 10px;
 
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.16);

          
  }
.maindiv{
    display: flex;
    justify-content: center;
    position: relative;
 top: 10px;
    flex-wrap: wrap;
    background-color: rgb(255, 255, 255);
    width: 59%;
    height: 1190px;
    box-shadow: 3px 3px 11px 3px rgba(0, 0, 0, 0.268);
    margin: 0 auto;
    border-radius: 30px;
}
.maindiv form{
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex: content;
    flex-wrap: wrap;
    flex-direction: column;
    margin: 25px;
}
.maindiv form label{
    font-size: 23px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    color: black;
}
.maindiv form label::after{
    content:"*";
    color: rgba(255, 0, 0, 0.692);
    font-size: 25px;

}
.maindiv form input{
    width: 60%;
   height: 38px;
   outline: none;
   
   font-size: 15px;
   color: black;
   padding: 5px;
}
.maindiv form input:focus{
    border-bottom: 1px solid blue;
}
.maindiv form select{
    width: 30%;
  height: 38px;
  font-size: 15px;
  color: black;
 
 

}
#submitbtn{
    background-color: blue;
 color: white;
 font-size: 20px;
  width: 50%;
  height: 50px;
  cursor: pointer;
  font-weight: bold;
  border: none;
  position: relative;
  border-radius: 30px;
      top:18px;
}
#submitbtn:hover{
    
  opacity: 0.7;
  transition: 0.1s all ease-in-out;
}
#submitbtn:active{
    
    color: blue;
 background: none;
 border: 2px solid blue;
}
  
 #display-image{
    width: 100%;
    justify-content: center;
    padding: 5px;
    margin: 15px;
}
 
  
.ben10{
   
 color: rgb(0, 195, 0);
 font-family: Arial, Helvetica, sans-serif;
 font-size: 30px;
}
 
.thelistrecipt{
    transition: 0.2s all ease-in-out;
}
.thelistrecipt:hover{
    width: 480px;
   height: 680px;
   cursor: pointer;
   transition: 0.2s all ease-in-out;
}
#chooingdate{
    font-family: Arial, Helvetica, sans-serif;
font-size: 18px;
color: rgba(0, 0, 0, 0.427);
}
#uploadthefile{
 
width: 48px;
height: 48px;
position: relative;
margin: 0px auto;
text-align: center;
display: flex;
justify-content: center;
align-items: center;

top:10px;
}
#uploadthefile img{
    position: absolute;
width: 100%;
height: 100%;
transition: 0.2 all ease-in-out;
cursor: pointer;
margin: 0px auto;
text-align: center;
 
}
#reciptimage{
    display:none;
}
#uploadthefile:hover .thefileicon{
    transform: scale(1.3,1.3);
    transition: 0.2 all ease-in-out;
    
}
#uploadthefile:hover .theexaplerecipimage{
    transform: translateY(-240px);
    opacity: 1;
    transition: 0.5s all ease-in-out;
    z-index: 100;
 
}



.theexaplerecipimage{
    position: absolute;
    width:300px;
    flex-direction: column;
    height: 400px;
    transition: 0.5s all ease-in-out;
    opacity: 0;
  z-index: -3;
 
  border-radius: 10px;
    transform: translateY(-550px);
 
    background-color: rgba(0, 0, 118, 0.923);
}
.theexaplerecipimage h1{
    color:white;
    position: relative;
 top: 10px;
    opacity: 0.8;
}
.theexaplerecipimage hr{
    color:white;
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
 
.theshortdiscription{
    position: relative;
    color: rgba(0, 0, 0, 0.566);
margin: 0px ;
padding: 0px;
top:5px;
font-family: Arial, Helvetica, sans-serif;
}
.theshortdiscription::after{
    content:"*";
    color: rgba(255, 0, 0, 0.605);
    font-size: 20px;
    position: relative;
    left:5px;
}
#thedepositedate{
    position: relative;
 margin-top: 5px;
}
 
#recoptdownloadinput{
    display:none;
    width:20px;
    height:20px;
}
#gallery-popup .modal-img{
	width: 100%;
}
 
 
.uploadthepdftext{
    position: relative;
    color: rgba(0, 0, 0, 0.566);
margin: 0px ;
padding: 0px;
 bottom:27px;
font-family: Arial, Helvetica, sans-serif;
}
.uploadthepdftext::after{
    content:"*";
    color: rgba(255, 0, 0, 0.692);
    font-size: 25px;  
}
.impotentPoints{
    font-family: sans-serif;
  font-size: 15px;
  color: white;
}
.innerImpotentPoints{
    position: absolute;
 width: 100%;

 height: 90%;
 padding:10px;
 
}
 
#pdffile{
    display:none;
}
#pdffile{
    display:none;
}
#pdffilelabel{
    width: 10px;
 height: 10px;
 background-color: aquamarine;
}
 
#showCorrectIcon{
    width: 22px;
    height: 22px;
    transform: translate(31px,-29px);
}
.showCorrectIcon{
    display:none;
}
#showtheImageUploadCorrect{
    width: 22px;
    height: 22px;
    transform: translate(30px,-21px);
}
#uploadthefile::after{
    content:"";
}
.Innerredwarning{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 1200%;
    height: 50px;
    background-color: red;
    position: absolute;
    transform: translate(20px , -150px);
    border-radius: 30px;
    transition: 0.2s all ease-in-out;
    opacity: 0;
    z-index: -5;
}
.Innerredwarning > h4{
    color:white;
    font-size: 15px;
        font-family: Arial, Helvetica, sans-serif;
}
#uploadthefile:hover .Innerredwarning{
    transform: translate(20px , -70px);
    transition: 0.2s all ease-in-out;
    opacity: 1;
    z-index: 100;
}
.showtheredborder{
    border: 2px solid red;
    border-bottom: 2px sold red;
}
#thespecialreason:after{
    content:"";
}

input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button{
      -webkit-appearance: none;
      margin: 0px;





@media screen and (max-width: 800px){
    body{
        display: flex;
      justify-content: center;
      align-items: center;
    }
    .maindiv form label{
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    color: black;
}
.maindiv form input{
    width: 85%;
   height: 38px;
   outline: none;
   
   font-size: 15px;
   color: black;
   padding: 5px;
}
#selectElements{
    width:75%;
    height: 38px;
}
#submitbtn{
    background-color: blue;
 color: white;
 font-size: 15px;
  width: 40%;
  height: 38px;
  cursor: pointer;
  font-weight: bold;
  border: none;
  position: relative;
  border-radius: 30px;
      top:18px;
}
.maindiv{
    display: flex;
    justify-content: center;
    position: relative;
     top: 10px;
    flex-wrap: wrap;
    background-color: rgb(255, 255, 255);
    width: 90%;
    height: 1190px;
    box-shadow: 3px 3px 11px 3px rgba(0, 0, 0, 0.268);
    margin: 0 auto;
    border-radius: 30px;
}
input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button{
      -webkit-appearance: none;
      margin: 0px;



 
}
 
 

    </style>

      
    </head>
    <body>

        <div class="maindiv">

        <form action="" method="post" enctype="multipart/form-data" onsubmit="return checkforblank() "  >
            <label for="">Index number</label> 
            <input type="text" name="indexnumber" placeholder="Index number" required/> 

            <label for="">Student name</label> 
            <input type="text" name="studentname" placeholder="Student name" required/> 

            <label for="">Email</label> 
            <input type="email" name="emailaddress" placeholder="Email address" required/> 

            <label for="">Phone number</label> 
            <input type="number" name="phonenumberr"   id="checkPhoneNumber" placeholder="Ex : 07XXXXXXXX"   /> 

            <label for="">Amount</label> 
          
            <input type="number" name="paidamount" placeholder="Amount" required/> 

            <label for="">Fee type</label> 
            <select name="transactionmethod" required id="selectElements"> 
                     <option value="" align="center"> - Your fee type -</option>
                     <option value="Registered fee" align="center">Registration  fee</option>
                     <option value="Royalty fee" align="center">Royalty fee</option>
                     <option value="Class fee" align="center">Class fee</option>
            </select>


            <label for="">Bank</label> 
            <select name="bank" required id="selectElements" > 
                     <option value="" align="center"> - Your  deposited bank name -</option>
                     <option value="sampath Bank" align="center">Sampath bank -Saegis campus</option>
                     <option value="Commercial Bank" align="center">Commercial bank -Saegis campus</option>
                      
            </select>

            <label for="" id="thespecialreason">special reason</label> 
            <select name="specialreason"  id="selectElements" > 
                     <option value="" align="center"> - optional -</option>
                     <option value="Blocked" align="center">Blocked - Study portal</option>
                     <option value="Hold" align="center">Hold - Results</option>
                      
            </select>


            <label for="" id="thedepositedate">Deposited date</label> 
            <input type="date" name="submissiondate" required  id="chooingdate"  >
           
 
            <input type="file" name="image" id="reciptimage"  accept=".jpg , .png , .gif"   onclick="checkimage()"> 


           

            <label for="reciptimage" id="uploadthefile" title="Read the instructions carefully" >

             <div id="showtheImageUploadCorrect" class="showCorrectIcon">
             <img src="icons/correct.png" alt="" id="">
             </div>

                <img src="icons/file.png" alt="" id="thefileupdateicon" class="thefileicon">

                <div class="theexaplerecipimage">
                                         <h1 align="center">IMPORTENT !</h1> 
                                         <hr>
                                         <div class="innerImpotentPoints">
                                         <h4 class="impotentPoints" align="left">1 - Should be a Clear Image.</h4>
                                         <h4 class="impotentPoints" align="left">2 - Must have a Transaction Date.</h4>
                                         <h4 class="impotentPoints" align="left">3 - Should be available Beneficiary Details.</h4>
                                         <h4 class="impotentPoints" align="left">4 - Should be an Official Slip.</h4>
                                         <h4 class="impotentPoints" align="left">5 - Should be a Successfully or Completed Stage.</h4>
                                    
                                    
                                         </div>
                                     </div>
            </label>
          
          <p class="theshortdiscription">Upload your recipt (.jpg, .png, .GIF formet)</p>
          <p  id="thespecialreason">OR</p>
          <p class="uploadthepdftext">Upload your  PDF file</p>

 
                                   



          <input type="file" name="pdf" id="pdffile" accept=".pdf"  onclick="move()"> 
          <label for="pdffile" id="uploadthefile" title="Upload the PDF format" id="pdffile" >

            <div id="showCorrectIcon" class="showCorrectIcon">
          <img src="icons/correct.png" alt="" id="">
          </div>

                <img src="icons/pdf.png" alt="" id="thefileupdateicon" class="thefileicon">
                 
                <div class="Innerredwarning">
                                         <h4 class=" " align="left">File size should be less than 2 MB & rename file less than 15 characters</h4>
                                          </div>
 
            </label>
            
                                        

			<input type="submit" name="insert" value="Submit"  id="submitbtn"    >
  
        </form>
        </div>

 
        <a href="table.php">go table</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
 <script>
           
           var todateDate = new Date();
           var mounth = todateDate.getMonth() + 1;
            var year = todateDate.getUTCFullYear();
            var tDate = todateDate.getDate();
         if(mounth < 9){
           mounth = "0"+ mounth;
         }
         if(tDate <10){
           tDate = "0"+ tDate;
         }
 
            var maxDate = year + "-" + mounth + "-" + tDate;
            document.getElementById('chooingdate').setAttribute("max",maxDate);
          
          </script>
 
         <script>
            

  function checkforblank(){
     
  

    if(document.getElementById('pdffile').value == "" && document.getElementById('reciptimage').value == ""){
        document.getElementById('pdffile').focus();
        document.getElementById('reciptimage').focus();
        alert("You have to upload your recipt OR PDF file.");
        return false;
       
    } else if (document.getElementById('checkPhoneNumber').value.length > 10 || document.getElementById('checkPhoneNumber').value.length <10){
        alert("Invalid phone number.");
        document.getElementById('checkPhoneNumber').focus();
        document.getElementById('checkPhoneNumber').classList.toggle("showtheredborder"); 
        return false;
    } else if (document.getElementById('pdffile').value.length >30){
        alert("Please rename your PDF file less than 15 characters and then upload again.");
        return false;
    }
    else{
        return true;
    }
    
  }
   

  function move(){
    document.getElementById('pdffile').addEventListener('change', ckeckfile);
    function ckeckfile(){
        const reader= new FileReader();
        reader.addEventListener('load', () =>{
       localStorage.setItem("recent-image", reader.result);
       

       const recentDataUrl = localStorage.getItem("recent-image");
    if(recentDataUrl){
        document.getElementById('showCorrectIcon').classList.toggle("showCorrectIcon"); 
    }

     })
     reader.readAsDataURL(this.files[0]);
    }
  }




  function checkimage(){
    document.getElementById('reciptimage').addEventListener('change', ckeckimage);
  function ckeckimage(){
    const reader= new FileReader();
    
    reader.addEventListener('load', () =>{
        localStorage.setItem("newrecent-image", reader.result);
        const recentDataUrl = localStorage.getItem("newrecent-image");
        
        if(recentDataUrl){
        document.getElementById('showtheImageUploadCorrect').classList.toggle("showCorrectIcon"); 
    }

    })
    reader.readAsDataURL(this.files[0]);
  }

  }
         
         </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

 
    </body>
</html>

 

 