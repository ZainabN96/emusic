<script src="<?php echo $site_path; ?>assets/js/jquery.min.js"></script>
<script src="<?php echo $site_path; ?>assets/js/bootstrap.min.js"></script>
<script>
    $('.btnPlay').on('click', function (event) {
        var currentAudio = $(this).find('audio')[0];

        if (currentAudio.paused) {
            currentAudio.play();
            $(this).addClass("animate-audio");
            $(this).find('i').removeClass('fa-play').addClass('fa-pause');
        } else {
            currentAudio.pause();
            $(this).removeClass("animate-audio");
            $(this).find('i').removeClass('fa-pause').addClass('fa-play');
        }
    });
</script>
