document.getElementById("body-content").style.opacity = 0;
//$("#header").addClass("maxheight"); don't use this now
$(".nav-sp-link").addClass("background-black");
//loading textx
var bodyLoadStatus = false;
var loadingtexts = ['Launching Pro Tools...', 'Tuning guitars...', 'Waking up the bass player...', 'Getting the singer "a glass of slightly below room temperture water"...', 'Turning down the guitar amp...', 'Wondering where the guitarist went...', 'Grabbing another slice of pizza...', 'Trying to find the buzzing cable...', 'Using a SM57 as a hammer...', 'Converting 96KHz WAV to 96kbps MP3...', 'Forgetting about phase...', 'Complaining about the line arrays...', 'Waiting for the keyboard player to "find the right sound"...', 'Changing the wrong EQ...', 'Giving the "drummer more of everything except the lead guitar" in their mix...', 'Turning it off and back on again...', 'What key are we in?','Tuning the piano...','Trying to get the B3 to spin up...','Sending everything to the reverb...','Replacing the C800G with a SM7B...','Spilling coke on the 1073...','Using the console to warm up pop tarts...']
function loadingText(){
    if (!bodyLoadStatus) {
    var newloadtext=loadingtexts[Math.floor(Math.random() * loadingtexts.length)];
        document.getElementById('loading-subtext').innerHTML = newloadtext;
        setTimeout(loadingText, 2000);
    }
}
loadingText();
//set up page
function setNumMusic(inumMusic){
    numMusic=inumMusic
}
function hideAllMusic(){
    for (var i = 0; i < numMusic; i++) {
        id='#music'+i;
        $(id).collapse('hide');
        //reset iframes to stop playback of hidden dropdowns
        loadiFrames();
    }

}
function showOnlyMusic(mID){
    hideAllMusic();
    id = '#music'+mID;
    $(id).collapse('show');
}

function showOnlyMusic(mID, rowNum) {
    hideAllMusic();
    id = '#music' + mID;
    $(id).collapse('show');
    $(id + " iframe").each(function (index) {
        $(this).attr("src", $(this).attr("data-src"));
    });
    setTimeout(() => {
        scroll.animateScroll(document.querySelector("#row" + rowNum), {speed: 1000})
    }, 500);
}
function showMusic(i){
    id = '#music'+i;
    $(id).collapse('show');
}
function loadiFrames(){
    //load iframes by replacing src with data-src
    /*$("iframe").each(function(index) {
        $(this).attr("src", $(this).attr("data-src"));
    });*/
    $("iframe").each(function (index) {
        $(this).attr("src", "img/loading.gif");
    });
    $("#featured-jumbotron iframe").each(function (index) {
        $(this).attr("src", $(this).attr("data-src"));
    });
    $("#video-jumbotron iframe").each(function (index) {
        $(this).attr("src", $(this).attr("data-src"));
    });
    $("#contact iframe").each(function (index) {
        $(this).attr("src", $(this).attr("data-src"));
    });
    grecaptcha.reset();
}

function bodyLoaded() {
    bodyLoadStatus = true;
    $("iframe").each(function (index) {
        $(this).attr("data-src", $(this).attr("src"));
    });
    $("#contact iframe").each(function (index) {
        $(this).attr("data-src", $(this).attr("src"));
    });
    
    setTimeout($(".cover").fadeOut(500), 500);
    setTimeout(function () {
        (document.getElementById("body-content").style.opacity = 1)
    }, 800);
    /*setTimeout(function () {
        $("#header").removeClass("maxheight")
    }, 1500);*/
    setTimeout(function () {
        $("#header").addClass("header-setheight")
    }, 1200);
    setTimeout(function () {
        $(".nav-sp-link").removeClass("background-black")
        loadiFrames();
    }, 2000);
    grecaptcha.reset();
}
