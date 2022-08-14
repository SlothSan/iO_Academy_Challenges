const container = document.querySelector('#container');
const move = document.querySelector('#move-item');

//Gets the property Left from the move element. 
let positionLeft = window.getComputedStyle(move).getPropertyValue('left');

console.log(container);
console.log(move);
console.log(positionLeft)