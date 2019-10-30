let TotalSeconds = 5;

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
   if (diff <= 0) {
            window.setTimeout("location=('/home/index');",3000);

    }

    timer();
    intervalSetted = setInterval(timer, 1000);
}


started(TotalSeconds);