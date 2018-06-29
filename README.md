# Syllabot
Blackboard Hackathon 2.0 project.

This repository is a student submission to the <a href="https://hackboard.devpost.com/">Blackboard Hackathon 2.0</a> by Chris Schertenlieb and Norman Cunningham, students of Grand Valley State University.

We were inspired to enter this competition by our love of Software Development, learning, and challenges. We were also heavily encouraged by our excellent Web Development professor, Szymon Machajewki. 

Our project is called "Syllabot" and seeks to sort out some of the tediousness of finding information through a syllabus. Syllabi can be long, wordy, and full of information. If a student needs to find a piece of information they have to download the syllabus each time and then sort through the bounty of information for what they need. This can be time consuming for students and for instructors who have to repeatedly answer the same questions. Syllabot uses the Blackboard REST API, AWS Lex, and AWS Lambda to solve this problem. 

Syllabot starts with an instructor, who accesses Syllabot through an LTI link in their course on Blackboard. Our apache server reads the session variables sent from Blackboard to confirm the user is an instructor before proceeding. We prompt the instructor for some basic information (Frequently Asked Questions) about their course. The instructor answers these questions and submits the form. The information is sent to an apache php server and saved to a mysql database. The instructors job is finished. 

A student with a question accesses a similar LTI link on the student side. Here they can chat with Syllabot through the <a href="https://github.com/aws-samples/aws-lex-web-ui">AWS Lex Web UI</a> to find information. Currently our AWS Lex is configured to solve 3 problems: "What time is my course?", "Where is my course?", and "Where is my professor's office?". These 3 Intents each access a respective AWS Lambda function that uses <a href="https://github.com/mysqljs/mysql">mysqljs</a> to access the aforementioned apache server, and select out the desired value that matches the supplied course name. The lambda function returns this value to Syllabot which prints this information out to the user. 

Syllabot can be tested by anyone by visiting: <a href="https://syllabot.hopto.org:9024/syllabot.php">https://syllabot.hopto.org:9024/syllabot.php</a><br>(In our experience, Syllabot seems to work best on Chrome and Safari)

In the future, we'd like to see Syllabot embedded into a Blackboard module rather than on a separate domain, and we'd like to use AWS Comprehend to parse through an uploaded syllabus to find answers to questions that haven't been pre-prepared by the professor. 

We believe that our Syllabot project submission is a powerful proof of concept for what is capable when AWS and Blackboard technology come together. 

Technologies Used: 
<ul>
<li><a href="https://developer.blackboard.com/">Blackboard</a></li>
<li><a href="https://aws.amazon.com/lex/">Amazon Lex</a></li>
<li><a href="https://aws.amazon.com/lambda/">Amazon Lambda</a></li>
<li><a href="https://github.com/mysqljs/mysql">mysqljs</a></li>
<li><a href="https://github.com/aws-samples/aws-lex-web-ui">AWS Lex Web UI</a></li>
<li><a href="https://templated.co/theory">Theory template by TEMPLATED</a></li>
