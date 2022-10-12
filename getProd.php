<?php
 include 'dbConfig.php';
 $prod=$_POST['name'];
 $esc_prod = mysqli_real_escape_string($conn,$prod);
 $esc_prod=trim($esc_prod," ");
 $esc_prod=strtolower($esc_prod);


 $sel2="SELECT * FROM product WHERE TRIM(LOWER(item)) ='$esc_prod';";
 $res2=mysqli_query($conn,$sel2);
 $row2=mysqli_num_rows($res2);
if ($row2>0){
  echo '<h1>LIST OF SUPPLIER</h1>';
 for ($i=0;$i<$row2;$i++){
   $fet2=mysqli_fetch_assoc($res2);
   $comp=$fet2['compID'];
   $sel3="SELECT name FROM company WHERE id='$comp';";
   $que=mysqli_query($conn,$sel3);
   $fet3=mysqli_fetch_assoc($que);
   if ($fet2['price']==0){
     $fet2['price']="N/A";
   }
   if ($fet2['price2']==0){
    $fet2['price2']="N/A";
  }
  // echo '<div class="prodList">'.'<p>'.'<a href="#">'. $fet2['item'].'</a>'.'</p>'.'<p>'.$fet2['price'].'-'.$fet2['price2'].'</p>'.'<p class="prodComp">'.$fet3['name'].'</p>'.'</div>';
   echo '<div class="prodList">'.'<p class="item_res">'.'<a href="#">'. $fet2['item'].'</a>'.'</p>'.'<div class="unit_div">Unit Price: '.'<p class="unit_price">'.'Php '.$fet2['price'].'</p>'.'</div>'.'<div class="unit_div"> Price Range: '.'<p class="range_price">'.'Php '.$fet2['price2'].'</p>'.'</div>'.'<div class="comp_div">Company: '.'<p class="prodComp"> '.$fet3['name'].'</p>'.'</div>'.'</div>';
   //unset($_GET['bttn']);
 }
 
}
else{
  echo 'No results found';
}

//  echo "<div><p>".$fet['name']."</p>"."<p>".$fet['telephone']."</p>"."<p>".$fet['mobile']."</p>"."<p>".$fet['address']."</p>"."<p>".$fet['email']."</p>"."<p>".$fet['website']."</p>"."<br>"."<button id='back'>Go Back</button>"."</div>"
?>