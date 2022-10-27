<html>
    <head>
      <style> 
      body{
        height: 1000px;
      }
      .main{
   
        
      }
      </style>
        <body>
    
        </body>
    </head>
 </html>









<?php

$server="localhost";
$username ="root";
$password ="";
$dbname = "student";
$sonnection = mysqli_connect($server,$username,$password,$dbname);

   $id = $_GET['id'] ; 
   $indexnumber = $_GET['indexnumber'] ;
   $studentname = $_GET['studentname']  ;
   $transactionmethod = $_GET['transactionmethod'] ;
   $emailaddress = $_GET['emailaddress']  ;
   $phonenumber = $_GET['phonenumber']  ;
   $amount = $_GET['amount']  ;
   $bankname = $_GET['bankname']  ;
   $specialreason = $_GET['specialreason']  ;
   $submitiondate = $_GET['submitiondate']  ;


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="camp.png">
    <title>Saegis campus - Nugegoda</title>
    <style>
 
 form{
   width: 66%;
   height:1100px;
   margin: 0 auto;
   margin-top: 30px;
   position: relative;
   background-color: white;
 box-shadow: 5px 5px 18px 5px rgba(0, 0, 0, 0.093);
 border-radius: 30px;
 
 }
 .mainholder{
   width: 100%;
   height: 750px;
   display: flex;
 
   justify-content: center;
   align-items: center;
   flex-direction: row;
 }
 .textdivholder{
   display: flex;
   height:980px;
   flex-direction: column;
 
   justify-content: space-between;
   align-items: center;
 
 }
 .textdivholder p{
  color: black;
 font-family: sans-serif;
 font-size: 18px;
 }
 .textdivholder input{
  width: 50%;
  color: black;
 font-size: 17px;
  position: relative;
 font-family: sans-serif;
 padding: 6px 10px;
 }
 
 .inputtagsholder  {
   display: flex;
   flex-direction: column;
   justify-content: space-between;
   align-items: center;
   background-color: rgb(3, 28, 28);
 
  
 }
 .theheading{
   text-align: center;
 font-size: 35px;
 font-family: Arial, Helvetica, sans-serif;
 }
 .theheading::first-letter{
  font-size: 42px;
  color:blue;
 }
 .gobackdiv{
 
  position: sticky;
   width: 10%;
 height: 20px;
 top:10px;
  
 display: flex;
 justify-content: center;
 align-items: center;

 
 }
 .gobackdiv img{
   position:relative;
    
height: 100%;
width: 20px;
padding-left: 10px;
cursor: pointer;
    
 }
 .savingdiv{
  width: 50%;
height: 50px;
 
position: sticky;
 transform: translateY(20px);
 
 bottom:18px;
display: flex;
justify-content: center;
align-items: center;
 
 }
 .savingdiv input{
  background-color: blue;
 color: white;
 font-family: sans-serif;
 padding: 9px 58px;
 
 margin-left: 1200px;
 
 cursor: pointer;
 
 border: none;
outline: none;
font-size: 18px;
 }
 .savingdiv input:hover{
 
  transition: 0.1s all ease-in-out;
  border: 2px solid blue;
 color: blue;
 background: none; 
 }
.goback{
  color: rgba(0, 0, 0, 0.8);
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
position: relative;
margin-left: 6px;
}
.seloption{
width: 52%;
color: black;
 font-size: 17px;
position: relative;
font-family: sans-serif;
padding: 6px 10px; 
}

 
#pdffile{
    display:none;
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
 #uploadthefile:hover .thefileicon{
    transform: scale(1.3,1.3);
    transition: 0.2 all ease-in-out;
    
}
#uploadthefile:hover .theexaplerecipimage{
    transform: translateY(-240px);
    opacity: 1;
    transition: 0.5s all ease-in-out;
    z-index: 100;
 
}#uploadthefile::after{
    content:"";
}
#uploadthefile:hover .Innerredwarning{
    transform: translate(20px , -70px);
    transition: 0.2s all ease-in-out;
    opacity: 1;
    z-index: 100;
}
#showCorrectIcon{
    width: 22px;
    height: 22px;
    transform: translate(31px,-29px);
}
.showCorrectIcon{
    display:none;
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
#theSearchBox{
  text-align: center;
  font-weight: bold;
  color: rgba(255, 0, 0, 0.799);
}
 


 body{
            background-color: rgb(244, 244, 244);
      
        }
       
    </style>
