<?php
  class User
  {
    public function createUser($username,$contactno,$emailid,$address)
    {
      //Connecting to db
      include ('conn.php');
      $usersid = '';
      $sqlcount = 'select count(1)+1 usercount from USERS_DATA';
      $result = mysqli_query($dbhandle, $sqlcount);
      while($row1 = mysqli_fetch_array($result))
      {
        $usersid = $row1{'usercount'};
      }
      $sqlinsert = "insert into USERS_DATA (userid,username,contactno,emailid,address) values ('".$usersid."','".$username."','".$contactno."','".$emailid."','".$address."')";
      $result1 = mysqli_query($dbhandle, $sqlinsert);

      //Closing db connection 
      include('connclose.php');
      
      //Return the created userid
      return $usersid;
    }

    public function getUserDetails($userid)
    {
      //Connecting to db
      include ('conn.php');
      $userdata = '';
      $selectsql = "select username,contactno,emailid,address from USERS_DATA where userid = '".$usersid."'";
      $result = mysqli_query($dbhandle, $selectsql);
      while($row = mysqli_fetch_array($result))
      {
        $userdata = $row{'username'}."|".$row{'contactno'}."|".$row{'emailid'}."|".$row{'address'};
      }
      
      //Closing db connection
      include('connclose.php');
      
      //Return the user data
      return $userdata;
    }
  }
?>
