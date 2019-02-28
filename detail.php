<?php
  include 'db_connect.php';

  function Validate($data)
  {
     $data= trim($data);
     $data = stripslashes($data);
     $data=htmlspecialchars($data);
     return $data;
  }

  $receipt = Validate($_POST['detail']);

  $query = "SELECT usn,firstName,lastName,receipt,usn,cname,email FROM register WHERE receipt = '$receipt'";
  $result = mysqli_query($connection,$query);
  $rows = mysqli_fetch_assoc($result);
  $count = mysqli_num_rows($result);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Tesla</title>
    <style media="screen">
      body{
        background-image: url("electricity.jpg");
      }
      .list-group-item{

        /* background-color:  #272e4f; */
      }
    </style>
  </head>
  <body>
    <div class="card container" style="width: fit-content;margin-top: 100px ">
      <div class="card-body" style="">
        <h5 class="card-title">Registered Events</h5>
        <?php
        if($count == 1)
        {
          echo "<p class='card-text'>".$rows['firstName']." ".$rows['lastName']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $rows['receipt'];
          echo "<br>";
          echo $rows['usn'];
          echo "<br>";
          echo $rows['cname'];
          echo "<br>";
          echo $rows['email'];
          echo "</p>";

    echo  "</div>";
    echo  "<ul class='list-group list-group-flush'>";

        $cook = "SELECT receipt1,receipt2 FROM cook WHERE receipt1='$receipt' OR receipt2='$receipt'";
        $result1 = mysqli_query($connection,$cook);
        $count1 = mysqli_num_rows($result1);

        $debate = "SELECT receipt1,receipt2 FROM debate WHERE receipt1='$receipt' OR receipt2='$receipt'";
        $result2 = mysqli_query($connection,$debate);
        $count2 = mysqli_num_rows($result2);

        $idea = "SELECT receipt1,receipt2 FROM idea WHERE receipt1='$receipt' OR receipt2='$receipt'";
        $result3 = mysqli_query($connection,$idea);
        $count3 = mysqli_num_rows($result3);

        $minute = "SELECT receipt1,receipt2 FROM minute WHERE receipt1='$receipt' OR receipt2='$receipt'";
        $result4 = mysqli_query($connection,$minute);
        $count4 = mysqli_num_rows($result4);

        $quiz = "SELECT receipt1,receipt2 FROM quiz WHERE receipt1='$receipt' OR receipt2='$receipt'";
        $result5 = mysqli_query($connection,$quiz);
        $count5 = mysqli_num_rows($result5);
          if($count1 == 1){
                echo "<li class='list-group-item'>Cooking</li>";
          }
           if($count2 == 1){
                 echo "<li class='list-group-item'>Debate</li>";
          }
           if($count3 == 1){
                 echo "<li class='list-group-item'>Idea</li>";
          }
           if($count4 == 1){
                 echo "<li class='list-group-item'>Minute to Win It</li>";
          }
           if($count5 == 1){
                 echo "<li class='list-group-item'>Quiz</li>";
          }
          if ($count1==0 && $count2==0 && $count3==0 && $count4==0 && $count5==0) {
            echo "You have not participated in any competitions";
          }
        }
        else
        {
          $error =  "You have entered an Invalid Receipt number!! ";
          header("Location:error.php?error=".$error."&link=check.php");
        }



    echo  "</ul>";
    echo  "<div class='card-body'>";
    ?>
        <a href="check.php" class="card-link">Back</a>
      </div>
    </div>
  </body>
</html>
