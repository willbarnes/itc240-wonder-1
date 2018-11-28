<?php include 'includes/config.php';?>      
<?php get_header()?> 
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
<p><a href="daily.php?day=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Saturday">Saturday</a></p>


           


<?php get_footer()?>
