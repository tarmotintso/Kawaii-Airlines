<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Kawaii Airlines</title>
    <link rel="stylesheet" href="assets/components/bootstrap-3.3.1/css/bootstrap.css">
    <script src="assets/js/jquery-2.1.3.js" type="text/javascript"></script>
    <script src="assets/js/myScript.js" type="text/javascript"></script>
    <?php require "system/db_controller.php"; ?>
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Kawaii Airlines</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="clickable"><a href="index.php">Home</a></li>
                <li class="clickable"><a href="booking.php">Booking</a></li>
                <li class="clickable"><a href="login.php">Logi sisse</a></li>
                <li class="clickable active"><a href="register.php">Register</a></li>
            </ul>
            <!--            <ul class="nav navbar-nav navbar-right">-->
            <!--                <li><a href="#">Default</a></li>-->
            <!--                <li><a href="#">Static top</a></li>-->
            <!--                <li class="active"><a href="#">Fixed top <span class="sr-only">(current)</span></a></li>-->
            <!--            </ul>-->
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<br>
<br>
<br>

<div class="container">
    <div class='row'>
        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Lennule registreerimine</legend>

                <!-- Select Basic -->
                <div class="control-group">
                    <label class="control-label" for="selectbasic">Valige lennu asukoht:</label>

                    <div class="controls">
                        <select id="selectbasic" name="selectbasic" class="input-large">
                            <option>Kawaii Land</option>
                            <option>Steam Land</option>
                            <option>Gabe Land</option>
                            <option>Alabaama</option>
                            <option>Tai</option>
                            <option>Kanaari Saared</option>
                            <option>Egiptus</option>
                        </select>
                    </div>
                </div>

                <!-- Select Multiple -->
                <div class="control-group">
                    <label class="control-label" for="koht_select">Valige koht/kohad</label>

                    <div class="controls">
                        <select id="koht_select" name="koht_select" class="input-xlarge" multiple="multiple">
                            <option>Option one</option>
                        </select>
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="control-group">
                    <label class="control-label" for="Confirm"></label>

                    <div class="controls">
                        <button id="Confirm" name="Confirm" class="btn btn-success">Kinnita</button>
                        <button id="Cancel" name="Cancel" class="btn btn-danger">Tühista</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <div class='col-md-4'></div>
    </div>
</div>

<br>
<br>
<!--<a href="javascript: history.back()">Back</a>-->
</body>
</html>