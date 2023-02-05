<!DOCTYPE html>
<html>

<body>
<?php
    $server='localhost'; // host name
    $username='root';   // database user name
    $password='';   // database password
    $dbName = 'assessment5'; // database name
    $db = mysqli_connect($server,$username,$password, $dbName) or die("Unable to connect to the database");

  // mysqli_query($db, "SELECT * from course");
  // echo $result;

  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST))
  {
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['psw-repeat']) && !empty($_POST['aadhar']) && !empty($_POST['dob']))
    {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $passcon = $_POST['psw-repeat'];      
      $aadhar = $_POST['aadhar'];
      $dob = $_POST['dob'];
      
      echo $name;

      function getAge($date)
      {        
        $dob = new DateTime($date);
        $now = new DateTime();         
        $difference = $now->diff($dob);         
        $age = $difference->y;         
        return  $age;
      }

      $age = getAge($dob);

      if($age<18)
      {
        die('You are under-age');
      }
      else{
        echo 'Age:' . $age;
      }
      
    }
  }
?>
</body>
</html>