</head>
<body>
  
   <div class="gobackdiv">
          <a href="../table.php"><img src="../icons/arrow.png" alt=""></a>    
          <p class="goback">Go Home</p>
   </div>
   <h1 class="theheading">Update students information</h1>
   <form action="" method="get">

      
         <div class="textdivholder">
      <b><p>Student ID</p> </b>   <input type="text" id="theSearchBox"  value="<?php echo "$id"?>" name="id"   required  >
      <b><p>Submition Date</p> </b>  <input type="date" value="<?php echo "$submitiondate"?>" name="submitiondate" required>
      <b><p>Index Number</p> </b>  <input type="text" value="<?php echo "$indexnumber"?>"  name="indexnumber" required>
      <b><p>Student Name</p> </b>  <input type="text" value="<?php echo "$studentname"?>" name="studentname" required>
      <b><p>Email address</p> </b>  <input type="text" value="<?php echo "$emailaddress"?>" name="emailaddress" required>
      <b><p>Phone number</p> </b>  <input type="text" value="<?php echo "$phonenumber"?>" name="phonenumber" required>
      <b><p>Fee type</p>  </b>
            <select name="transactionmethod"  value="<?php echo "$transactionmethod"?>"  class="seloption"  >
                     <option value="<?php echo "$transactionmethod"?>" align="left"><?php echo "$transactionmethod". "   (Selected)"?> </option>
                     <option value="Registered fee" align="center">Registration  fee</option>
                     <option value="Royalty fee" align="center">Royalty fee</option>
                     <option value="Class fee" align="center">Class fee</option>
            </select>
      <b><p>Amount</p> </b>  <input type="text" value="<?php echo "$amount"?>" name="amount"  >
      <b><p>Bank name</p> </b>  
      <select name="bankname"  value="<?php echo "$bankname"?>"  class="seloption"  >
                     <option value="<?php echo "$bankname"?>" align="left"> <?php echo "$bankname" . "   (Selected)"?> </option>
                     <option value="Sampath bank" align="center">Sampath bank -Saegis campus</option>
                     <option value="Commercial bank" align="center">Commercial bank -Saegis campus</option>
                    
            </select> 

            <b><p>Special reason</p> </b>  
      <select name="specialreason"  value="<?php echo "$specialreason"?> "  class="seloption"  >
                     <option value="<?php echo "$specialreason"?>" align="left"><?php echo "$specialreason" . "   (Selected)"?> </option>
                     <option value="Blocked" align="center">Blocked - Study portal</option>
                     <option value="Hold" align="center">Hold - Results</option>
                    
            </select> 
      
        <br>
       
         </div>

         <input type="file" name="pdf" id="pdffile" accept=".pdf"  onclick="move()"> 
          <label for="pdffile" id="uploadthefile" title="Upload the PDF format"   >

            <div id="showCorrectIcon" class="showCorrectIcon">
          <img src="correct.png" alt="" id="">
          </div>

                <img src="../icons/pdf.png" alt="" id="thefileupdateicon" class="thefileicon">
                 
                <div class="Innerredwarning">
                                         <h4 class=" " align="left">File size should be less than 2 MB & rename file less than 15 characters</h4>
                                          </div>
 
            </label>
          
       <div class="savingdiv" id="savingdiv">

  
     
 <input type="submit" name="submit" value="Save"    > 
      </div>
   </form>



 

 

   <script>
    function move(){
    document.getElementById('pdffile').addEventListener('change', ckeckfile);
    function ckeckfile(){
        const reader= new FileReader();
        reader.addEventListener('load', () =>{
       localStorage.setItem("recent-image", reader.result);
       

       const recentDataUrl = localStorage.getItem("recent-image");
    if(recentDataUrl){
        
    }

     })
     reader.readAsDataURL(this.files[0]);
    }
  }
   </script>
</body>
</html>



<?php
$server="localhost";
$username ="root";
$password ="";
$dbname = "student";
$sonnection = mysqli_connect($server,$username,$password,$dbname);

if(isset($_GET['submit'])){
    $newid = $_GET['id'];
    $newindexnumber = $_GET['indexnumber'];
    $newstudentname = $_GET['studentname'];
    $newtransactionmethod = $_GET['transactionmethod'];
    $newsubmitiondate = $_GET['submitiondate'];

    $newemailaddress = $_GET['emailaddress']  ;
   $newphonenumber = $_GET['phonenumber']  ;
   $newamount = $_GET['amount']  ;
   $newbankname = $_GET['bankname']  ;
   $newspecialreason = $_GET['specialreason']  ;
   $newpdf= $_GET['pdf']  ;

    $query = "UPDATE studentinfo SET id='$newid' ,indexnumber='$newindexnumber' ,studentname='$newstudentname',email='$newemailaddress',phonenumber='$newphonenumber',amount='$newamount' ,transactionmethod='$newtransactionmethod',bankname='$newbankname',specialreason='$newspecialreason' ,submissiondate='$newsubmitiondate',  pdf='$newpdf' WHERE id='$newid'";
$data = mysqli_query($sonnection ,$query );
if($data){
    echo '<script type="text/javascript">alert("Data successfully updated") </script>';
}else{
    echo '<script type="text/javascript">alert("Data not updated") </script>';
}
    
}


?>

