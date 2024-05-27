// resources/js/inactivity.js

let inactivityTime = function () {
    let time;
    const lockScreenURL = 'resources/views/lockscreen'; // Adjust to your lockscreen route
    const inactivityTimeLimit = 2000; // 10 minutes in milliseconds

    // Reset the timer on user interaction
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    document.onscroll = resetTimer;
    document.ontouchstart = resetTimer;

    function lockScreen() {
        window.location.href = lockScreenURL;
    }

    function resetTimer() {
        clearTimeout(time);
        time = setTimeout(lockScreen, inactivityTimeLimit);
    }
};

inactivityTime();
