<!-- Page to register with the details of the users -->
<!-- Front End part to be added including css and bootstrap-->
<html>
  <head>
    <title>Receipt and Participated Events</title>
  </head>
  <body>
      <form style="width:100%"  id="form" method="post" action="detail.php">
    <div>
      <label for="detail">Enter your Receipt No :</label>
      <input type="text" id="detail" name="detail" onkeyup="this.value=this.value.toUpperCase()" mandatory required  placeholder="Enter your Receipt No::">
    </div>

    <div>
      <button type="submit" style="float:right;">Submit</button>
    </div>
  </form>





</body>
</html>
