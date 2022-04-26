<?php
require 'php/mail.php'; //returns two booleans, $contacted if message sent, $spam if message failed to pass validation
require 'php/discography.php'; //returns content array $discography[]
//FEATURED SECTION---------------------------------
$featuredsectionshow = false;
$featuredSectionSelection = 8;
$numAcross = 6;
if(isset($_GET['view'])){
if ($_GET['view'] == "s") {
    $numAcross = 2;
}
}
?>
<html>

<head>

    <!---Required tags----->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Shane Patterson is a GRAMMY Nominated Audio Engineer.">
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
<div class="cover" id="cover">
    <div class="text-center">
        <h1 class="loading-banner">Loading...</h1>
        <h3 class='loading-banner' id="loading-subtext"></h3>
        <?php 
        if(isset($_GET['view'])){
        if ($_GET['view'] == "s") {
            echo ("<h3 class='loading-banner'>mobile version</h3>");
        }
    }
        if ($contacted) {
            echo ("<h1 class=\"loading-banner\">Your email has been sent!</h1>");
        }
        if ($spam) {
            echo ("<h1 class='loading-banner'>There was a problem sending your email, please try again!</h1>");
        }
        ?>
    </div>
</div>
<script>
var bodyLoadStatus = false;
var loadingtexts = ['Restarting Pro Tools...', 'Tuning guitars...', 'Waking up the bass player...',
    'Getting the singer "a glass of slightly above room temperture water"...', 'Turning down the guitar amp...',
    'Wondering where the guitarist went...', 'Grabbing another slice of pizza...',
    'Trying to find the buzzing cable...', 'Using a SM57 as a hammer...',
    'Converting 96KHz WAV to 96kbps MP3...', 'Forgetting about phase...',
    'Complaining about the line arrays...', 'Waiting for the keyboard player to "find the right sound"...',
    'Changing the wrong EQ...',
    'Giving the "drummer more of everything except the lead guitar" in their mix...',
    'Turning it off and back on again...', 'What key are we in?', 'Tuning the piano...',
    'Trying to get the B3 to spin up...', 'Sending everything to the reverb...',
    'Replacing the C800G with a SM7B...', 'Spilling cola on the 1073...',
    'Using the console to warm up pop tarts...',
    'Tuning the drum kit...',
    'Finding the banana shaker...',
    'Clicking save as...',
    'Googling "what is impedance"...',
    'Looking for a drum key...',
    'Tuning the 12-string...',
    'Buying more headphone adapters...',
    '"Not using autotune"...',
    'Who is Dante?',
    'Importing 281 vocal tracks...',
    'Muting 4 of the 5 kick drums...',
    'Shopping for more gear...',
    'Checking the mix on phone speakers...',
    ''
]

function loadingText() {
    if (!bodyLoadStatus) {
        var newloadtext = loadingtexts[Math.floor(Math.random() * loadingtexts.length)];
        document.getElementById('loading-subtext').innerHTML = newloadtext;
        setTimeout(loadingText, 2000);
    }
}
loadingText();
</script>

