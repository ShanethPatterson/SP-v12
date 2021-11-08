<?php
require 'php/mail.php'; //returns two booleans, $contacted if message sent, $spam if message failed to pass validation
require 'php/discography.php'; //returns content array $discography[]
//FEATURED SECTION---------------------------------
$featuredsectionshow = false;
$featuredSectionSelection = 8;
$numAcross = 6;
if ($_GET['view'] == "s") {
    $numAcross = 2;
}
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
<div class="cover" id="cover">
    <div class="text-center">
        <h1 class="loading-banner">Loading...</h1>
        <h3 class='loading-banner' id="loading-subtext"></h3>
        <?php if ($_GET['view'] == "s") {
            echo ("<h3 class='loading-banner'>mobile version</h3>");
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
            <img class="mx-auto d-block img-fluid" src="img/logos/SPlogo-logoOnly.png">
            <h1>Grab listeners attention.</h1>
            <h3>
                <p class="d-none d-lg-block">Capture your audience on the radio and in playlists with sound that stands
                    out and is uniquely
                    yours.</p>
                <a href="#contact"><button type=" primary" class="btn btn-success">Let's Talk</button></a>
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
                <a href="#live">Live Sound</a>
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


        <div id="live" class="container">


            <h1>Live Sound</h1>
            <ul>
                <li>Experience modelling and designing systems for theater, sports arenas, and churches with 3D
                    prediction software.</li>
                <li>Designer & FOH Mixer for the 93Q Christmas Spectacular, a live event in Destiny USA,
                    Syracuse
                    NY. Multiple bands
                    perform for an audience and on live radio broadcast. Live sound and backline provided by
                    Patterson
                    Sound. <i>December 2016, 2017, 2018, 2019</i></li>
                <li>System Tech for various point-source and line source deployments with sub alignment and
                    delays,
                    typically using DBX DriveRack, BSS Soundweb, RANE 1010X and others.
                </li>
                <li>Experience with Dante (certified level 3), MADI, AES50, Ultranet, and other audio protocols.
                </li>
                <li>Experience coordinating wireless audio in troublesome RF environements.</li>
                <li>Engineer or Mixer for a variety of live events with crowd sizes 100-1400.</li>
                <li>Sound Designer, FOH Mixer, Mic Tech and A2 for a variety of theatrical productions at
                    various
                    theatres, from 85 seat
                    venues
                    through 1500 seat venues in Syracuse and NYC.
                </li>
                <li>Worked with several systems for venues of a variety of sizes that were also
                    multitrack-recorded or
                    live
                    broadcast.
                </li>
            </ul>
            <div class="row center">
                <div class="col-xs-2" hei>
                    <img height="100px" src="img/dante3seal.png">
                </div>
            </div>

            <h4>For System Rentals: </h4>
            <a href="#" data-toggle="modal" data-target="#gearModal"><strong>Patterson Sound Gear
                    List</strong></a><br>
            <div class="row hidden_element gal">
                <div class="col-sm-4">
                    <img class="img img-responsive" src="img/live-1.jpeg">
                </div>
                <div class="col-sm-4">
                    <img class="img img-responsive" src="img/live-3.jpeg">
                </div>
                <div class="col-sm-4">
                    <img class="img img-responsive" src="img/live-2.jpeg">
                </div>
            </div>
            <h1>Broadcast Audio:</h1>
            <ul>
                <li>Engineer at WNYU 89.1FM</li>
                <li>Led a project to design and deploy an Audio over IP solution to allow remote broadcasting
                    while NYU
                    shut down the building housing the WNYU radio station due to coronavirus.
                </li>
                <li>Experience as A1 and A2 for small multicamera productions.
                </li>
            </ul>
        </div>

        <!-------- END LIVE ----->

        <div class="lighting-outer">
            <div class="container " id="contact">
                <h1>Let's Talk!</h1>
                <p>
                    <br>
                    <span class="badge badge-info ">Email</span> Contact@Shaneth.com
                    <br>
                <div class="row">

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
        </div>
        <!------- END BODY CONTENT ---->

        <!----- LIVE SOUND MODAL ---->
        <div class="modal fade" id="gearModal" tabindex="-1" role="dialog" aria-labelledby="gearModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="lightModalLabel"></h4>
                    </div>
                    <div class="modal-body index">
                        <p>Patterson Sound is capable of providing sound for all types of events needing
                            sound
                            reinforcement. Our systems can be configured to suit various venue sizes to
                            cover up
                            to 1000
                            people.
                            Through our partners, we can also provide basic backline for some events.
                        </p>
                        <h4>Soundcraft UI24r Wireless Mixer</h4>
                        <ul>
                            <li>2x ART S8 8-channel transformer isolated microphone splitter</li>
                            <li>4x 8-channel 8ft XLR drop snake</li>
                            <li>Shure P3T Wireless IEM Transmitter</li>
                            <li>2x Shure P3RA Wireless IEM Reciever</li>
                        </ul>
                        <h4>Speakers</h4>
                        <ul>
                            <li>2x JBL PRX425</li>
                            <li>2x JBL PRX415</li>
                            <li>2x JBL MRX518s</li>
                            <li>2x JBL JRX218</li>
                            <li>4x EAW SM129zi</li>
                            <li>2x JBL EON10</li>
                            <li>2x Custom wedge with JBL 15" and Fostex Horn</li>
                        </ul>
                        <h4>Amps</h4>
                        <ul>
                            <li>Crown XTi4000</li>
                            <li>Crown XLi3500</li>
                            <li>Crown XTi2002</li>
                            <li>Crown XLS2502</li>
                            <li>Crown CE2000</li>
                            <li>DBX Driverack 360</li>
                        </ul>
                        <h4>Microphones</h4>
                        <ul>
                            <li>Shure SM58 Beta Wireless PGX</li>
                            <li>Shure SM58 Beta Wireless BLX</li>
                            <li>Shure SM58 Beta</li>
                            <li>Shure SM58</li>
                            <li>5x Shure SM57</li>
                            <li>2x Rode NT1A</li>
                            <li>MXL990</li>
                            <li>Sennheiser e602</li>
                            <li>Radial ProD2 Stereo DI</li>
                            <li>Radial +48v DI</li>
                            <li>IMP Passive DI</li>
                        </ul>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

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
        <!----- <script language="javascript">
        <?php if ($_GET['view'] != "s") {
            echo ("
    if(bootstrapDetectBreakpoint().index<=1){
    window.location.href=\"?view=s\";
    }
    var scroll = new SmoothScroll('a[href*=\"#\"]', {
        header: '.nav-sp-link',
     clip: true,
     updateURL: true,
     speed: 500
    });
");
        } else {
            echo ("
    if(bootstrapDetectBreakpoint().index>1){
    window.location.href=\"?\";
}
");
        }
        ?>
        </script> ----->
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