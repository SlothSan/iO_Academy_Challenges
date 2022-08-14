const container = document.querySelector('#container');
const move = document.querySelector('#move-item');
let lastKey = 0;
//Gets the property Left from the move element. 

console.log(container);
console.log(move);

//Detect KeyPresses. 
document.onkeydown = detectKey;

function detectKey(event) {
    let positionLeft = move.style.left;
    let currentKey = event.keyCode;
     event = event || window.event;
     if (currentKey == '37' && currentKey != lastKey) {

        // left arrow
        if(parseInt(positionLeft) == 970) {
            console.log('You Made It Brah!');
            return '';
        }
        move.style.left  = (parseInt(positionLeft) + 5) + 'px';
        return lastKey = currentKey;
     }
     else if (currentKey == '39' && currentKey != lastKey) {
        // right arrows
        if(parseInt(positionLeft) == 970) {
            console.log('You Made It Brah!');
            return '';
        }
        move.style.left  = (parseInt(positionLeft) + 5) + 'px';
        return lastKey = currentKey;
     }
 }