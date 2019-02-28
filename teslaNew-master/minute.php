<?php
  include 'db_connect.php';

  function Validate($data)
  {
     $data= trim($data);
     $data = stripslashes($data);
     $data=htmlspecialchars($data);
     return $data;
  }
  $receipt1=Validate($_POST['member1']);
  $receipt2=Validate($_POST['member2']);

  if($receipt1 == $receipt2)
  {
    //echo "You have entered the same receipt number for both the entries!!! ";
    //exit(0);
    $error =  "You have entered the same receipt number for both the entries!!! ";
    header("Location:error.php?error=".$error."&link=minute.html");
  }

  $query1 = "SELECT receipt,usn FROM  register WHERE receipt='$receipt1'" ;
  $result1=mysqli_query($connection,$query1);
  $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
  $count1 = mysqli_num_rows($result1);

  $query2 ="SELECT receipt,usn FROM  register WHERE receipt='$receipt2'";
  $result2=mysqli_query($connection,$query2);
  $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
  $count2 = mysqli_num_rows($result2);


  if($count1 == 0 )
  {
    //echo "Invalid receipt numbers entered!!!";

    $error =  "Invalid receipt numbers entered!!!";
    header("Location:error.php?error=".$error."&link=minute.html");
  }
  if($count1 == 0 && $count2 == 0 )
  {
    //echo "Invalid receipt numbers entered!!!";

    $error =  "Invalid receipt numbers entered!!!";
    header("Location:error.php?error=".$error."&link=minute.html");
  }




  $query3 = "SELECT receipt1, receipt2 FROM minute WHERE receipt1='$receipt1' OR receipt2 = '$receipt2' OR  receipt1='$receipt2' OR receipt2='$receipt1'";
  $result3 = mysqli_query($connection,$query3);
  $row3 = mysqli_fetch_assoc($result3);
  $count3 = mysqli_num_rows($result3);


  if($count3 == 0  )
  {
    if($count1 == 1  || $count2==1 )
    {
      $usn1=$row1['usn'];
      echo $usn1;
      $usn2=$row2['usn'];
      echo $usn2;
      if($usn2 == 0 && $receipt2 == 0)
      {

        $query4 = "INSERT INTO minute(receipt1,usn1) VALUES('".$receipt1."','".$usn1."')";

        $result4 = mysqli_query($connection,$query4);
        echo $result4;
      }
      else
      {
        $query4 = "INSERT INTO minute(receipt1,receipt2,usn1,usn2) VALUES('".$receipt1."','".$receipt2."','".$usn1."','".$usn2."')";

        $result4 = mysqli_query($connection,$query4);
        echo $result4;
         header("location:event.php");
     }
    }
  }
  else
  {
    echo "You have already registered!!";
  }

?>
