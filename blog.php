<?php

class Database {

	public $statement;
	private $db;

	function __construct($database, $username, $password){
		/*check to see if database connection exists, if not, instantiate.*/
		if (empty($this->db)){
			try{			
				$this->db = new PDO(
					"mysql:host=localhost;dbname=$database",
					$username, 
					$password
				);
			} catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}

			return $this->db; 
		}
	}
	
	public function query($query){
		$this->statement = $this->db->prepare($query);
		return $this->statement;
	}	
	
	public function execute(){
		return $this->statement->execute();
	}

}

class Blog {
	
	protected $db;

	function __construct(){
		$this->db = new Database("blog", "user", "password");	
	}	

	function allPosts(){
		$this->db->query('select * from posts');
		$this->db->execute();
		return $this->db->statement->fetchAll();
	}

	function singlePost($id){
		$this->db->query("select * from posts where id = $id");
		$this->db->execute();
		return $this->db->statement->fetch();
	}

}

?>
