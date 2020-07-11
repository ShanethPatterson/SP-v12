<?php
    require 'mail.php'; //returns two booleans, $contacted if message sent, $spam if message failed to pass validation
    require 'discography.php'; //returns content array $discography[]
    //FEATURED SECTION BOOLEAN---------------------------------
    $featuredsectionshow = true;
?>
<html>
<head>
    <!---Required tags----->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!----- / ------------->
    <!------Fav Icons------>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!------End Icons------>
    <!------Stylesheets---->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sp.css">
    <!----End Stylesheets-->
    <title>Shane Patterson</title>
</head>
<body onload="bodyLoaded()" data-spy="scroll" data-target="#main-nav">
<div class="body-content ">
    <!------Header------------->
    <div class="jumbotron jumbotron-fluid" id="header">
        <div class="text-center">
            <img class="mx-auto d-block" src="img/logos/SPlogo-logoOnly.png">
            <h1>Shane Patterson</h1>
        </div>
    </div>
    <!--------Navbar------>
    <nav class="navbar sticky-top row nav-sp text-center" id="main-nav">
        <div class="col-md-2 nav-sp-link">
            <a href="#music">Music</a>
        </div>
        <div class="col-md-2 nav-sp-link">
            <a href="#videos">Videos</a>
        </div>
        <div class="col-md-2 nav-sp-link">
            <a href="#live">Live Sound</a>
        </div>
        <div class="col-md-2 nav-sp-link">
            <a href="#lighting">Lighting Design</a>
        </div>
        <div class="col-md-2 nav-sp-link">
            <a href="#about">About</a>
        </div>
        <div class="col-md-2 nav-sp-link noborder">
            <a href="#contact">Contact</a>
        </div>
    </nav>
    <!-----End Navbar--->
    <!------Featured Section--->
    <?php if($featuredsectionshow): ?>
        <div class="jumbotron jumbotron-fluid" id="featured-jumbotron">
            <div class="row">
                <div class="col-lg-4">
                    <h1>Featured Project:</h1>
                    <h2><?php echo($discography[0][0]); ?></h2>
                    <h3><?php echo($discography[0][1]); ?></h3>
                    <a href="#" onclick="$('#0Modal').modal();">More Information</a>
                </div>
                <div class="col-lg-5 embed-responsive">
                    <?php echo(strstr($discography[0][8], "<hr>", true)); ?>
                </div>
                <div class="col-lg-3 hidden-sm">
                    <?php echo("
            <img src=\" " . $discography[0][4] . " \" class=\"img-fluid hvrbox-layer_bottom .d-sm-none .d-md-block \">
            <span class=\"badge\">" . $discography[0][2] . "</span> <span class=\"badge\">" . $discography[0][3] . "</span>
            <span class='badge label-year'>" . $discography[0][6] . "</span>
        "); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!----End Featured Section--->
    <!----Album Art Grid--------->
    <div class="music-grid" id="music">
        <?php
            $i = 0;
            $numAcross = 6;
            $rowterminated = false;
            foreach($discography as $item) {
                //  Check type
                if(is_array($item)) {
                    require 'php/tile.php';
                    //end of row
                    if((($i + 1) % $numAcross) == 0) {
                        echo("<div class='clearfix hidden-sm'></div>");
                        echo("</div>");//end row
                        $rowterminated = true;
                        for($j=$i-($numAcross-1);$j<$i+1;$j++) { //for last four!
                            require 'php/music.php';
                        }
                     }
                    $i = $i + 1;
                }
            }
            if(!$rowterminated) { //error handling
                echo("</div>");
            }
        ?>
    </div>
    <!----- End Album Art Grid ------>
    <!------ Videos ----->
    <div class="jumbotron jumbotron-fluid" id="video-jumbotron">
        <div class="row" id="videos">

        </div>
    </div>

</div>
<!---------Javascript------>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="js/sp.js"></script>
<script language="JavaScript">
setNumMusic(<?php echo(count($discography)); ?>);
</script>
</body>
</html>