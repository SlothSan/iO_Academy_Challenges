const container = document.querySelector('#container');
const move = document.querySelector('#move-item');
const timerElement = document.querySelector('#timer');

let lastKey = 0;
let seconds = 0.0;
let timerStart = false;

//Detect KeyPresses. 
document.onkeydown = (detectKey);

function detectKey(event) {
    let positionLeft = move.style.left;
    let currentKey = event.keyCode;
     event = event || window.event;
     if (currentKey == '37' && currentKey != lastKey) {

        // left arrow
        if(timerStart == false) {
            timer = setInterval(incrementSeconds, 50);
            timerStart = true;
        }
        if(parseInt(positionLeft) == 970) {
            console.log('You Made It Brah!');
            clearInterval(timer);
            return '';
        }
        move.style.left  = (parseInt(positionLeft) + 5) + 'px';
        return lastKey = currentKey;
     }
     else if (currentKey == '39' && currentKey != lastKey) {
        // right arrows
        if(timerStart == false) {
            timer = setInterval(incrementSeconds, 50);
            timerStart = true;
        }
        if(parseInt(positionLeft) == 970) {
            console.log('You Made It Brah!');
            clearInterval(timer);
            return '';
        }
        move.style.left  = (parseInt(positionLeft) + 5) + 'px';
        return lastKey = currentKey;
     }
 }


function incrementSeconds() {
    seconds += 0.05;
    timerElement.innerText = "Timer: " + seconds.toFixed(2) + 'S';
}






