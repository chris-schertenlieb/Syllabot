<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/23/2018
 * Time: 8:50 PM
 */

session_start();
    include_once('config.php');
    $course_name = $_SESSION['course_name'];
    $course_id = $_SESSION['course_id'];
    $student_id = $_SESSION['student_id'];


?>
<html>
<head>
<script src="https://lex-web-ui-3-codebuilddeploy-2fspgwd-webappbucket-843ttc40nyx8.s3.amazonaws.com/lex-web-ui-loader.min.js"></script>
<script>
  var loaderOpts = {
    baseUrl: 'https://lex-web-ui-3-codebuilddeploy-2fspgwd-webappbucket-843ttc40nyx8.s3.amazonaws.com/'
  };
  var loader = new ChatBotUiLoader.IframeLoader(loaderOpts);
  loader.load()
    .catch(function (error) { console.error(error); });
</script>
		<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="" class="logo">Syllabot</a>
					<nav id="nav">
						<a href="index.html">Home</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h1>Welcome to Syllabot</h1>
				<p>A Blackboard Hackathon 2018 Submission by Chris Schertenlieb and Norman Cunningham</p>
			</section>
            <section>
                <h3 style="margin: 25px; text-align: center;">Syllabot will load momentarily</h3>
            </section>
            <section style="margin: 30px;">
                <h4>Available Courses: </h4><p>BIO 120, CIS 400, WRT 350</p>
                <h4>Some things to try: </h4>
                <ul>
                    <li>I want to know when my course is</li>
                    <li>I want to know what time my course meets</li>
                    <li>Where is my class</li>
                    <li>What room does my class meet in</li>
                    <li>What building is my professors office in</li>
                    <li>Where is my professors office</li>
                </ul>
            </section>



</body>
</html>