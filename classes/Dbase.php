<?php
class Dbase{
    
    private static $db=null;
	
	/*public $_last_query=null;
	public $_affected_rows=0;

	public $_insert_keys=array();
	public $_insert_values=array();
	public $_update_sets=array(); 

	public $_id;
    */
    

	public function __construct(){
		

	}

    public static function getDb(){
    	$this->connect();
    	return $this->$db;
    }
	public function connect(){

		if($this->db==null){
			try
			{
				$this->db = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
				
			}
			catch (Exception $e)
			{
       			 die('Erreur connecxion: ' . $e->getMessage());
			}

		
		}

		
	}	

	public function close(){

	}
}
?>