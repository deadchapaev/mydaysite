<?php
    class Db {

    	private static $instance;
    	private $mysqli;
 
    	private function __construct(){
    	}

    	function __destruct() {
    		$this->mysqli->close();
        }
        
        private function __clone(){
        }
    
        public static function getInstance() {
            if (null === self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function getDbConnect() {
            
        	if (null === $this->mysqli) {                
        		$this->mysqli = new mysqli('localhost','root','','mmd');
            }
            
		    if ($this->mysqli->connect_error) {
    		    die('Ошибка подключения (' . $this->mysqli->connect_errno . ') '
            .   $this->mysqli->connect_error);
		    }

		    if (mysqli_connect_error()) {
    		    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            .   mysqli_connect_error());
		    }

		    return $this->mysqli;
	    }

	    function executeQuery($sql) {	
		


		}

    }
?>