<?php
    $i = 0;
    foreach($discography as $item) {
        //  Check type
        if(is_array($item)) {
            echo("
        <!----------- MODAL #" . $i . "------>
               <div class=\"modal fade\" id=\"" . $i . "Modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"" . $i . "ModalLabel\">
               <div class=\"modal-dialog modal-xl\" role=\"document\">
               <div class=\"modal-content\">
               <div class=\"modal-header\">
               <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span>
               </button>
               <h4 class=\"modal-title\" id=\"lightModalLabel\"> " . $item[0] . "</h4>
               </div>
               <div class=\"modal-body\">
               <div class=\"row\">
               <div class=\"col-md-7\">
               <h2>" . $item[0] . "</h2>
               <h3>" . $item[1] . "</h3><i>" . $item[9] . "<br></i>
               <span class=\"label label-primary\">" . $item[2] . "</span> <span class=\"label label-default\">" . $item[3] . "</span><br>" . $item[5] . "<br><br>Available on:
            ");
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
            echo("<br>" . $item[6] . "
        </div>
        <div class=\"col-md-5 hidden_element center\">
        <div class='cushion'></div>
            " . $item[8] . "
        </div>
    </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>


//Modal iframe reload on modal close
//RESETS ALL IFRAMES
    $(\"#" . $i . "Modal\").on('hidden.bs.modal', function (e) {
        var element;
//for multiple iframe projects, set iframe data-src to src
for(var i=0; element=document.getElementById('iframe'+i);i++){
    if(element){
        $(element).attr(\"data-src\", $(element).attr(\"src\"));
    }
}
        //RESET ALL IFRAMES
        $(\"#" . $i . "Modal iframe\").attr(\"src\", $(\"#" . $i . "Modal iframe\").attr(\"src\"));
for(var i=0; element=document.getElementById('iframe'+i);i++){
    if(element){
        $(element).attr(\"src\", $(element).attr(\"data-src\"));
    }
}        
 });
</script>            
");
            $i = $i + 1; //index through items!
        }//end if
    }//end foreach

?>