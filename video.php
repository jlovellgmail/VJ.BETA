<div id='media-player'>
	<video id='media-video' controls>
		<source src='parrots.mp4' type='video/mp4'>
		<source src='parrots.webm' type='video/webm'>
	</video>
	<div id='media-controls'>
		<button id='play-pause-button' class='play' title='play' onclick='togglePlayPause();'>Play</button>
		<button id='stop-button' class='stop' title='stop' onclick='stopPlayer();'>Stop</button>
		<button id='volume-inc-button' class='volume-plus' title='increase volume' onclick='changeVolume("+");'>Increase volume</button>
		<button id='volume-dec-button' class='volume-minus' title='decrease volume' onclick='changeVolume("-");'>Decrease volume</button>
		<button id='mute-button' class='mute' title='mute' onclick='toggleMute();'>Mute</button>
		<button id='replay-button' class='replay' title='replay' onclick='replayMedia();'>Replay</button>
	</div>
	<progress id='progress-bar' min='0' max='100' value='0'>0% played</progress>
</div>

<script>
    var mediaPlayer;

	$(document).ready(function(){
		initialiseMediaPlayer();
	}, false);

	function initialiseMediaPlayer() {
		mediaPlayer = document.getElementById('media-video');
		mediaPlayer.controls = false;
    }

    function togglePlayPause() {
    	var btn = document.getElementById('play-pause-button');
    	if (mediaPlayer.paused || mediaPlayer.ended) {
    		btn.title = 'pause';
    		btn.innerHTML = 'pause';
    		btn.className = 'pause';
    		mediaPlayer.play();
    	}
    	else {
    		btn.title = 'play';
    		btn.innerHTML = 'play';
    		btn.className = 'play';
    		mediaPlayer.pause();
    	}
    }

	function changeButtonType(btn, value) {
		btn.title = value;
		btn.innerHTML = value;
		btn.className = value;
	}

	function changeVolume(direction) {
		if (direction === '+') mediaPlayer.volume += mediaPlayer.volume == 1 ? 0 : 0.1;
		else mediaPlayer.volume -= (mediaPlayer.volume == 0 ? 0 : 0.1);
		mediaPlayer.volume = parseFloat(mediaPlayer.volume).toFixed(1);
	}

	function toggleMute() {
	var btn = document.getElementById('mute-button');
		if (mediaPlayer.muted) {
		changeButtonType(btn, 'mute');
		mediaPlayer.muted = false;
		} else {
			changeButtonType(btn, 'unmute');
			mediaPlayer.muted = true;
		}
	}

	function replayMedia() {
		resetPlayer();
		mediaPlayer.play();
	}

	function resetPlayer() {
		mediaPlayer.currentTime = 0;
		changeButtonType(playPauseBtn, 'play');
	}

	mediaPlayer.addEventListener('timeupdate', updateProgressBar, false);

	function updateProgressBar() {
		var progressBar = document.getElementById('progress-bar');
		var percentage = Math.floor((100 / mediaPlayer.duration) *
		mediaPlayer.currentTime);
		progressBar.value = percentage;
		progressBar.innerHTML = percentage + '% played';
	}

    function resetPlayer() {
       progressBar.value = 0;
       mediaPlayer.currentTime = 0;
       changeButtonType(playPauseBtn, 'play');
    }

    mediaPlayer.addEventListener('play', function() {
       var btn = document.getElementById('play-pause-button');
       changeButtonType(btn, 'pause');
    }, false);
    mediaPlayer.addEventListener('pause', function() {
       var btn = document.getElementById('play-pause-button');
       changeButtonType(btn, play);
    }, false);

    mediaPlayer.addEventListener('volumechange', function(e) {
       var btn = document.getElementById('mute-button');
       if (mediaPlayer.muted) changeButtonType(btn, 'unmute');
       else changeButtonType(btn, 'mute');
    }, false);

</script>

<div class="playerWrapperClass" style="display: none;">
	<ul>
		<li>
			<span class='play-item' onclick='loadVideo("grass.webm", "grass.mp4");'>Grass</span>
		</li>
	</ul>
</div>

<!-- Resume at Implementing Playlist -->



