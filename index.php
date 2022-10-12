<?php
    include 'dbConfig.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"/>
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap" rel="stylesheet">
  <title>PPE PRICE</title>
  
</head>
<body>
    <div class="main">
        <div class="first_column">
            <div class="search-bar">
                <!--<form method="GET">-->
                    <input type="search" name="item" id="inp" placeholder="Search">
                    <button type="submit" name="bttn" id="search" ><i class='bx bx-search'></i></button>
               <!-- </form>-->
                
            </div>
    
            <div class="items">
                <h1>Personal Protective <br>Equipment</h1>
                <div class="button-list">
                    <button class="btn">Safety Gears</button>
                        <div id=sgears class="sgears-btn">
                            <div id="hat" class="sub-btn"><p><a href="#">Hard Hat</a></p></div>
                            <div id="strap" class="sub-btn"><p><a href="#">Chin Strap</a></p></div>
                            <div id="wmask" class="sub-btn"><p><a href="#">Welding Mask</a></p></div>
                            <div id="protection" class="sub-btn"><p><a href="#">Body Protection</a></p></div>
                            <div id="vest" class="sub-btn"><p><a href="#">Safety Vest</a></p></div>
                            <div id="gloves" class="sub-btn"><p><a href="#">Safety Gloves</a></p></div>
                            <div id="spect" class="sub-btn"><p><a href="#">Safety Spectacles</a></p></div>
                            <div id="vest" class="sub-btn"><p><a href="#">Safety Vest</a></p></div>
                            <div id="goggles" class="sub-btn"><p><a href="#">Safety Goggles</a></p></div>
                            <div id="shoes" class="sub-btn"><p><a href="#">Safety Shoes</a></p></div>
                            <div id="boots" class="sub-btn"><p><a href="#">Safety Boots</a></p></div>
                            <div id="earp" class="sub-btn"><p><a href="#">Safety Earplugs</a></p></div>
                            <div id="earm" class="sub-btn"><p><a href="#">Safety Earmuffs</a></p></div>
                            <div id="smask" class="sub-btn"><p><a href="#">Safety Masks</a></p></div>
                        </div>
                    <button class="btn">Height Safety Equipment</button>
                    <div id="hsafetyeqp" class="hse-btn">
                            <div id="ladders" class="sub-btn"><p><a href="#">Ladder</a></p></div>
                            <div id="harness" class="sub-btn"><p><a href="#">Safety Harnesses</a></p></div>
                            <div id="fharness" class="sub-btn"><p><a href="#">Full Body Harnesses</a></p></div>
                            <div id="belt" class="sub-btn"><p><a href="#">Safety Belt</a></p></div>
                            <div id="lanyards" class="sub-btn"><p><a href="#">Lanyards</a></p></div>
                            <div id="fall" class="sub-btn"><p><a href="#">Fall Arrest Block</a></p></div>
                            <div id="ropes" class="sub-btn"><p><a href="#">Ropes and Cords</a></p></div>
                      </div>
                    <button class="btn">Others</button>
                    <div id="others" class="others-btn">
                            <div id="tbelts" class="sub-btn"><p><a href="#">Tool Belts</a></p></div>
                            <div id="ctape" class="sub-btn"><p><a href="#">Caution Tape</a></p></div>
                            <div id="tbox" class="sub-btn"><p><a href="#">Tool Box</a></p></div>
                    </div>
                 
                </div>
                    
            </div>   
        </div>
    
        <div class="second_column">
            <h1>LIST OF SUPPLIER</h1>
            
            <?php 
              if (isset($_GET['bttn'])){
               $item=$_GET['item'];
                $item=strtolower( $item );
                // //echo $item;
                
                // $sel="SELECT item FROM product;";
                // $query=mysqli_query($conn,$sel);
                // $row=mysqli_num_rows($query);
                $sel2="SELECT * FROM product WHERE TRIM(LOWER(item)) ='$item';";
                $res2=mysqli_query($conn,$sel2);
                $row2=mysqli_num_rows($res2);
              if ($row2>0){
                for ($i=0;$i<$row2;$i++){
                  $fet2=mysqli_fetch_assoc($res2);
                  $comp=$fet2['compID'];
                  $sel3="SELECT name FROM company WHERE id='$comp';";
                  $que=mysqli_query($conn,$sel3);
                  $fet3=mysqli_fetch_assoc($que);
                  if ($fet2['price']==0){
                    $fet2['price']="";
                  }
                  if ($fet2['price2']==0){
                   $fet2['price2']="";
                 }

                 echo '<div class="prodList">'.
                          '<p class="item_res">'.'<a href="#">'. $fet2['item'].'</a>'.'</p>'.
                          '<div class="unit_div">Unit Price: '.'<p class="unit_price">'.'Php '.$fet2['price'].'</p>'.'</div>'.
                          '<div class="range_div"> Price Range: '.'<p class="range_price">'.'Php '.$fet2['price2'].'</p>'.'</div>'.
                          '<div class="comp_div">Company: '.'<p class="prodComp"> '.$fet3['name'].'</p>'.'</div>'.
                      '</div>';
                // echo '<div class="prodList">'.'<p>'.'<a href="#">'. $fet2['item'].'</a>'.'</p>'.'<p>'.$fet2['price'].'-'.$fet2['price2'].'</p>'.'<p class="prodComp">'.$fet3['name'].'</p>'.'</div>';
                //   unset($_GET['bttn']);
                 
                }
              }
              else {
                echo ("<script>  alert ('no results found') </script>");
              }
              unset($_GET['bttn']);
         }
        ?>         
        </div>

    </div>
    <script>
      $(document).ready(function(){

          function back2Prod(item_){
            $('.second_column').empty()
               $.ajax({
                  url: "getProd.php",
                  type: "POST",
                  data:{
                    name:item_
                  },
                  async:false,
                  success: function(data){
                          //alert(v4.newdate);
                          if(data=='No results found'){
                            $('.second_column').append('<h1>LIST OF SUPPLIER<h1>')
                            alert(data)
                          }
                          else{
                            $('.second_column').html(data)
                          }
                        
                      },
                      error:function(){
                          alert ('An error occured');

                      }
 //promise                     
                }).then(function(){
                            //.log('finish')
                            $('.second_column').find('.prodList').each(function(index){
                            // let ind=$(this).index()
                            //alert(ind)
                              $(this).find('a').click(function(){
                                  // $prevItem=$('.prodList')
                                  $prevItem = this.innerText;
                                  $cname=$('.prodList .prodComp')[index].innerText;
                                  //console.log($cname)
                                  //console.log(this.innerText)
                                  //console.log(JSON.stringify($prevItem))
                                // $('.second_column').empty()
                                  $.ajax({
                                    url: "getComp.php",
                                    type: "POST",
                                    data:{
                                      name:$cname
                                    },
                                  
                                    success: function(data){
                                            //alert(v4.newdate);
                                          $('.second_column').html(data)
                                          //$('.second_column').html("<button id='back'>Go Back</button>")
                                          
                                        
                                        },
                                        error:function(){
                                            alert ('An error occured');

                                        }
//inner promise                                       
                                        }).then(function(){
                                                  $('#back').click(function(){
                                                  //console.log('clicked')
                                                  back2Prod($prevItem)
//end inner promise                                          
                                        })
                          })
                        })
          })
        })
          }
        //toggling buttons
            $('.items').find(".btn").each(function(index){
              
              //console.log(($btn_id))
              $(this).click(function(){
                //console.log(index)
                if(index==0){
                  $('#sgears').toggle()
                }
                else if(index==1){
                  $('#hsafetyeqp').toggle()
                }
                else if(index==2){
                  $('#others').toggle()
                }
                
              })
                
              
            })


        //item from buttons
            $('.items').find("a").each(function(index2){
              $(this).click(function(){
                //console.log(index2)
                $pList=$('.items').find("p");
                $cname2=$pList[index2].textContent
               //console.log($pList)
                   back2Prod($cname2)                
                  })                 
            })




            // $('.second_column').find('.prodList').each(function(index){
            //       //let ind=$(this).index()
            //       //alert(ind)
            //         $(this).find('a').click(function(){
              
              
            //           $prevItem = this.innerText;
            //           $cname=$('.prodList .prodComp')[index].innerText;
            //             //lert($cname)
            //             //alert($prevItem)
            //           // $('.second_column').empty()
                        
            //             $.ajax({
            //               url: "getComp.php",
            //               type: "POST",
            //               data:{
            //                 name:$cname
            //               },
            //               async: false,
            //               success: function(data){
            //                       //alert(v4.newdate);
            //                     $('.second_column').html(data)
            //                     //$('.second_column').html("<button id='back'>Go Back</button>")
                                
                              
            //                   },
            //                   error:function(){
            //                       alert ('An error occured');

            //                   }
            //                   })

            //                   $('#back').click(function(){
            //                     //console.log('clicked')
            //                     back2Prod($prevItem)
            //                   })
            //           })
            //         })

              $('#search').click(function(){

                s_item=$.trim($('#inp').val())
                if(s_item==''){
                  alert('Invalid Input')
                }
                else{
                  back2Prod(s_item)
                }
              })












                     
})
                
  


               


                
        
          
           

    </script>
</body>

</html>






