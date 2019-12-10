<?php
session_start();
//If user is not logged in, reroute them to the login page
if(!isset($_SESSION['username'])) {
    header('location: dreamerLogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Active Dreamers</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<form action="./dreamerMailConfirmation.php" method="post" name="dreamerMail" id="dreamerMail">
    <div class="container">
        <h3>E-Mail Dreamers</h3>
        <h5>This will send an email to all Dreamers marked active and their respective guardians.</h5>

        <div class="card-panel">

            <div class="row">
                <div class="input-field col s6">
                    <input id="subject" type="text" name="subject" class="validate">
                    <label for="subject">Subject</label>
                    <span class="err" id="err-subject">
                                Please enter a subject.
                            </span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="message" type="text" name="message" class="validate">
                    <label for="message">Message</label>
                    <span class="err" id="err-message">
                                Please enter your Message Body.
                            </span>
                </div>
            </div>

            <button class="btn waves-effect waves-light" type="submit" id="submit" name="action">Send E-mail
                <i class="material-icons right">send</i>
            </button>

        </div>
    </div>
</form>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="./scripts/dreamerMailing.js"></script>
</body>
</html>