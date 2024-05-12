<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BAKAL CHAT[gha binatna]</title>
  <link rel="stylesheet" href="style.css">
  <script>
    function aj(){
      var req = new XMLHttpRequest();
      req.onreadystatechange = function(){
          if(req.readyState == 4 && req.status == 200){
            document.getElementById('chat').innerHTML = req.responseText;
          }
      }
      req.open('GET', 'chat.php', true);
      req.send();
    }
    setInterval(function() { aj(); }, 1000);
  </script>
</head onload="aj()">
<body>
  <div id="container">
    <div id="chatbox">
      <div id="chat"></div>
    </div>
    <form action="index.php" method="post">
      <input type="text" name="name" placeholder="Enter your name here">
      <textarea name="message" placeholder="Enter your message here"></textarea>
      <input type="submit" name="submit" value="send">
    </form>
    <?php
      if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $message = htmlspecialchars($_POST['message']);

        $insert = "INSERT INTO bb (name, message) VALUES ('$name', '$message')";
        $run_insert = mysqli_query($con, $insert);
      }
    ?>
  </div>
</body>
</html>

<?php
  $query = "SELECT * FROM bb";
  $run = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($run)) {
    $name = $row['name'];
    $message = $row['message'];
    $date = $row['date'];
?>
    <div id="chatdata">
      <span style="color: gold;"><?php echo $name ?></span>
      <span>:</span>
      <span><?php echo $message ?></span>
      <span style="color: tomato;"><?php echo $date ?></span>
    </div>
<?php
  }
?>
