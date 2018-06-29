<?PHP
//Start the session, important for passing data 
session_start();
// Needed for initialization of config file.
//include 'res/config.php';

$url = $_POST['launch_presentation_return_url'];
$query=parse_url($url,PHP_URL_QUERY);
parse_str($query, $out);
$course_id=$out['course_id'];
$course_title=$_POST['context_title'];
$course_batchUID=$_POST['context_label'];
$user_id=$_POST['user_id'];
$name=$_POST['lis_person_name_full'];


preg_match_all('/\//', $url,$matches, PREG_OFFSET_CAPTURE);
$clientURL = substr($url, 0, $matches[0][2][1]);
//$clientURL="http://bb.dataii.com:8080";
//$clientURL="https://54.84.232.218:8443";

require_once('classes/Rest.class.php');
require_once('classes/Token.class.php');

$rest = new Rest($clientURL);
$token = new Token();
$token = $rest->authorize();
$access_token = $token->access_token;

//Use's the uuid to read the current user data 
$user = $rest->readUser($access_token, 'uuid:'.$user_id);

//assign user id to the normal user id
$user_id  = $user->id;

//Reads the Membership of the current user
$membership = $rest->readMembership($access_token, $course_id, $user_id);

//Retrieves data about the course
$course = $rest->readCourse($access_token, $course_id);

//Store relevant rest data into session variables, so data can be used on other pages
$_SESSION['course_id']        = $course_id;
$_SESSION['course_name']      = $course->name;
$_SESSION['course_id_prefix'] = $course->courseId;
$_SESSION['me'] = 'hi';
/**********************************
* SECRET KEY 
**********************************/
$url_student = 'syllabot.php';
$url_instructor = 'instructor.php';
$url_login = 'http://bb.dataii.com:8080';

$_SESSION['secret_key'] = $secret_key;
if($membership->courseRoleId == "Student"){
	/********Insert student-version form here********/
	echo "<meta http-equiv='refresh' content='0;URL=$url_student' />";
	
} elseif ($membership->courseRoleId == "Instructor"){
	/********Insert instructor-version form here********/
	echo"<meta http-equiv='refresh' content='0;URL=$url_instructor' />";
	
} else {
	/********NOT GOOD If this gets accessed********/
	echo "NOT GOOD";
	//header('Location: '. $url_student);

}
?>
