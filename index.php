<?php
    require 'php/mail.php'; //returns two booleans, $contacted if message sent, $spam if message failed to pass validation
    require 'php/discography.php'; //returns content array $discography[]
    //FEATURED SECTION---------------------------------
    $featuredsectionshow = true;
    $featuredSectionSelection=2;
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
    <nav class="navbar sticky-top nav-sp row text-center" id="main-nav">
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
                    <h2><?php echo($discography[$featuredSectionSelection][0]); ?></h2>
                    <h3><?php echo($discography[$featuredSectionSelection][1]); ?></h3>
                    <a href="#" onclick="showOnlyMusic(<?php echo($featuredSectionSelection); ?>);">More Information</a>
                </div>
                <div class="col-lg-5 embed-responsive">
                    <?php echo(strstr($discography[$featuredSectionSelection][8], "<hr>", true)); ?>
                </div>
                <div class="col-lg-3 hidden-sm">
                    <?php echo("
            <img src=\" " . $discography[$featuredSectionSelection][4] . " \" class=\"img-fluid hvrbox-layer_bottom .d-sm-none .d-md-block \">
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
                            require 'php/music-drop.php';
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
        <h1 class="text-center">Featured Videos</h1>
        <div class="row text-center" id="videos">

            <div class="col-md-4">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" data-src='https://www.youtube.com/embed/lzsb5VrNPQA' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" id='iframe1' data-src="https://www.youtube.com/embed/NN5J6UyEKTc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" data-src="https://www.youtube.com/embed/GZvQSXFoDCQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div id="live" class="container">
        <h1>Live Sound</h1>
        <ul>
            <li>Sound Designer & FOH Mixer for the 93Q Christmas Spectacular, a live event in Destiny USA, Syracuse NY. Multiple bands
                perform for an audience and on live radio broadcast. Live sound and backline provided by Patterson Sound. <i>December 2016, 2017, 2018, 2019</i></li>
            <li>System Tech for various point-source and line source deployments with sub alignment and delays, typically using DBX DriveRack or BSS Soundweb.</li>
            <li>Experience with Dante (certified level 3), MADI, AES50, Ultranet, and other audio protocols.</li>
            <li>Engineer or Mixer for a variety of live events with crowd sizes 100-1400.</li>
            <li>Sound Designer, FOH Mixer, Mic Tech and A2 for a variety of theatrical productions at various theatres, from 85 seat
                venues
                through 1500 seat venues in Syracuse and NYC.
            </li>
            <li>Worked with several systems for venues of a variety of sizes that were also multitrack-recorded or live
                broadcast.
            </li>
        </ul>
        <div class="row center">
            <div class="col-sm-2">
                <img class="img-fluid" src="img/dante3seal.png">
            </div>
        </div>
        <h4>For System Rentals: </h4>
        <a href="#" data-toggle="modal" data-target="#gearModal"><strong>Patterson Sound Gear List</strong></a><br>
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
            <li>Led a project to design and deploy an Audio over IP solution to allow remote broadcasting while NYU shut down the building housing the WNYU radio station due to coronavirus.</li>
        </ul>
    </div>
    <!-------- END LIVE ----->

    </div> <!------- END BODY CONTENT ---->

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
                <p>Patterson Sound is capable of providing sound for all types of events needing sound reinforcement. Our systems can be configured to suit various venue sizes to cover up to 1000 people.
                    Through our partners, we can also provide basic backline for some events.</p>
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