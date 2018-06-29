<?php
	class Constants {

		
	function __construct($clientURL)
        {
                $this->HOSTNAME=$clientURL;
        }

		public $HOSTNAME = "";
		public $KEY = '4f82aa82-f56d-4850-929d-273b006045b9';
		public $SECRET = 'sc5XPeuOOeeAMmTaGJODueoAFXFP89SE';

		public $AUTH_PATH = '/learn/api/public/v1/oauth2/token';
		public $DSK_PATH = '/learn/api/public/v1/dataSources';
		public $TERM_PATH = '/learn/api/public/v1/terms';
		public $COURSE_PATH = '/learn/api/public/v1/courses';
		public $USER_PATH = '/learn/api/public/v1/users';
		//public $ROLE_PATH = '';		

		public $ssl_verify_peer = FALSE;
		public $ssl_verify_host =  FALSE;
	}
?>

