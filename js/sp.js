document.getElementById("body-content").style.opacity = 0;
//$("#header").addClass("maxheight"); don't use this now
$(".nav-sp-link").addClass("background-black");
//loading textx

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

setTimeout(function () {
    (bodyLoaded())
}, 2000);