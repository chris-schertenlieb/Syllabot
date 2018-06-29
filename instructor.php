<?php
    session_start();
    include_once('config.php');
    $course_name = $_SESSION['course_name'];
    $course_time = null;
    $course_location = null;
    $course_gradescale = null;
    if (!isset($_GET['processed']) || $_GET['processed'] != 'true'){
	// Check DB to seeif row exists.
	$query = <<<SQL
	    SELECT *
	    FROM temp_table
	    WHERE course_id = '{$_SESSION['course_id']}'
SQL;
	$_GET['processed'] = 'false';
	global $db_connection;
	$result = mysqli_query($db_connection, $query);
	if (mysqli_num_rows($result)>0){
	    $row = mysqli_fetch_assoc($result);
	    $_GET['processed']    = 'true';
	    $_SESSION['time']     = $row['course_time'];
	    $_SESSION['location'] = $row['course_location'];
	    $_SESSION['office'] = $row['office'];
	}
    }
     
?>
<html>
	<head>
		<title>Syllabot</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="" class="logo">Syllabot</a>
					<nav id="nav">
						<a href="index.html">Home</a>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h1>Welcome to Syllabot</h1>
				<p>A Blackboard Hackathon 2018 Submission by Chris Schertenlieb and Norman Cunningham</p>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">

					<div class="flex flex-3" >
						<div style="margin: 20px auto;">
							<a href="#" class="button special"><span style="padding: 10px;"><?=($_GET['processed']=='true'?'Continue':'Get Started')?> with Syllabot for <?=$course_name;?></span></a>
						</div>

						<div style="width: 90%; margin: auto;">
							<form method="post" action="process.php">
								<div class="row uniform">
									<div class="6u 12u$" style="width: 90%; margin:auto;">
										<label>What time is this course?</label>
										<input type="text" name="time" id="time" value="<?= ($_GET['processed']=='true')?$_SESSION['time']:'';?>" placeholder="Mondays and Wednesdays from 11:00am to 11:50am" />
									</div>
                                    <div class="6u 12u$" style="width: 90%; margin:auto;">
                                        <label>Where is this course held?</label>
                                        <input type="text" name="location" id="location" value="<?= ($_GET['processed']=='true')?$_SESSION['location']:'';?>" placeholder="Machajewski Hall Room 2424" />
                                    </div>
                                    <div class="6u 12u$" style="width: 90%; margin:auto;">
                                        <label>Where is your office located?</label>
                                        <input type="text" name="office" id="office" value="<?= ($_GET['processed']=='true')?$_SESSION['office']:'';?>" placeholder="Machajewski Hall Room 2505" />
                                    </div>

									<!-- Break -->
									<div class="12u$" style="width: 90%; margin:auto;">
										<ul class="actions" >
											<li style="width: 100%;"><input type="submit" value="Submit Course Information" style="margin: auto;"/></li>
										</ul>
									</div>
								</div>
							</form>
							<form action="upload.php" method="post" enctype="multipart/form-data">
			    				Select syllabus to upload:
			    				<input type="file" name="fileToUpload" id="fileToUpload">
			    				<input type="submit" value="Upload Syllabus" name="submit">
							</form>
						</div>


					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="flex">
						<div class="copyright">
							&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
						</div>
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-twitter"><span class="label">Github</span></a></li>
						</ul>
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
