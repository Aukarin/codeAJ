<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <style>
     

/* Extra styles for the cancel button */

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}



/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50% ; /* Could be more or less, depending on screen size */
  height:fixed%;
  overflow: auto;
  border-radius:10px;
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */


  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}


    </style>
</head>
<body>
   

<button onclick="document.getElementById('lo01').style.display='block'">Click me</button>
<div id="lo01" class="modal">
  
  <div class="modal-content"  >
    
    <div class="imgcontainer">
      
      <span onclick="document.getElementById('lo01').style.display='none'" class="close" title="Close Modal">&times;</span>
     
       
      <button name="add" id= "add" data-toggle="modal" data-target="#addModal"> add</button>   
    <?php 


//data-toggle ส่วนใส่evet เปิดตัว
    $imgs= array("1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg");
    $N=1;
    $nub= count($imgs);
    while($row=mysqli_fetch_array($result)){?>
    
  
    <?php

    echo $row['fname'];
    
    }

    
    ?>
  <td><input type="button" name="view" class="btn btn-info btn-xs view_data"value="view" id="<?php echo $row[id] ?>" /> </td>
      <br>
    
    </div>
<?php    require 'view.php'?>

</body>
<script>
$(document).ready(functoin(){  // sintax
//#insert-form ตรวจเช็คevent=e การกดsubmit 
  $('#insert-form').on('submit',functoin(e){
    e.preventDefault();
    $.ajax({
      url:"insert.php",
      method:"post",
      data:$('#insert-form').serialize(); //serialize ส่งข้อมูลในฟอร์มเป็นก้อน
      beforeSend:function(){
        $('#insert').val("Insert..") //ปุ่มsubmitทีี่มี id insert เปลี่ยนข้อความเปนInsert..
      }
      sucess:function(data){
        $('#insert-form')[0].reset(); //insert-form เคลียค่าเจ้าก้อนเดียวทิ้ง
        $('#addModal').modal('hide'); //ใส่ละปิด
      }
    });
    
  });
  $('.view_data').click(functoin(){ //อ้างอิงผ่านclass 
    var uid=$(this).attr("id") //รับค่า id
    $.ajax({ //ส่ง
      url:"se.php",
      method:"post",
      data:{id:uid},
      sucess:function(data){
        $('#detail').html(data);
        $('#dataModal').modal('show');
      }


    });

  });
  $('.edit_data').click(functoin(){ //อ้างอิงผ่านclass 
    var uid=$(this).attr("id") //รับค่า id
    $.ajax({ //ส่ง
      url:"fetch.php",
      method:"post",
      dataType:"json",

      sucess:function(data){
        $('#id').val(data.id); //ถ้ากดปุ่มจะตวจสอบค่าใหม่
        $('fname').val(data.fname);
        $('#insert').val('Update');
        $('#addModal').modal('show');
      }


    });

  });

});
  </script>
</html>