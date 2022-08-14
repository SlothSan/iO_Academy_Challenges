const container = document.querySelector('#container');
const move = document.querySelector('#move-item');

//Gets the property Left from the move element. 

console.log(container);
console.log(move);

//Detect KeyPresses. 
document.onkeydown = detectKey;

function detectKey(event) {
    let positionLeft = move.style.left;
     event = event || window.event;
     if (event.keyCode == '37') {
        // left arrow
        move.style.left  = (parseInt(positionLeft) + 5) + 'px';
        console.log(parseInt(positionLeft));
     }
     else if (event.keyCode == '39') {
        // right arrows
        move.style.left  = (parseInt(positionLeft) + 5) + 'px';
        console.log(parseInt(positionLeft));
     }
 }