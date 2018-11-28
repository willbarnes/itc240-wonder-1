<?php
//movie_list.php - shows a list of movie data
?>
<?php include 'includes/config.php';?>      
<?php get_header()?> 
<?php
$sql = "select * from FavoriteMovies";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Title: <b>' . $row['Title'] . '</b><br /> ';
        echo 'Director: <b>' . $row['Director'] . '</b><br /> ';
        echo 'Writer: <b>' . $row['Writer'] . '</b><br /> ';
        echo 'Description: <b>' . $row['Description'] . '</b><br /> ';
        
        echo '<a href="movie_view.php?id=' . $row['MovieID'] . '">' . $row['Title'] . '</a>';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>Time to watch more movies!</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>