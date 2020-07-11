<?php

        $item=$discography[$j];
        echo("
                                 <div class=\"collapse music-drop-outer\" id=\"music" . $j . "\">
                                       <div class=\"music-drop container\">
                                         <div class='row'>
                                           <div class='col-md-6'>
                                                  <h2>" . $item[0] . "</h2>
                                                   <h3>" . $item[1] . "</h3><i>" . $item[9] . "<br></i>
                                                   <span class=\"badge badge-secondary\">" . $item[2] . "</span> <span class=\"badge badge-secondary\">" . $item[3] . "</span><br>" . $item[5] . "
                                                   <br><br>Available On:
        ");

    //availability links
    if(!empty($item[7][0])) {
        echo("<a href=\"" . $item[7][0] . " \" style=\"color: red\">Youtube</a> | ");
    }
    if(!empty($item[7][1])) {
        echo("<a href=\" " . $item[7][1] . " \" style=\"color: green\">Spotify</a> | ");
    }
    if(!empty($item[7][2])) {
        echo("<a href=\" " . $item[7][2] . " \"> Apple Music </a> | ");
    }
    if(!empty($item[7][3])) {
        echo("<a href=\" " . $item[7][3] . "\" style=\"color: black\"> Tidal</a>  ");
    }
    if(!empty($item[7][4])) {
        echo("<a href=\" " . $item[7][4] . "\">| Bandcamp</a>");
    }

    //Year
    echo("<br>" . $item[6]);
    echo("
                                            </div> <!---- end col-md-6---->
                                            <div class='col-md-6'>
                                            <div class='text-right'>
                                                            close <button type=\"button\" class=\"close\" aria-label=\"Close\" onClick='hideAllMusic();'>
                                                            <span aria-hidden=\"true\">&times;</span>
                                                            </button>
                                            </div>
                                                <div>
                                                " . $item[8] . "
                                                </div>
                                            </div>
                                            
                                         </div> <!----- end row ------>
                                      </div>  <!------ end music-drop ----->
                                 </div> 
    ");
?>