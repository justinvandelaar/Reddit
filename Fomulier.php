<!DOCTYPE HTML> 
<html>
<head>
    <title>Create Post</title>
    <style>
        .error {color: #FF0000;}
    </style>
<link href="CSS/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <a href="Index.php">
    <img src="Images/vul.png">
    </a>
    </div>
    <div class="Container">
    <div class="Form">
            <div class="FormContent">
            <?php
                $authorErr = $TitleErr = $urlErr = $ConclusieErr = "";
                $author = $Title = $url = $Conclusie = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                   if (empty($_POST["author"])) {
                     $authorErr = "author is required";      
                   }else{
                       $author = $_POST["author"];
                   }
                   if (empty($_POST["Title"])) {
                     $TitleErr = "Title is required";
                   } else{
                       $Title = $_POST["Title"];
                   }
                  if (empty($_POST["url"])) {
                     $urlErr = "URL is required";
                   } else{
                       $url = $_POST["url"];
                  }
                   if (empty($_POST["Conclusie"])) {
                     $ConclusieErr = "Conclusie is required";
                   }else{
                       $Conclusie = $_POST["Conclusie"];
                   }
                }
                ?>
                <h1>Create a post</h1>
                <p><span class="error">* required field.</span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                   <label for="USERNAME">author: </label><input type="text" name="author" value="">
                   <span class="error">* <?php echo $authorErr;?></span>
                   <br><br>
                   <label for="TITLE">Title: </label><input type="text" name="Title" value="">
                   <span class="error">* <?php echo $TitleErr;?></span>
                   <br><br>
                   <label for="URL">URL: </label><input type="text" name="url" value="">
                   <span class="error">* <?php echo $urlErr;?></span>
                   <br><br>
                   <label for="Conclusie">Conclusie: </label><textarea name="Conclusie" rows="5" cols="40"></textarea>
                   <span class="error">* <?php echo $ConclusieErr;?></span>
                   <br><br>
                   <input type="submit" name="submit" value="Submit">
                </form>
                </div>
                <?php
                        //Create connection
                  $conn = mysqli_connect('localhost', 'root', 'usbw');
                  mysqli_select_db($conn, 'postit');
                     if (isset($_POST['submit'])){
                 // Required field names
                $required = array('author', 'Title', 'url', 'Conclusie');
                // Loop over field names, make sure each one exists and is not empty
                $error = false;
                foreach($required as $field) {
                  if (empty($_POST[$field])) {
                    $error = true;
                  }
                }
                if ($error) {
                  echo "All fields are required.";
                } else {
                $sql = "INSERT INTO post (author, Title, url, Conclusie)
                VALUES ('$author', '$Title', '$url', '$Conclusie')";
                    mysqli_query($conn, $sql);
            echo "Post succesfully added";
                }
                     }
                ?>
    </div>
    </div>
    </div>
</body>
</html>