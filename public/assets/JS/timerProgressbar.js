let score = document.getElementById('score');
score = parseInt(score.innerHTML);
let goodResponse = document.getElementById('goodResponse');
goodResponse = parseInt(score.innerHTML);
let response = document.getElementById('response');
response = parseInt(score.innerHTML);


let TotalSeconds = 60 - 3 * score;
if (TotalSeconds < 15) {
    TotalSeconds = 15;
}

function started(duration)
{
    let documentWidth = $(document).width();
    let start = Date.now();
    let intervalSetted = null;

    function timer()
    {
        let diff = duration - (((Date.now() - start) / 1000) | 0);
        let seconds = (diff % 60) | 0;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        $('#timer').html("00:" + seconds);
        let progresBarWidth = (seconds * documentWidth / TotalSeconds);

        $('#progress').css({
            width: progresBarWidth + 'px',
            transition: 'width, ease 1s'
        });

        if (diff <= 2) {
            let choices = document.getElementById('choices');
            choices.style.animation = 'shake 0.5s';
            choices.style.animationIterationCount = 'infinite';
        }
        if (diff <= 0) {
            window.setTimeout("location=('/defeat/defeat');", 500);
        }
    }
    timer();
    intervalSetted = setInterval(timer, 200);
}

started(TotalSeconds);

function checkQuestion() {
    diff = diff - 10;
}
