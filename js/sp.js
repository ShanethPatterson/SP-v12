function setNumMusic(inumMusic){
    numMusic=inumMusic
}
function hideAllMusic(){
    for(var i=0;i<numMusic;i++){
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
function showMusic(i){
    id = '#music'+i;
    $(id).collapse('show');
}
function loadiFrames(){
    //load iframes by replacing src with data-src
    $("iframe").each(function(index) {
        $(this).attr("src", $(this).attr("data-src"));
    });
}
function bodyLoaded(){
    loadiFrames();
}