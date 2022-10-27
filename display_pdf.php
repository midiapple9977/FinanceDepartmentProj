<?php
 $server="localhost";
 $username ="root";
 $password ="";
 $dbname = "student";
 $sonnection = mysqli_connect($server,$username,$password,$dbname);
 $nameofstudent = $_GET['nameofstudent'] ; 
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="camp.png">
 
    <title><?php echo "$nameofstudent"." PDF file" ?></title>
    
    <style>
        ::-webkit-scrollbar{
      display: none;
    }
        #pdffile{
            width: 100%;
            height: 100%;
        }
        .div1{
            width: 100%;
            height:  780px;
        
        }
        body{
            margin: 0px;
      padding: 0px;
      box-sizing: border-box;
      
        }
        .showNoPdf{
            width: 100%;
   height: 1500px;
 
   position: relative;
   margin:0px auto;
   flex-direction: column;
        }
        .showNoText{
          
            width: 90%;
            height: 500px;
            margin:15px auto;
            background-color: white ;
            display: flex;
            box-shadow: 5px 5px   15px 5px rgba(0, 0, 0, 0.281);
            border-radius: 30px;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .showNoText h1{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 50px;
            color: red;
        }
        .showNoText span{
            font-size: 150px;
            color: rgba(255, 0, 0, 0.619);
        }
        body{
            background-color: rgb(231, 231, 231,0.5);
        }
    </style>
</head>
<body>
    <div class="div1"> 
        <?php
        
        $server="localhost";
        $username ="root";
        $password ="";
        $dbname = "student";
        $sonnection = mysqli_connect($server,$username,$password,$dbname);

        $id = $_GET['id'] ; 
       
        $pdf = $_GET['pdfile'] ; 
      

        $sql="SELECT pdf FROM studentinfo WHERE id= '$id'";
        $query= mysqli_query($sonnection,$sql);
         
        

        while($info= mysqli_fetch_array($query)){
            if(empty($info['pdf'])){
                echo '<div class="showNoPdf">
                            <div class="showNoText">
                            <h1>No PDF file attached  !</h1>
                            <span>☹</span>
                            </div>
                </div>';
            } 
            ?>
 
           <embed src='pdf/<?php echo $info['pdf'];?>' type="application/pdf"   id="pdffile">
               
            <?php
        }
        ?>
    </div>
</body>
</html>