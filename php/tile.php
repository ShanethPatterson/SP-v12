<?php

        if((($i) % $numAcross) == 0) {
            echo("<div class=\"row\" id='row" . $rowNum . "'>");
            $rowterminated = false;
        }
        if(!isset($item[10])){
            $item[10]="";
        }
        echo("
                <div class=\"col-md-2 col-6 hidden_element\" onClick=\"showOnlyMusic($i,$rowNum);\">
                <div class='hoverbox' id='d" . $i . "'>
                <img src=\" " . $item[4] . " \" class=\"img img-responsive hoverbox-layer_bottom\">
                <div class='hoverbox-layer_top'>
                <div class='hovrrbox-text'>
                <h2>" . $item[0] . "</h2>
                <h4>" . strstr($item[1], " by", true) . "</h4>
            </div>
            </div>
            </div>
            <span class=\"badge\">" . $item[2] . "</span> <span class=\"badge\">" . $item[3] . "</span> <span class=\"badge\">" .  $item[10] . "</span>
            
            </div>
                ");


        ?>