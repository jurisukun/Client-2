<?php
  include 'dbConfig.php';


  // $sel="SELECT * FROM company;";
  // $res=mysqli_query($conn,$sel);
  
  // $row=mysqli_num_rows($res);
  // for ($i=0;$i<$row;$i++){
  //   $fet=mysqli_fetch_assoc($res);
  //   echo $fet['name'];
  // }

 
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Document</title>
</head>
<body>
  <div class="div">
    <form method=GET>
      <input id="item" name="item" type=text placeholder="Search items here"/>
      <button  name="bttn" id="bttn">Search</button>
    </form>
    <div id ="list">
        <?php 
              if (isset($_GET['bttn'])){
                $item=$_GET['item'];
                //echo $item;
          
                $sel2="SELECT * FROM product WHERE item ='$item';";
                $res2=mysqli_query($conn,$sel2);
                $row2=mysqli_num_rows($res2);
              if ($row2>0){
                for ($i=0;$i<$row2;$i++){
                  $fet2=mysqli_fetch_assoc($res2);
                  $comp=$fet2['compID'];
                  $sel3="SELECT name FROM company WHERE id='$comp';";
                  $que=mysqli_query($conn,$sel3);
                  $fet3=mysqli_fetch_assoc($que);
                  echo '<div class="prodList">'.'<p>'.'<a href="#">'. $fet2['item'].'</a>'.'</p>'.'<p>'.$fet2['price'].'-'.$fet2['price2'].'</p>'.'<p class="prodComp">'.$fet3['name'].'</p>'.'</div>';
                }
              }
              else {
                echo ("<script>  alert ('no results found') </script>");
              }
         }
        ?>
    </div>
    
   
  </div>
</body>
 <script>
//  $('#bttn').click(function(){

//       alert("clicked");
//       let it=$('#item').val()
//       if (it !=""){
//         alert (it)

      
//       }
      

// })
$('.div').find('.prodList').each(function(){
  let ind=$(this).index()
  $(this).click(function(){
    alert(ind)
    alert($('.prodComp')[ind].textContent)
    //alert($(this.prodComp))
  })

})
    

    
    
     

 </script>
</html>