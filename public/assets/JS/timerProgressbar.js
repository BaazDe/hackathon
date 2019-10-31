let score = document.getElementById('score');
score = parseInt(score.innerHTML);


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


        if (diff <= 5) {
            let choices = document.getElementById('choices');
            choices.style.animation = 'shake 0.5s';
            choices.style.animationIterationCount = 'infinite';
        }

        if (diff <= 0) {
            window.setTimeout("location=('/defeat/defeat');", 500);
        }
        console.log(diff)
    }
    let diff = timer;
    timer();
    intervalSetted = setInterval(timer, 0);
}

started(TotalSeconds);

function checkQuestion($id)
{
    wrongAnswer = wrongAnswer + 10;
    let grey = document.getElementById($id);
    grey.style.backgroundColor = 'black';
}

