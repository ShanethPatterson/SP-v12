<?php
    require 'php/mail.php'; //returns two booleans, $contacted if message sent, $spam if message failed to pass validation
    require 'php/discography.php'; //returns content array $discography[]
    //FEATURED SECTION---------------------------------
    $featuredsectionshow = true;
    $featuredSectionSelection = 3;
    $numAcross = 6;
    if($_GET['view'] == "s") {
        $numAcross = 2;
    }
?>
<html>
<head>
    <script></script>
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
        <?php if($_GET['view'] == "s") {
            echo("<h3 class='loading-banner'>mobile version</h3>");
        }
            if($contacted) {
                echo("<h1 class="loading - banner">Your email has been sent!</h1>");
        }
            if($spam) {
                echo("<h1 class="loading - banner">There was a problem sending your email, please try again!</h1>");
        }
        ?>
    </div>
</div>
<body onload="bodyLoaded()" data-spy="scroll" data-target="#main-nav">

<!------Header------------->
<div class="jumbotron jumbotron-fluid" id="header">
    <div class="text-center">
        <img class="mx-auto d-block img-fluid" src="img/logos/SPlogo-logoOnly.png">
        <h1>Shane Patterson</h1>
    </div>
</div>

<div class="body-content" id="body-content">
    <!--------Navbar------>
    <nav class="d-none d-md-flex navbar sticky-top nav-sp row text-center" id="main-nav">
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
        <div class="jumbotron jumbotron-fluid d-none d-lg-block" id="featured-jumbotron">
            <div class="row">
                <div class="col-lg-4">
                    <h1>Featured Project:</h1>
                    <h2><?php echo($discography[$featuredSectionSelection][0]); ?></h2>
                    <h3><?php echo($discography[$featuredSectionSelection][1]); ?></h3>
                    <a href="#target"
                       onclick="showOnlyMusic(<?php echo($featuredSectionSelection . "," . floor($featuredSectionSelection / $numAcross)); ?>);">More
                        Information</a>
                </div>
                <div class="col-lg-5 embed-responsive">
                    <?php echo(strstr($discography[$featuredSectionSelection][8], "<hr>", true)); ?>
                </div>
                <div class="col-lg-3 hidden-sm">
                    <?php echo("
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
            foreach($discography as $item) {
                //  Check type
                if(is_array($item)) {
                    require 'php/tile.php';
                    //end of row
                    if((($i + 1) % $numAcross) == 0) {
                        echo("<div class='clearfix hidden-sm'></div>");
                            echo("</div>");//end row
                            $rowNum++;
                            $rowterminated = true;
                        for($j = $i - ($numAcross - 1); $j < ($i + 1); $j++) { //for last four!
                                require 'php/music-drop.php';
                            }
                        }
                    $i = $i + 1;
                }
            }
            if(!$rowterminated) { //error handling incomplete rows
                echo("</div>");
                $rowNum++;
                $rowterminated = true;
                for($j = (floor($i / $numAcross) * $numAcross); $j < ($i); $j++) { //for last row
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

            <div class="col-md-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" data-src='https://www.youtube.com/embed/lzsb5VrNPQA'
                            frameborder='0'
                            allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
                            allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" id='iframe1'
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
            <li>Sound Designer & FOH Mixer for the 93Q Christmas Spectacular, a live event in Destiny USA, Syracuse
                NY. Multiple bands
                perform for an audience and on live radio broadcast. Live sound and backline provided by Patterson
                Sound. <i>December 2016, 2017, 2018, 2019</i></li>
            <li>System Tech for various point-source and line source deployments with sub alignment and delays,
                typically using DBX DriveRack or BSS Soundweb.
            </li>
            <li>Experience with Dante (certified level 3), MADI, AES50, Ultranet, and other audio protocols.</li>
            <li>Engineer or Mixer for a variety of live events with crowd sizes 100-1400.</li>
            <li>Sound Designer, FOH Mixer, Mic Tech and A2 for a variety of theatrical productions at various
                theatres, from 85 seat
                venues
                through 1500 seat venues in Syracuse and NYC.
            </li>
            <li>Worked with several systems for venues of a variety of sizes that were also multitrack-recorded or
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
            <li>Led a project to design and deploy an Audio over IP solution to allow remote broadcasting while NYU
                shut down the building housing the WNYU radio station due to coronavirus.
            </li>
        </ul>
    </div>
    <!-------- END LIVE ----->
    <div class="lighting-outer">
        <div id="lighting" class="container">

            <!----------- LIGHTING ------>
            <h1>Lighting Design:</h1>


            <a href="#" data-toggle="modal" data-target="#lightModal">Click here for a list of credits</a>
            <hr>
            <div class="row gal">
                <div class="col-sm-4">
                    <img src="img/light/asu2.jpg" class="img img-fluid">
                </div>
                <div class="col-sm-4">
                    <img src="img/light/psc1.jpg" class="img img-fluid">
                </div>
                <div class="col-sm-4">
                    <img src="img/light/rh1.jpg" class="img img-fluid">
                </div>
            </div>
            <br>
            <a href="https://shanepatterson.pixieset.com/lightingdesign/">Click here to view full gallery</a>
        </div>
    </div>
    <!---------- ABOUT ------>
    <div class="container" id="about"><h1>About</h1>
        <p>My love of audio began early. When I was 12, I was lucky enough to observe tracking sessions in <a
                    href="http://hobinstudios.com">Todd Hobin's studio</a>, and before I was 14, the folks at the
            studio somehow trusted me behind the console recording projects for my friends. While in high school, I
            produced over a dozen projects for local artists, and after leaving for New
            York City to study Music Technology & Computer Science at NYU, I continued working on everything I
            could. By the time I turned 20, I had produced 3 SAMMY-Nominated Projects.
            The album I produced and co-wrote for Stephen Phillips, "big eyes & rosy cheeks", earned a "Best Pop
            Recording" and Stephen took home the Brian Bourke Award for Best New Artist.
            I've been incredibly lucky to meet amazing mentors and friends every step of the way as I balanced
            classes at NYU, gigs in two cities 230 miles apart, and studio internships.
            <br><br>Recently, in March 2020, I designed and implemented an audio-over-IP solution to allow WNYU89.1FM to
            broadcast remotely during the NYC COVID-19 closures. I faced a handful of challenges on that project
            including borrowing the AoIP hardware from Sirius XM, dealing with NYU’s strict firewall around their
            internal network, and avoiding the dreaded “dead air” while setting these systems up. And as of June 2020, I
            have taken over the technical department of a local theatre, The RedHouse Arts Center. I use lighting and
            sound design to help present stories on stage, and utilize multi-camera live streaming to present it to
            virtual audiences. My latest challenge and exciting venture, has been exploring Dolby ATMOS technology. I
            was recently hired to mix a documentary film, and dove into reading about ATMOS and its capabilities- and I
            hope to next explore it’s capabilities mixing music.
            <br>
            You can find me playing bass and engineering in both Syracuse and New York City for a myriad of
            artists across all genres
            <br><br>On the side, I design lighting for theatre. I've designed over 20 musicals, with a portfolio of
            high school, community, regional, and off-broadway shows.<br><br>

            I'm extremely project oriented; I prefer to start a project with an artists first demos, and finish when
            the masters are ready to go out to distribution. I believe that magical projects come from a dedicated
            team, and the moments I get to spend
            forming relationships with artists are the best part of what I do.</p>
        <p>Contact me via the form below if you have any questions, or have a project in any stage I can help you
            with.</p>
    </div>

    <div class="container " id="contact">
        <p>
            <br>
            <span class="badge badge-info ">Email</span> Contact@Shaneth.com
            <br>
            <span class="badge badge-info">Call/Text</span> 929.265.0073<br>
            <a href="http://shaneth.com">Learn More About Me at Shaneth.com</a>
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
                <div class="col-sm-6" id="submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-6">
                    <button type="reset" class="btn">Reset</button>
                </div>
            </div>
        </form>

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
                    <p>Patterson Sound is capable of providing sound for all types of events needing sound
                        reinforcement. Our systems can be configured to suit various venue sizes to cover up to 1000
                        people.
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
    <!----------LIGHTING CREDITS MODAL-------->
    <div class="modal fade" id="lightModal" tabindex="-1" role="dialog" aria-labelledby="lightModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="lightModalLabel">Lighting</h4>
                </div>
                <div class="modal-body">
                    <h4>Off-Broadway</h4>
                    <strong>Slingshot Theater Company: </strong> Tamra Wasserman Presents: This is Real, This is Me
                    <hr>
                    <h4>Regional</h4>

                    <strong>Baldwinsville Theatre Guild</strong>: Peter and The Starcatcher (<i>nominated for best
                        lighting
                        design by the SALT awards</i>)
                    <br>
                    <strong>The Redhouse Arts Center</strong>: Tick Tick Boom!, Peter And The Starcatcher,
                    Peter/Wendy,
                    Alice In Wonderland, Into The Woods
                    <br>
                    <strong>Syracuse Stage</strong>: Random Acts
                    <hr>
                    <h4>High School</h4>
                    <br><strong>Cicero North Syracuse High School</strong>: Legally Blonde, Little Shop Of Horrors,
                    The
                    Addams Family, Nunsense, All Shook Up, Play On, Curtains!, Oklahoma
                    <br>
                    <strong>Baldwinsville High School</strong>: Once Upon A Mattress, Princess Grace Of Knockerdown,
                    Little
                    Shop Of Horrors, Cafe Murder
                    <br>
                    <strong>Baldwinsville Musical Players at The Carrier Theatre: </strong> Seussical The Musical
                    <br>
                    <strong>Baldwsinville Musical Players at The Jordan Elbridge HS Theatre: </strong>: Irving
                    Berlin's
                    White Christmas
                    <br>


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


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="js/smooth-scroll.polyfills.min.js"></script>
    <script src="js/bootstrap-detect-breakpoint.js"></script>
    <script language="javascript">
        <?php if($_GET['view'] != "s") {
            echo("
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
            echo("
    if(bootstrapDetectBreakpoint().index>1){
    window.location.href=\"?\";
}
");
        }
        ?>

    </script>
    <script src="js/sp.js"></script>
    <script language="javascript">
        numMusic = (<?php echo(count($discography)); ?>);
        <?php
        if(isset($_GET['project'])) {
            echo("
                    setTimeout(function () {
                        showOnlyMusic(" . floor($_GET['project']) . "," . floor($_GET['project'] / $numAcross) . ")
                     }, 2500);
                     ");
        }
        ?>

    </script>


</body>
</html>