let score = document.getElementById('score');
score = parseInt(score.innerHTML);
let goodResponse = document.getElementById('goodResponse');
goodResponse = parseInt(score.innerHTML);
let response = document.getElementById('response');
response = parseInt(score.innerHTML);

let wrongAnswer = 0;

let TotalSeconds = 60 - 5 * score;
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
        let diff = duration - (((Date.now() - start) / 1000) | 0) - wrongAnswer;
        let seconds = (diff % 60) | 0;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        let progresBarWidth = (seconds * documentWidth / TotalSeconds);

        $('#progress').css({
            width: progresBarWidth + 'px',
            transition: 'width, ease 1s'
        });


        if (diff <= 0) {
            window.setTimeout("location=('/home/index');",3000);
        }


        if (diff <= 5) {
            let choices = document.getElementById('choices');
            choices.style.animation = 'shake 0.5s';
            choices.style.animationIterationCount = 'infinite';
        }
    }
    let diff = timer;
    timer();
    intervalSetted = setInterval(timer, 200);
}

started(TotalSeconds);

function checkQuestion($id)
{
    wrongAnswer = wrongAnswer + 15;
    let grey = document.getElementById($id);
    grey.style.backgroundColor = 'black';
}

