<!DOCTYPE html>
<html>
<head>
<title>Delete Data From Database Using CodeIgniter</title>
<!--=========== Importing Google fonts ===========-->
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url()?>css/delete.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
<div id="wrapper">
<h1>Delete Data From Database Using CodeIgniter</h1>
<div id="menu">
<p>Click On Menu</p>
<!--====== Displaying Fetched Names from Database in Links ========-->
<ol>
<?php foreach ($students as $student): ?>
<li><a href="<?php echo base_url() . "index.php/delete_ctrl/show_student_id/" . $student->student_id; ?>"><?php echo $student->student_name; ?></a>
</li><?php endforeach; ?>
</ol>
</div>
<div id="detail">
<!--====== Displaying Fetched Details from Database ========-->
<?php foreach ($single_student as $student): ?>
<p>Student Detail</p>
<?php echo $student->student_name; ?>
<?php echo $student->student_email; ?>
<?php echo $student->student_mobile; ?>
<?php echo $student->student_address; ?>
<!--====== Delete Button ========-->
<a href="<?php echo base_url() . "index.php/delete_ctrl/delete_student_id/" . $student->student_id; ?>">
<button>Delete</button></a>
<?php endforeach; ?>
</div>
</div>
</div>
</body>
</html>