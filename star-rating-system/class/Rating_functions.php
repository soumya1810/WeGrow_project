<?php
class Rating{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "wegrow";    
	private $shopUsersTable = 'users';
	private $shopTable = 'ip';	
    private $shopRatingTable = 'shop_rating';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	
	public function userLogin($user_username){
		
		$sqlQuery = "
			SELECT * 
			FROM ".$this->shopUsersTable." 
			WHERE user_username='".$user_username."'";
        return  $this->getData($sqlQuery);
	}		
	public function getshopList(){
		$sqlQuery = "
			SELECT * FROM ".$this->shopTable;
		return  $this->getData($sqlQuery);	
	}
	public function getshop($shopname){
		$sqlQuery = "
			SELECT * FROM ".$this->shopTable."
			WHERE shopname='".$shopname."'";
		return  $this->getData($sqlQuery);	
	}
	public function getshopRating($shopname){
		$sqlQuery = "
			SELECT r.rating_id, r.shopname, r.user_id, u.user_username,  r.ratingNumber, r.title, r.comments, r.created
			FROM ".$this->shopRatingTable." as r
			LEFT JOIN ".$this->shopUsersTable." as u ON (r.user_id = u.user_id)
			WHERE r.shopname = '".$shopname."'";
		return  $this->getData($sqlQuery);		
	}
	public function getRatingAverage($shopname){
		$shop_rating = $this->getshopRating($shopname);
		$ratingNumber = 0;
		$count = 0;		
		foreach($shop_rating as $shopRatingDetails){
			$ratingNumber+= $shopRatingDetails['ratingNumber'];
			$count += 1;			
		}
		$average = 0;
		if($ratingNumber && $count) {
			$average = $ratingNumber/$count;
		}
		return $average;	
	}
	public function saveRating($POST, $user_id){		
		$insertRating = "INSERT INTO ".$this->shopRatingTable." (shopname, user_id, ratingNumber, title, comments, created) VALUES ('".$POST['shopname']."', '".$user_id."', '".$POST['rating']."', '".$POST['title']."', '".$POST["comment"]."', '".date("Y-m-d H:i:s")."')";
		mysqli_query($this->dbConnect, $insertRating);	
	}
}
?>