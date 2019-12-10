<?php
session_start();
//If user is not logged in, reroute them to the login page
if(!isset($_SESSION['username'])) {
    header('location: dreamerLogin.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/mailStyles.css">
</head>
<body>

<div class="preloader-background">
<div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
        <div class="circle-clipper left">
            <div class="circle"></div>
        </div><div class="gap-patch">
            <div class="circle"></div>
        </div><div class="circle-clipper right">
            <div class="circle"></div>
        </div>
    </div>
</div>
    <p id="loading" class="blinking">Loading</p>
</div>

<div class="container center">
    <div class="card panel simpadding">
    <h3>Email sent to the following Emails:</h3>
    <button type="button" class="waves-effect waves-light btn-large" id="showMail">Show/Hide Recipients</button>
    <?php
require ('/home/nightshi/connect.php');
$subject = $_POST['subject'];
$message = wordwrap($_POST['message'], 60);


if ($subject !="" && $message != "") {
    $sql = 'SELECT youth_email, parent_guardian_email FROM dreamers WHERE activity="active"';

    $result = mysqli_query($cnxn, $sql);
    // Create Array to add all the emails
    $mailArray = array();
    //Parse through received data from the query
    while ($row = mysqli_fetch_assoc($result)) {
        $email = $row['youth_email'];
        $parentemail = $row['parent_guardian_email'];
        mail($email, $subject, $message, "Cc: $parentemail");
        array_push($mailArray, $email,$parentemail);
    }

    $count = count($mailArray);
    echo "<h4>Total Sent: $count</h4>";

        $mailedPeople ="<p id='mail'>";
        foreach ($mailArray as $item) {
            if ($item=="") {
                $mailedPeople .= "<strong>No email provided</strong>";
            } else {
                $mailedPeople .= "$item";
            }
            $mailedPeople.= "\n";
        }
        $mailedPeople .= "</p>";
        echo nl2br($mailedPeople);

} else if ($message!= "") {
    echo "<h1>Go back and enter a body</h1>";
    echo "<br>";
    echo "<a href='dreamerMailing.php'>Go back to mail form</a>";
} else if ($subject!="") {
    echo "<h1>Go back and enter a message</h1>";
    echo "<br>";
    echo "<a href='dreamerMailing.php'>Go back to mail form</a>";
} else {
    echo "<h1>Go back and enter a message and a body</h1>";
    echo "<br>";
    echo "<a href='dreamerMailing.php'>Go back to mail form</a>";
}
?>

        <a href="logout.php"><button class="btn waves-light">logout</button></a>
    </div>

</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="scripts/mailConfirmation.js"></script>

</body>
</html>
