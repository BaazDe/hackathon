let TotalSeconds = 10;

function started(duration) {
    let documentWidth = $(document).width();
    let start = Date.now();
    let intervalSetted = null;

    function timer() {
        let diff = duration - (((Date.now() - start) / 1000) | 0);
        let seconds = (diff % 60) | 0;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        $('#timer').html("00:" + seconds);
        let progresBarWidth = (seconds * documentWidth / TotalSeconds);

        $('#progress').css({
            width: progresBarWidth + 'px',
            transition: 'width, ease 3s'
        });

        if (diff <= 5) {
            $('h1').animation = 'shake 0.5s';
            $('h1').animationIterationCount = 'infinite';
        }
        if (diff <= 0) {
            window.setTimeout("location=('/defeat/defeat');",3000);

    }

    timer();
    intervalSetted = setInterval(timer, 200);
}


started(TotalSeconds);