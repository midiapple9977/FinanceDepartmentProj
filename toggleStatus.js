 


function toggleStatus(id){
    var id = id;
    $.ajax({
        url:"toggle.php",
        type:"post",
        data:{catId:id},
        success : function(result){
            if(result == '1'){
             alert ("You Unchecked the Changes. Record is not inserted into History.");
                swal("Done!", "You Unchecked the Changes", "success");
            }else{
             
                alert ("You Can Undo the Changes by Unchecking ");

                swal("Done!", "You have put this record into History", "success");
            }
        }
    });
 }