<?php 
$servername = "localhost";
$username = "root";
$password = "";
// $dbname = "irlco_irlco";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
	//die("Connection failed: " . $conn->connect_error);
//}
// sql to create table
/*$sql = "CREATE TABLE irl_landing_page (
name VARCHAR(30),
company_name VARCHAR(30),
email_id VARCHAR(50),
contact_num VARCHAR(50),
product_select VARCHAR(50),
capacity VARCHAR(50),
comment VARCHAR(50)
)";*/

$name_field = $_POST['name'];
$email_field = $_POST['email_id']; 
$company_name = $_POST['company_name']; 
$contact_num = $_POST['contact_num']; 
// $produc_name = $_POST['product_select']; 
// $pro_capacity = $_POST['capacity']; 
$message = $_POST['comment']; 

//$sql = "INSERT INTO irl_landing_page ". "(name,company_name, email_id, contact_num, product_select, capacity, comment) ". "VALUES('$name_field','$company_name','$email_field','$contact_num','$produc_name','$pro_capacity','$message')";


// ini_set("include_path", '/home/irlco/php:' . ini_get("include_path") ); 

// Pear Mail Library
require_once "Mail.php";

$from = "IRL - testing from <swapnilshinde399@gmail.com>";
$to = 'swapnilshinde741@gmail.com';
//$to = $_POST['email_id'];
$bcc = 'swapnilshinde741@gmail.com';

// $produc_title = $_POST['product_select'];
// $subject = "test: " . $produc_title;
$subject = "test:";
$thak_subject = "Thank You for Your Enquiry";
	
$body = "<div style='width:100%;float:left;margin: 0 0 10px;'><div style='width:25%;float:left;'><strong>From :</strong></div><div style='width:75%;float:left;'> $name_field\n\n <br></div></div>
	<div style='width:100%;float:left;margin: 0 0 10px;'><div style='width:25%;float:left;'><strong>E-Mail :</strong></div><div style='width:75%;float:left;'> $email_field\n\n <br></div></div>
	<div style='width:100%;float:left;margin: 0 0 10px;'><div style='width:25%;float:left;'><strong>Company name :</strong></div><div style='width:75%;float:left;'> $company_name\n\n <br></div></div>
	<div style='width:100%;float:left;margin: 0 0 10px;'><div style='width:25%;float:left;'><strong>Contact Number :</strong></div><div style='width:75%;float:left;'> $contact_num\n\n <br></div></div>
	<div style='width:100%;float:left;margin: 0 0 10px;'><div style='width:25%;float:left;'><strong>Message :</strong></div><div style='width:75%;float:left;'> $message\n\n <br></div></div>
	<div style='width:100%;float:left;margin: 0 0 10px;'><div style='width:100%;float:left;'><br/><strong>Regards,</strong><br/>Industrial Refrigeration Pvt. Ltd.</div></div>";

	$t_to = $_POST['email_id'];
	$t_subject = 'Thank You for Your Enquiry';
	$t_body = '<center>
		<h2 style="font-size:17px;text-transform:uppercase;font-weight:500;">Thank You for showing your interest in Industrial Refrigeration Pvt Ltd.</h2><h4 style="font-size: 15px;line-height:35px;margin-bottom: 10px;">We have received your details and someone from our team will get back to you soon.<br>Meanwhile, stay in touch with us :</h4><div style="text-align:center;width: 35%;margin: 0 auto;">
			<p style="text-align:center;width: 10%;display: inline-block;"><a href="https://www.facebook.com/IndustrialRefrigeration.Pvt.Ltd" target="_blank">
				<img width="30px" src="http://ubb.in/IRL-landing-page/html/images/facebook-logo-1.png" /></a>
			</p>
			<p style="text-align:center;width: 10%;display: inline-block;"><a href="https://www.linkedin.com/company/industrial-refrigeration-pvt-ltd" target="_blank">
				<img width="30px" src="https://ubb.in/IRL-landing-page/html/images/linkedin-sign.png" /></a>
			</p>
		</div> 
		</center>';


$headers = array(
    'From' => $from,
	'MIME-Version' =>  '1.0',
	'Content-type' =>  'text/html',
    'To' => $to,
    'Subject' => $subject
);



$t_headers = array(
    'From' => $from,
	'MIME-Version' =>  '1.0',
	'Content-type' =>  'text/html',
    'To' => $t_to,
    'Subject' => $t_subject
);

$recipients = $to.", ".$bcc;

// $smtp = Mail::factory('smtp', array(
//         'host' => 'ssl://smtp.gmail.com',
//         'port' => '465',
//         'auth' => true,
//         'username' => 'digital@irl.co.in',
//         'password' => 'digital700'
//     ));

$mail = $smtp->send($recipients, $headers, $body);
$mail = $smtp->send($email_field, $t_headers, $t_body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
    echo "Not sent";
} else {
	header("Location: thankyou.html#enquire-now"); 
    echo('<p>Message successfully sent!</p>');
}
	
	// if (mysqli_query($conn, $sql)) {
	// 	echo "New record created successfully";
	// } else {
	// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	// }
	// mysqli_close($conn);
?>