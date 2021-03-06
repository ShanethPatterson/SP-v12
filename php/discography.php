<?php
include 'projects/posted.php';
include 'projects/closetoher.php';
include 'projects/esteelauder.php';
include 'projects/bigeyes.php';
include 'projects/shadesofblue.php';
include 'projects/folklore.php';
include 'projects/history.php';
include 'projects/whenjanuarycomes.php';
$discography = [ //0: Title
        //1: Byline
        //2: Role
        //3: Genre
        //4: Image
        //5: Description
        //6: Year
        //7: Link Array (Youtube, Spotify, Apple Music, Tidal, Bandcamp)
        //8: Widgets
        //9: add. info for byline
        //TEMPLATE: ["Title","X Songs Format by <a href="">Artist</a>","Producer","Pop","img/albums/x.jpeg",
        //"description"
        //,"2019",["yt","sp","am","t","bc"],"widget code","nomintated for somethin"],
        $posted,
        $closetoher,
        $esteelauder,
        $bigeyes, //big eyes & rosy cheeks
        $shadesofblue, //Shades Of Blue
        $folklore, //Folklore
        $history, //History


        ["Low Overhead", "EP by Brett Altman", "Engineer & Mixer", "Acoustic Pop", "img/albums/lowoverhead.jpg", "Written and Performed by Brett Altman<br>
         Produced by Maxwell Henry<br>
         Additional guitars by Chris Patwell<br>
         <strong>Engineered and Mixed by Shane Patterson</strong><br>
         Mastered by Nicholas Ciavatta<br>
         Recorded at Transmitter Park Studios", "2020", ["https://youtu.be/E7boJeyoTB8", "https://open.spotify.com/album/6csVoUqzaYRUhilcqwZf5F", "https://geo.music.apple.com/us/album/low-overhead-ep-acoustic/1525898258?mt=1&app=music", "", ""], "<iframe src=\"https://embed.music.apple.com/us/album/low-overhead-ep-acoustic/1525898258?app=music&amp;itsct=music_box&amp;itscg=30200&amp;ls=1\" height=\"450px\" frameborder=\"0\" sandbox=\"allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation\" allow=\"autoplay *; encrypted-media *;\" style=\"width: 100%; max-width: 660px; overflow: hidden; border-radius: 10px; background: transparent;\"></iframe>", "Debuted on Pop Matters"], //Low Overhead
        ["5:17", "Single by Stephen Phillips", "Producer", "Pop", "img/albums/517.jpeg", "Written and Performed by Stephen Phillips<br>
         <strong>Produced and Mixed by Shane Patterson</strong><br>
         Mastered by Steve Brown<br>
         Guitar by David Millen<br>
         ", "2020", ["https://youtu.be/ou9j-HQ3fhI", "https://open.spotify.com/track/73exVKQtQulhdv5Pl6ZVP0?si=fl0hwOvGRGKyFP4uo_uR2w", "https://music.apple.com/us/album/5-17/1510980359?i=1510980361", "https://tidal.com/browse/track/139347649", ""], "<iframe data-src=\"https://www.youtube.com/embed/ou9j-HQ3fhI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", ""], //5:17
        ["Black Rose", "Single by NikoPease", "Mixer", "Rap", "img/albums/BlackRose.JPG", "Written and Performed by NikoPease<br>
        <strong>Engineered, Mixed, and Additional Production by Shane Patterson</strong>
        <br>Video by <a href='http://rabvisuals.com'>Robert Bryant</a><br>Additional Mixing: Steve Brown
        
", "2020", ["https://youtu.be/LwyCdrGJNtE", "https://open.spotify.com/track/3oQOAC9UhpuO1oteQ1hVnn?si=vV-4tPAWTrCZswmKXCrgEg", "https://music.apple.com/us/album/black-rose-single/1495314894", "https://tidal.com/browse/track/128189077", ""], "<iframe src=\"https://www.youtube.com/embed/LwyCdrGJNtE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", ""], //BlackRose
        ["Time For Me", "Single by Gary Carpentier", "Mastering Engineer", "Pop", "img/albums/timeforme.jpg", "Written and Performed by Gary Carpentier and Stephen Brown<br>Produced, Engineered and Mixed by Stephen Brown at <a href='http://subcat.net'>Subcat Recording Studios</a><br><Strong>Mastered by Shane Patterson</Strong>", "2020", ["https://youtu.be/FY8IFBBV_Pg", "https://open.spotify.com/track/4LtSOOUeHQwNdo3VzRy7Fa", "https://open.spotify.com/track/4LtSOOUeHQwNdo3VzRy7Fa", "", ""], "<iframe  src=\"https://www.youtube.com/embed/FY8IFBBV_Pg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", ""], //Time For Me
        ["She Is A Song", "10 Song Album by <a href=\"https://www.facebook.com/kylemichomusic/\">Kyle Micho</a>", "Mixer", "Folk Rock", "img/albums/SIAS.jpg", "Written
            and Performed By Kyle Micho<br>Drums by Nate Piazza<br>Engineered by Robert Schepis
            <br><strong>Mixed by Shane Patterson</strong><br>Mix Assistants: Jalen Edington and Hank Borders<br>Recorded at
            <A href=\"http://vpa.syr.edu/academics/setnor/undergraduate/sound-recording-technology/about/\">Belfer
                Recording Studio</A>", "2018", ["https://www.youtube.com/watch?v=j6acKLKqAQM&list=PLzd_e2XeUXQ2CYvwxBDv9Us-t5lByVJhc", "https://open.spotify.com/album/5C3M9AHCLVc842hMBmSkyq", "https://geo.itunes.apple.com/us/album/she-is-a-song/1433876784?mt=1&app=music", "https://tidal.com/album/93975923", "https://kylemicho.bandcamp.com/album/she-is-a-song"], "<b>Featured Track: \"I Guess\"</b><br><i>Track 6</i><br>
            <iframe data-src=\"https://www.youtube.com/embed/KWdFmOojxAM\" frameborder=\"0\"
                    allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\"
                    allowfullscreen></iframe>", ""], //SIAS
        ["Who Are You", "Album by Joel Ross", "Asst. Engineer", "Jazz", "img/albums/joelross.jpg", "Produced by Joel Ross and Walter Smith III<br>
        Composed by Joel Ross<br>
        Alto Saxophone by Immanuel Wilkins<br>
        Bass by Kanoa Mendenhall<br>
        Drums by Jeremy Dutton<br>
        Engineered by Jason Rostkowski<br>
        Mixed and Mastered by Dave Darlington<br>
        <strong>Assistant Engineer: Diego Rodoni, Jonathan Hill, Shane Patterson</strong><br><br>
        ", "2020", ["", "", "", "", ""], "<div style=\"position: relative; padding-bottom: 100%; height: 0; overflow: hidden; max-width: 100%;\"><iframe src=\"https://embed.tidal.com/tracks/152667488?layout=gridify\" frameborder=\"0\" allowfullscreen style=\"position: absolute; top: 0; left: 0; width: 100%; height: 1px; min-height: 100%; margin: 0 auto;\"></iframe></div>", "Released on Blue Note Records"],

        ["Still Into You", "Cover by Isa Bruder", "Producer", "Pop", "img/albums/StillIntoYou.jpeg", "Recorded by Isa Bruder<br><strong>Produced and Mixed by Shane Patterson</strong><br>Guitar by Kate Gallagher<br>Drums by Nate Piazza<br><br>Recorded in the basement of NYU Weinstien Residence Hall", "2018", ["https://youtu.be/mzIJ_2w1m3k", "", "", "", ""], "<iframe data-src=\"https://www.youtube.com/embed/mzIJ_2w1m3k\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", ""], //still into you
        ["Nineteen", "Single by Stephen Phillips", "Producer", "Pop", "img/albums/StephenPhillips_Nineteen.jpg", "Written and Performed by Stephen Phillips<br>
         <strong>Produced and Mixed by Shane Patterson</strong><br>
         Mastered by Steve Brown<br>
         Guitar by David Millen<br>", "2020", ["https://www.youtube.com/watch?v=ugtb7bDDqe0", "https://open.spotify.com/album/50GfWrycmZyJyMtBghTDGF?si=AeuuDBvjQECKoZ_veY21eA", "http://itunes.apple.com/album/id/1524767102", "", ""], "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ugtb7bDDqe0\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", "Debuted on 95X 95.7FM"],
        ["Churches And Graveyards", "5 Song EP by Churches And Graveyards", "Producer", "Rock", "img/albums/ChurchesAndGraveYards.jpeg", "<h3>Songs 2-6</h3><strong>Produced, Engineered and Mixed by Shane Patterson</strong><br>All songs written and performed by Churches and Graveyards<br>Mix Assistant: Wesley Yu<br>Recorded at <a href='http://subcat.net'>Subcat Studios</a> and <a href='http://hobinstudios.com'>Hobin Studios</a><hr>Song 1 produced and mixed at <a href='http://moresound315.com'> More Sound Recording Studios</a>.
", "2019", ["https://www.youtube.com/channel/UCQQXb7Iy7uWauBsmAOZSzMg", "https://open.spotify.com/album/1YOAINz6oSOuKlx1FQxHbw?si=UU5QSSv4QNqzPXMJDIRgXA", "https://music.apple.com/us/album/churches-and-graveyards-ep/1493953315", "", ""], "<iframe src=\"https://www.youtube.com/embed/1EpRu2d1_hY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", ""], //CAG
        ["Burlap Backwards", "2-Track Single by Renny and the Simones", "Engineer &amp; Mixer", "Rock", "img/albums/RATS.jpg", "Written
            and performed by Renny and The Simones<br><strong>Engineered and Mixed by Shane Patterson</strong><br>Recorded at
            <A href=\"http://hobinstudios.com\">Hobin Studios</A>", "2017", ["", "https://open.spotify.com/album/5C3M9AHCLVc842hMBmSkyq", "https://geo.itunes.apple.com/us/album/burlap-backwards-single/id1275825546?mt=1&app=music", "https://tidal.com/album/77975893", "https://rennyandthesimones.bandcamp.com/releases"], "<iframe style=\"border: 0; width: 400px; height: 208px;\"
                    src=\"https://bandcamp.com/EmbeddedPlayer/album=3313686972/size=large/bgcol=ffffff/linkcol=0687f5/artwork=small/transparent=true/\"
                    seamless><a href=\"http://rennyandthesimones.bandcamp.com/album/burlap-backwards\">Burlap Backwards by
                    Renny &amp; the Simones</a></iframe>", ""], //Burlap Backwards
        $whenjanuarycomes, //WJC
        ["Break It Down", "Live session by Brett Altman", "Mixer", "Live Trio", "img/albums/Altman.jpg", "Filmed
                by Ryan Canney at Riverbank Creative<br>Guitar and Vocals by Brett Altman<br>Keyboard by Max Perkins<br>Saxophone
                by Brian Seltzer<br><strong>Mixed by Shane Patterson</strong>", "2018", ["https://youtu.be/Js8Xn5c_3ps", "", "", "", ""], "<iframe data-src=\"https://www.youtube.com/embed/Js8Xn5c_3ps\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", ""], //Break It Down
        ["Home For The Holiday", "Single by Julia Goodwin", "Engineer", "Holiday", "img/albums/goodwin_holiday.jpg", "Performed by Julia Goodwin<br>Engineered and Mixed by Brett Hobin<br>Cello By Sean Penzo<br><strong>Cello Engineer: Shane Patterson</strong>", "2019", ["https://www.youtube.com/watch?v=06emElUxmi8", "https://open.spotify.com/album/2StzVJgFOdaJu1118REcOl", "https://music.apple.com/us/album/home-for-the-holiday-single/1484184563", "", ""], "<iframe data-src=\"https://www.youtube.com/embed/06emElUxmi8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", ""], //Holiday
        ["The Writer", "Single by Julia Grippe", "Producer", "Pop", "img/albums/Grippe.jpg", "Written
                    By Julia Grippe<br><strong>Production, Mixing and Additional Instrumentation: Shane Patterson</strong><br>Drums: Nate
                    Piazza<br>Guitar: David Millen<br>Viola: Kaylee Lammers<br>Cello: Sean Penzo<br>Mastered by Curtis
                    Plummer at <A href=\"https://www.dragonshipstudio.com/\">Dragon Ship Studios</A><br>Recorded at <A
                            href=\"http://hobinstudios.com\">Hobin Studios</A> and <A href=\"http://subcatstudios.com\">Subcat
                        Studios</A>", "2015", ["", "", "", "", ""], "<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\"
                        data-src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/281589213&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false\"></iframe>
           ", ""], //The Writer


        ["Black Ou Noir", "Radio Drama", "Composer", "Radio Drama", "img/albums/BlackOuNoir.png", "Produced by Kelly Drake for <a href='http://wnyu.org'>WNYU 89.1 FM</a><br>
WNYU Theatre In The Sound personnel:  Jake Sandakly, Madeleine Flieger, Nathan Vincenti, Lani Kording, Leo Kelly, Kate Shaw, and Brianna Paez-Dishman.<br>
Sound Design and Mixed by Kelly Drake<br>
<strong>Music Composed and Mixed by Shane Patterson</strong><br>
Drums by Ian Lange-McPherson<br>Trumpet by Sophie Manoloff<br>Tap Dancing by  Isadora Banyai<br><br><br>Radio Drama recorded at <a href='http://wnyu.org'>WNYU</a><br>Music Recorded at B2 Studios, Prague, Czech Republic", "2019", ["", "", "", "", ""], "<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" data-src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/586084536&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe>", ""], //Black Ou Noir
        ["Dichotomy", "Electroacoustic Composition", "Composer", "Electroacoustic", "img/albums/dichotomy.jpg", "Written by Shane Patterson
                    <br>Viola: Kaylee Lammers<br>Cello: Sean Penzo<br>Voice: <a
                            href=\"https://soundcloud.com/gracekrichbaum\">Grace Krichbaum</a><br>Recorded at <A
                            href=\"http://hobinstudios.com\">Hobin Studios</A> and <a href=\"http://subcatstudios.com\">Subcat
                        Studios</a>", "2016", ["", "", "", "", ""], "<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\"
                        data-src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/300651553&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false\"></iframe>
            ", "Won NYSSMA Award for outstanding Electronic Music Composition (2016)"], //Dichotomy
        ["Persevere & WTFAI", "Singles by Raynier", "Producer", "Rap", "img/albums/Raynier.jpg", "<strong>Explicit</strong><br><i>Written
                    and Performed By Raynier<br><strong>Beat Produced by Shane Patterson and David Millen
                    <br>Mixed by Shane Patterson</strong></i><br>Recorded at
                <A href=\"http://hobinstudios.com\">Hobin Studios</A>", "2018", ["", "https://open.spotify.com/track/5qGeGUxkd2uO9kd5Mb77XX", "https://geo.itunes.apple.com/us/album/persevere-single/1342842899?mt=1&app=music&itscg=30200&itsct=afftoolset_1", "https://tidal.com/track/84100477", ""], "<h3>\"Persevere\"</h3><iframe id='iframe0' width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\"
                        data-src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/388975521&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true\"></iframe>
          <br><h3>\"WTFAI\"</h3><iframe id='iframe1' width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\"
                        data-src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/388976298&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true\"></iframe>
           
          ", ""], //Persevere
        ["Nightingale", "Live Cover by Isa Bruder", "Producer", "Live Session", "img/albums/Bruder.jpeg", "\"Nightingale\"<br>
by Demi Lovato<br>
cover by Isa Bruder<br>
<br>
<strong>Produced by Shane Patterson</strong><br>
Asst. Produced by Kelly Drake<br>
Vocals: Isa Bruder<br>
<strong>Piano: Shane Patterson</strong><br>
Guitar: David Millen<br>
Drums: Nate Piazza<br>
Cello: Sean Penzo<br>
Violin: Bryanna DiGregorio<br>
Clarinet: Isabella Earle<br>
Flute: Karen Patterson<br>
Percussion: Stephen Phillips and Gabriel Lemmie<br>
Arranged by Shane Patterson and Sean Penzo<br>
Video by Robert Bryant<br>
<strong>Engineered and Mixed by Shane Patterson in Subcat Studios, Syracuse NY</strong><br><br>

\"Nightingale\" written by Demi Lovato, Anne Preven, Matt Rad, Felicia Barton", "2019", ["https://youtu.be/GZvQSXFoDCQ", "", "", "", ""], "<iframe data-src=\"https://www.youtube.com/embed/GZvQSXFoDCQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", ""], //Nightingale
        ["Sweet Potatoes", "Single by Eli and Tiny Dave", "Producer", "Rap", "img/albums/dichotomy.jpg", "Written and Performed by Eli and Tiny Dave.<br>Additional Vocals: Ryan \"Raynier\" Williams<br><strong>Produced and Engineered by Shane Patterson</strong>", "2017", ["", "", "", "", ""], "<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" data-src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/384746861&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe>", ""], //Sweet Potatoes
        ["Dicks Sporting Goods", "Commercial Voiceover", "Engineer", "Ad", "img/albums/Dicks.png", "<br>Recorded at
            <A href=\"http://subcat.net\">Subcat Studios</A><br><div style=\"position:relative;width:100%;padding-top:56.25%;padding-bottom:40px;\"><iframe style=\"position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;\" src=\"https://www.ispot.tv/share/d5Zs\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"\"></iframe></div>", "2018", ["", "", "", "", ""], "", ""], //Dicks

        ["Bloom", "Piano Solo", "Composer", "Piano Solo", "img/albums/bloom.jpg", "Composed and Performed by Shane Patterson<br>Recorded by Steve Brown at <a href=\"subcat.net\">Subcat
                        Studios</a>", "2016", ["", "", "", "", ""], "<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\"
                        data-src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/300372915&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false\"></iframe>
           ", ""], //Bloom
        ["The Collaterals EP", "Album by The Collaterals", "Engineer", "Classic Rock", "img/albums/Collaterals.jpg", "Written and performed by The
                    Collaterals<br><strong>Engineered and Mixed by Shane Patterson</strong>", "2016", ["", "https://open.spotify.com/track/6GzjHsGNH8tZpTHvKnTV0m", "https://geo.itunes.apple.com/us/album/wilting/id1136474183?i=1136474251&mt=1&app=music", "", ""], "<iframe width=\"100%\" height=\"150\" scrolling=\"no\" frameborder=\"no\"
                        data-src=\"https://www.reverbnation.com/widget_code/html_widget/artist_5125341?widget_id=55&pwc[song_ids]=25832933&context_type=song&pwc[size]=small\"
                        style=\"width:0px;min-width:100%;max-width:100%;\"></iframe>", ""], //The Collaterals
        ["Intuition", "Composition", "Composer", "Electronic", "img/albums/intuition.jpg", "Written
                    and Produced By Shane Patterson<br>Guitar: David Millen<br>Cello: Sean Penzo", "2015", ["", "", "", "", ""], "<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\"
                        data-src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/215093495&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false\"></iframe>
          ", "Won NYSSMA Award
                for outstanding Electronic Music Composition (2015)"] //Intuition
];