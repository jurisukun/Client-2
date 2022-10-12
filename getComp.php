<?php
 include 'dbConfig.php';
//  $company=$_POST['name'];
//  $esc_company = mysqli_real_escape_string($conn, $company);
$comp=$_POST['name'];
$esc_comp = mysqli_real_escape_string($conn,$comp);
$esc_comp=trim($esc_comp," ");
$esc_comp=strtolower($esc_comp);


$sel="SELECT * FROM company WHERE TRIM(LOWER(name)) ='$esc_comp';";

 //$sel="SELECT * FROM company WHERE name='$esc_company';";
 $res=mysqli_query($conn,$sel);
 $fet=mysqli_fetch_assoc($res);
 $fet_add=$fet['website'];


 echo "<h1 class='Cinf'> COMPANY INFORMATION</h1>".
 "<div class='prodList2'>".
    "<div><p class='Cname'>".$fet['name']."</p></div>".
    "<div class='details'>Telephone: <p class='tel'>".$fet['telephone']."</p> </div>".
    "<div class='details'> Mobile:<p  class='mob'>".$fet['mobile']."</p></div>".
    "<div class='details'> Address:<p class='add'>".$fet['address']."</p></div>".
    "<div class='details'>Email: <p  class='email'>".$fet['email']."</p></div>".
    "<div class='details'>Website: <p class='web'>".'<a href="'.$fet_add.'"'.'  target="blank" >'.$fet['website'].'</a>'."</p></div>"."<br>".
 "<button id='back' class='back'>Go Back</button>".
 "</div>"
?>