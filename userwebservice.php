<?php
  header('Content-Type: application/json');
  $resultarray = array(); 
  require_once('User.php');
  $User = new User();

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    if(isset($_POST['func']))
    {
      if($_POST['func'] == "GET")
      {
        if(isset($_POST['userid']))
        {
          $userdata = $User->getUserDetails($_POST['userid']);
          if($userdata == '')
          {
            $resultarray['result'] = "Error";
            $resultarray['error'] = "User does not exist";
            $resultarray['username'] = '';
            $resultarray['contactno'] = '';
            $resultarray['emailid'] = '';
            $resultarray['address'] = '';
          }else
          {
            $resultarray['result'] = "Success";
            $resultarray['username'] = explode("|",$userdata)[0];
            $resultarray['contactno'] = explode("|",$userdata)[1];
            $resultarray['emailid'] = explode("|",$userdata)[2];
            $resultarray['address'] = explode("|",$userdata)[3];
          }
        }else
        {
           $resultarray['result'] = "Error";
           $resultarray['error'] = "User id required";
        }
      }
        
      if($_POST['func'] == "CREATE")
      {
        if(isset($_POST['username']) && isset($_POST['contactno']) && isset($_POST['emailid']) && isset($_POST['address']))
        {
          $userid = $User->createUser($_POST['username'],$_POST['contactno'],$_POST['emailid'],$_POST['address']);
          if($userid == '')
          {
            $resultarray['result'] = "Error";
            $resultarray['error'] = "Unable to Create User id";
            $resultarray['userid'] = '';
          }else
          {
            $resultarray['result'] = "Success";
            $resultarray['userid'] = $userid;
          }
        }else
        {
          $resultarray['result'] = "Error";
          $resultarray['error'] = "All the details are mandatory for creating new User";
        }
      }
    }else
    {
      $resultarray['result'] = "Error";
      $resultarray['error'] = "Functionality is Required";
    }
  }else
  {
    $resultarray['result'] = "Error";
    $resultarray['error'] = "Invalid Request Method";
  }

  echo json_encode($resultarray);
?>
