<?php include 'config.php';?>  
<?php 

/*
 
 if day is passed via GET, show $day's coffee
 
 if it's today, show $today's coffee
  
  place a link to show today's coffee (if on another day)
*/


if(isset($_GET['day'])){
//if day is passed via GET, show $day's coffee  
    $today = $_GET['day'];
    
}else{
//if it's today, show $today's coffee   
    $today = date('l');   
}







//$today = date('l');

//echo $today;
//die;

?>
<?php include 'header.php';?>   


           
<p><?=$today?>'s Special: Fig Newtons!</p>

<p>Click below to find our other daily specials!</p>
<p><a href="daily.php?day=Sunday">Sunday</a></p>
           


<?php include 'footer.php'?>