<body onload="bodyLoaded()" data-spy="scroll" data-target="#main-nav">

    <!------Header------------->
    <div class="jumbotron jumbotron-fluid" id="header">
        <div class="text-center">
        <h4 class="d-none d-lg-block">Grammy Award Nominated</h4>
            <img class="mx-auto d-block img-fluid" src="img/logos/SPlogo-logoOnly.png">
            <h1>Shane Patterson</h1>
            <h3>
            <p class="d-none d-lg-block">Ensure your music stands out from the noise.</p>
                <a href="#contact"><button type=" primary" class="btn btn-primary">Let's Talk</button></a>
        </div>
    </div>

    <div class="body-content" id="body-content">
        <!--------Navbar------>
        <nav class="d-none d-md-flex navbar sticky-top nav-sp row text-center" id="main-nav">
            <div class="col-md-3 nav-sp-link">
                <a href="#music">Portfolio</a>
            </div>
            <div class="col-md-3 nav-sp-link">
                <a href="#videos">Videos</a>
            </div>
            <div class="col-md-3 nav-sp-link">
                <a href="#about">About</a>
            </div>

            <div class="col-md-3 nav-sp-link noborder">
                <a href="#contact">Contact</a>
            </div>
        </nav>
        <!-----End Navbar--->
        <!------Featured Section--->
        <?php if ($featuredsectionshow) : ?>
        <div class="jumbotron jumbotron-fluid d-none d-lg-block" id="featured-jumbotron">
            <div class="row">
                <div class="col-lg-4">
                    <h1>Featured Project:</h1>
                    <h2><?php echo ($discography[$featuredSectionSelection][0]); ?></h2>
                    <h3><?php echo ($discography[$featuredSectionSelection][1]); ?></h3>
                    <a href="#target"
                        onclick="showOnlyMusic(<?php echo ($featuredSectionSelection . "," . floor($featuredSectionSelection / $numAcross)); ?>);">More
                        Information</a>
                </div>
                <div class="col-lg-5 embed-responsive">
                    <?php echo (strstr($discography[$featuredSectionSelection][8], "<hr>", true)); ?>
                </div>
                <div class="col-lg-3 hidden-sm">
                    <?php echo ("
            <img src=\" " . $discography[$featuredSectionSelection][4] . " \" class=\"img-fluid hvrbox-layer_bottom d-sm-none d-md-block \">
            <span class=\"badge\">" . $discography[$featuredSectionSelection][2] . "</span> <span class=\"badge\">" . $discography[$featuredSectionSelection][3] . "</span>
            <span class='badge label-year'>" . $discography[$featuredSectionSelection][6] . "</span>
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
            $rowNum = 0;

            $rowterminated = false;
            foreach ($discography as $item) {
                //  Check type
                if (is_array($item)) {
                    require 'php/tile.php';
                    //end of row
                    if ((($i + 1) % $numAcross) == 0) {
                        echo ("<div class='clearfix hidden-sm'></div>");
                        echo ("</div>"); //end row
                        $rowNum++;
                        $rowterminated = true;
                        for ($j = $i - ($numAcross - 1); $j < ($i + 1); $j++) { //for last four!
                            require 'php/music-drop.php';
                        }
                    }
                    $i = $i + 1;
                }
            }
            if (!$rowterminated) { //error handling incomplete rows
                echo ("</div>");
                $rowNum++;
                $rowterminated = true;
                for ($j = (floor($i / $numAcross) * $numAcross); $j < ($i); $j++) { //for last row
                    require 'php/music-drop.php';
                }
            }
            ?>
        </div>
        <!----- End Album Art Grid ------>
        <!------ Videos ----->
        <div class="jumbotron jumbotron-fluid" id="video-jumbotron">
            <h1 class="text-center" id="videos">Featured Videos</h1>
            <div class="row text-center">

                <div class="col-md-3 ">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" data-src='https://www.youtube.com/embed/lzsb5VrNPQA'
                            frameborder='0'
                            allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" id=' iframe1'
                            data-src="https://www.youtube.com/embed/NN5J6UyEKTc" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" data-src="https://www.youtube.com/embed/GZvQSXFoDCQ"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" data-src="https://www.youtube.com/embed/vQZwiWZSvrY"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>


        <div id="about" class="container">


            <h1>We believe in everything we do.</h1>
            <p>There's nothing cookie cutter about the method either. Rather, we have analyzed why hundreds of mixes work and songs succeed and we'll tirelessly work on your music until it holds up to the highest regarded recordings. For this very reason, mixes are flat rate: there shouldn't be a financial barrier to getting it right.

Our process has been refined by a decade of mixing; it upholds a standard but it doesn't impose a style. The story, enviornment, artistry, and deeper meaning of every song drives every decision we make. The mix is just one piece of an interdependent puzzle that creates the magic of a captivating song.
          <br>We have spent years figuring out how to engineer excellence, and we can't wait to use it to help you.
            </p>
            <div class="row">
                <div class="col-md-4" style="padding-bottom: 50px;">
                            <img class="mx-auto d-block img-fluid" src="img/shane-stephen.JPG">
                            </div>
                            <div class="col-md-4">
                            <img class="mx-auto d-block img-fluid" src="img/occ.png">
                            </div>
                            
                            <div class="col-md-4">
                            <img class="mx-auto d-block img-fluid" src="img/shane-isa.jpg">
                            </div>


                 </div>
            <hr>
            <div class="row">
                <div class="col-lg-6">
            <h2>Simple, straightforward rates.</h2>
            <i>Unlimited revisions. No fee if we don't get it right.</i>
            <p></p>
                </div>
            <div class="h3 col-lg-6">
            How many songs are we mixing? <br> <input type="number" id="quantity" name="quantity" min="1" max="20" onClick="calcRate();" onkeyup="calcRate();">
            = <span id="estimaterate">$350</span> <i> estimated total </i><br><span id="discountrate" style="
margin-left: 90px;">$0</span> discount

        </div>
                        </div>
                        </div>

        <!-------- END LIVE ----->
<br>
        <div class="lighting-outer">
            <div class="container " id="contact">
                <h1>Let's Talk!</h1>
                <p>
                    <br>
                    <span class="badge badge-info ">Email</span> Contact@Shaneth.com
                    <br>


                <h2>Send an Email</h2>
                <form method="post" action="<?php $_PHP_SELF ?>">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="Name" id="name" placeholder="Name">
                            </div>
                            <div class="col">
                                <input type="text" name="Email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control bb" rows="3" name="message"></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6Lcjc5QUAAAAAK9ZEu9Ny1DNR1TXDKl38hLKR3vu"></div>
                    <div class="row">
                        <div class="col-sm-3" id="submit">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-9">
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>







            </div>
        </div>
        <!------- END BODY CONTENT ---->

       

        <!---------Javascript------>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>


        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="js/smooth-scroll.polyfills.min.js"></script>
        <script src="js/bootstrap-detect-breakpoint.js"></script>
        <script language="javascript">
        var scroll = new SmoothScroll('a[href*=\"#\"]', {
            header: '.nav-sp-link',
            clip: true,
            updateURL: true,
            speed: 500
        });
        function calcRate(){
            var rate = 350;
            var numOfMixes = document.getElementById("quantity").value;
            var discount = ((numOfMixes-1)*.25);
            if (discount>1){
               // discount=1;
            }
            var estiamte = (rate*numOfMixes)-(rate*discount);
            document.getElementById("estimaterate").innerHTML = "$"+ Math.floor(estiamte);
            document.getElementById("discountrate").innerHTML = "$"+ Math.floor(rate*discount);
        };
        </script>
        <script src="js/sp.js"></script>
        <script language="javascript">
        numMusic = (<?php echo (count($discography)); ?>);
        <?php
            if (isset($_GET['project'])) {
                echo ("
                    setTimeout(function () {
                        showOnlyMusic(" . floor($_GET['project']) . "," . floor($_GET['project'] / $numAcross) . ")
                     }, 2500);
                     ");
            }
            ?>
        </script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>


        <script src="https://apis.google.com/js/api.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
            integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
            crossorigin="anonymous">
        </script>


</body>

</html>