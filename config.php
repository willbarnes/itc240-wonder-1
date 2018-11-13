<?php 
/*
    config.php
    
    Stores configuration data for our application
*/
ob_start(); //prevents header errors

define('DEBUG',TRUE); #we want to see all errors

include 'credentials.php'; //database credentials

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//echo 'the constant is storing: ' . THIS_PAGE;

//die;


/*below is an array of images to be used on contact.php in the function named randomize()

*/

$heros[] = '<img src="images/coulson.png" />';
$heros[] = '<img src="images/fury.png" />';
$heros[] = '<img src="images/hulk.png" />';
$heros[] = '<img src="images/thor.png" />';
$heros[] = '<img src="images/black-widow.png" />';
$heros[] = '<img src="images/captain-america.png" />';
$heros[] = '<img src="images/machine.png" />';
$heros[] = '<img src="images/iron-man.png" />';
$heros[] = '<img src="images/loki.png" />';
$heros[] = '<img src="images/giant.png" />';
$heros[] = '<img src="images/hawkeye.png" />';


//planets.php
//loads an array named $planets with images and text for daily rotation

$planets[] = '
<p><img src="images/mercury.gif" style="float:left; margin:0 10px 10px 0" />Mercury concerns communication and short-distance travel. Language, words, speech.</p>
<p>
Through the position of Mercury in your horoscope you can see the areas that will be of most interest to you and stimulate your mental energies.</p>
';

$planets[] = '
<p><img src="images/venus.gif" style="float:left; margin:0 10px 10px 0" />Venus is the planet of love, beauty, art, aesthetics, value, fairness, socializing and relationships.</p>
<p>
The planet Venus astrologically represents the desire to bring together things that compliment each other. There is a strong need to create harmony and balance in the environment and in relationships.</p>
';

$planets[] = '
<p><img src="images/mars.gif" style="float:left; margin:0 10px 10px 0" />Mars represents how we assert ourselves in the world. The warrior archetype. anger, sexuality, war, sports.</p>
</p>
<p>
Through the position of Mars in your horoscope you can see what best motivates someone to go after what they want in life. An understanding of this desire can help you to be the instinctive master of your life.
</p>
';

$planets[] = '
<p><img src="images/jupiter.gif" style="float:left; margin:0 10px 10px 0" />Jupiter is the planet of expansion. International travel. Faith belief, the religious impulse. Higher education. Law, philosophy, ethics.
</p>
<p>
The position of Jupiter in your horoscope chart describes how you grow and evolve in the relative area of your life. The house position of Jupiter represents your desire and your search for meaning in your life.
</p>
';

$planets[] = '
<p><img src="images/saturn.gif" style="float:left; margin:0 10px 10px 0" />Saturn is the planet of restriction. Boundaries, tests, limitations. Manifestation. Hard work, responsibility.
</p>

';

$planets[] = '
<p><img src="images/uranus.gif" style="float:left; margin:0 10px 10px 0" />Uranus is the planet of disruption, liberation, sudden changes. Revolution Technology.
</p>

';

$planets[] = '
<p><img src="images/neptune.gif" style="float:left; margin:0 10px 10px 0" />This is the planet of transcendence. Illusion, delusion, image, spirituality, mysticism.
</p>

';

$planets[] = '
<p><img src="images/pluto.gif" style="float:left; margin:0 10px 10px 0" />Pluto is the planet of death and rebirth. The underworld. Taboos. Eroticism and Shadow. Healing and regeneration.</p>
<p>

';




//default page values
$title = THIS_PAGE;
$pageHeader = 'Someone stole the pageHeader!';
$subHeader = 'Generic subHeader goes here.';
$sloganIcon = ''; //will be replaced in contact.php by hero icons
$headerIcon = ''; //will be replaced in contact.php by planet icons

switch(THIS_PAGE){
      
    case 'template.php';
            $title = 'My template page';
            $pageHeader = 'Put PageID here';
            $subHeader = 'Put more info about page here';
        break;
        
        case 'contact.php';
            $title = 'My contact page';
            $pageHeader = 'Please contact us!';
            $subHeader = 'Your feedback is appreciated.';
            $sloganIcon = randomize($heros);
            $headerIcon = rotate($planets);
        break;
        
         case 'index.php';
            $title = 'My index page';
        break;
    
        case 'daily.php';
            $title = 'My daily page';
            $pageHeader = 'Daily Specials';
            $subHeader = 'A special something for your day!';
            
        break;
    
        case 'db-test.php';
            $title = 'A database test page';
            $pageHeader = 'Database Test Page';
            $subHeader = 'Check here to see if db credentials are correct.';
            
        break;
        
}




        
        /**
 * returns a random item from an array sent to it.
 *
 * Uses count of array to determine highest legal random number.
 *
 * Used to show random HTML segments in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo randomize($arr); #will show one of three random images
 * </code>
 *
 * @param array array of HTML strings to display randomly
 * @return string HTML at random index of array
 * @see rotate() 
 * @todo none
 */
function randomize ($arr)
{//randomize function is called in the right sidebar - an example of random (on page reload)
	if(is_array($arr))
	{//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

/**
 * returns a daily item from an array sent to it.
 *
 * Uses count of array to determine highest legal rotated item.
 *
 * Uses day of month and modulus to rotate through daily items in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo rotate($arr); #will return a different image each day for three days
 * </code>
 * 
 * @param array array of HTML strings to display on a daily rotation
 * @return string HTML at specific index of array based on day of month
 * @see rotate() 
 * @todo none
 */
function rotate ($arr)
{//rotate function is called in the right sidebar - an example of rotation (on day of month)
	if(is_array($arr))
	{//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("j")) % count($arr)];
	}else{
		return $arr;
	}
}#end rotate


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}

        
       


        

