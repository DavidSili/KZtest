var Timer;
var TotalSeconds;


function CreateTimer(TimerID, Time) {
    Timer = document.getElementById(TimerID);
    TotalSeconds = Time;
    
    UpdateTimer()
    window.setTimeout("Tick()", 1000);
}

function Tick() {
    if (TotalSeconds <= 0) {
        alert("Vreme je isteklo!")
        return;
    }

    TotalSeconds -= 1;
    UpdateTimer()
    window.setTimeout("Tick()", 1000);
}

function UpdateTimer() {
    var Seconds = TotalSeconds;
    
    var Minutes = Math.floor(Seconds / 60);
    Seconds -= Minutes * (60);


    var TimeStr = LeadingZero(Minutes) + ":" + LeadingZero(Seconds)

    Timer.innerHTML = "preostalo je još: " + TimeStr;
}

function LeadingZero(Time) {

    return (Time < 10) ? "0" + Time : + Time;

}
