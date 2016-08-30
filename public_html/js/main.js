

$( document ).ready( function() {
    g = window;
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.

    g.onYouTubeIframeAPIReady = function () {
        g.player = new YT.Player('player', {
            height: '1000',
            width: '100%',
            playerVars: { 'autoplay': 1, 'controls': 0, 'playlist': 'gVuw23C0MYo', 'loop': 1 },
            videoId: 'gVuw23C0MYo',
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    g.onPlayerReady = function(event) {
        event.target.playVideo();
        event.target.mute();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    g.done = false;
    g.onPlayerStateChange = function(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            //setTimeout(stopVideo, 6000);
            done = true;
        }
    }
    g.stopVideo = function () {
            player.stopVideo();
        }


    $('.fancybox-modal').fancybox({
        
        minWidth: 500,
        minHeight: 360
    });

    $('.fancybox-image-link').fancybox();
    $('.pol').click(function(){
        $.fancybox({
            href: '#politica',
            maxWidth: 450
        })
    })
} );
