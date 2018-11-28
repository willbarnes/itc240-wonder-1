<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>      
<?php get_header()?> 
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:movie_list.php');
}


$sql = "select * from FavoriteMovies where MovieID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $Title = stripslashes($row['Title']);
        $Director = stripslashes($row['Director']);
        $Writer = stripslashes($row['Writer']);
        $Description = stripslashes($row['Description']);
        $title = "Title Page for " . $Title;
        $pageHeader = $Title;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This movie does not exist</p>';
}

?>
<?php include 'header.php';?>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'Title: <b>' . $Title . '</b><br /> ';
    echo 'Director: <b>' . $Director . '</b><br /> ';
    echo 'Writer: <b>' . $Writer . '</b><br /> ';
    echo 'Description: <b>' . $Description . '</b><br /> ';
    
    echo '<img src="uploads/movie' . $id . '.jpg" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="movie_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>