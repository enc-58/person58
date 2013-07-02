<?php
   class Database_manager{
   	 public $server;
	 public $username;
	 public $password;
	 public $DB;
	 public $db_name;
	
	 public $db_state;
	 
	 
	 
	 
	public function __construct(){
		 $this->server="localhost";
	   
		 $this->db_name="enc";
		 
		  define('READ_MODE', 100);
		  define('WRITE_MODE', 010);
		  define('ROOT', 111);
		  define('GOTO_ADD',' <a href="add.php">  К форме внесения данных</a>');
		 
		 $this->connect(READ_MODE);
		 
	}
	 
   	public function connect($connection_mode){
   		switch ($connection_mode) {
			   case ROOT:
				     $this->username="root";
	    			 $this->password="";
				   break;
			   case WRITE_MODE:
				      $this->username="editor";
	    			 $this->password="12345";
				   break;
			   case READ_MODE:
			   default:
				     $this->username="snitch";
	    			 $this->password="search";
				   break;
		   }
   		$myconn=new mysqli($this->server, $this->username, $this->password, $this->db_name);
		if ($myconn->errno)
		{
			$this->db_state="НЕ УДАЛОСЬ ПОДКЛЮЧИТЬСЯ:  ".$myconn->error;
		}
		else 
		{
			$myconn->set_charset("cp1251");
			$this->DB=$myconn;
			$this->db_state="Подключение установлено";
		}
		
   	}
	public function disconnect(){
		 $this->DB->close();
   	}
		
   public function add_record($array_rec) {
   	$Val="";
	
   	foreach ($array_rec as $key) {
   		
		   $Val.="'".$key."', ";
	   }
	$Val=substr($Val, 0, strlen($Val)-2);
	$name=explode(", ", $Val,1);
   	$sql_insert="INSERT INTO records (name,about,date,keywords,path) VALUES (".$Val.")";
	//echo $sql_insert;
	$this->disconnect();
	$this->connect(WRITE_MODE);
	$base=$this->DB;
	$query_result=$base->query($sql_insert);
	
		if ($query_result) {
			return "<h4> Статья \"".$array_rec['name']."\" добавлена</h4>".GOTO_ADD;
		} else {
			return mysqli_error($base).GOTO_ADD;	
		}
	$this->disconnect();
	$this->connect(READ_MODE);
   }	
   
   
    public function run_search_query($parameter)   {
	   $this->disconnect();
	   $this->connect(WRITE_MODE);
	  
	      $base=$this->DB;
		
		$parameter=$base->real_escape_string($parameter);
		$query_text = "SELECT * FROM records WHERE name LIKE '%".$parameter."%' OR keywords LIKE '%".$parameter."%'";
        $query_result=$base->query($query_text);
	   $res_count=$query_result->num_rows;
	   
	   $counter=0;
	   if ($res_count>0){
	   		echo "<ul>";
		   while ($row = $query_result->fetch_array(MYSQLI_BOTH)) {
			   echo("
			    <a href='#'>
			    <li>
					    <div>
					    	<div id='person'><a href='".$row["path"]."' target='_blank' >".$row[1]."</a></div>
							<div id='link'>Ключевые слова: ".$row["keywords"]."</div>
						</div>
							<div style='clear: both;'></div>
				</li>
				</a>
			   ");
			  $counter++;
			  if ($counter==5) {
				  break;
			  }
		   }
		   echo "</ul>";
		
	   }
	   else
	   	echo "<div id='no_result'>Нет результатов</div>";
   }
 }
?>
