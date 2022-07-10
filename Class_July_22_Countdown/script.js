let countDownDate = new Date ("Oct 21, 2022 17:00:00").getTime();

let x = setInterval(function(){

    let now = new Date().getTime();
    let distance = countDownDate - now;

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60 )) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById("timer-days").innerHTML = days + " Days";
    document.getElementById("timer-hours").innerHTML = hours + " Hours";
    document.getElementById("timer-minutes").innerHTML = minutes + " Minutes";
    document.getElementById("timer-seconds").innerHTML = seconds + " Seconds";

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML = "Congrats We Made It !!!";
    }
}, 1000);