<?php
require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	
	
	public function doLogin($uname,$upass)
	{
		echo $uname;		
		try
		{

			$stmt = $this->conn->prepare("SELECT roleid,username,password FROM mdl_user left join mdl_role_assignments on mdl_role_assignments.userid=mdl_user.id WHERE mdl_user.username=:uname");
			$stmt->execute(array(':uname'=>$uname));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() >= 1)
			{	
				if(password_verify($upass, $userRow['password']))
				{
					$_SESSION['username'] = $userRow['username'];
					
					if(substr($userRow['username'],3,1) =='m')
					{
						$_SESSION['role'] = 10;
					}
					else if(substr($userRow['username'],3,1) =='t')
					{
						$_SESSION['role'] = 3;
					}
					else 
					{
						$_SESSION['role'] = 5;	
					}
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['username']) && isset($_SESSION['role']) )
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['role']);
		return true;
	}
}
?>