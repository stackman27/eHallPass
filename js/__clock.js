var currentTime = document.getElementById("currtime");
var currentDay = document.getElementById("currday");

function zeropadder(n) {
    return (parseInt(n, 10) < 10 ? '0' : '') + n;
}

function updateTime() {
    var timeNow = new Date();
    hh = timeNow.getHours(),
        mm = timeNow.getMinutes(),
        ss = timeNow.getSeconds(),
        formatAMPM = (hh >= 12 ? 'PM' : 'AM');
    hh = hh % 12 || 12;

    currentTime.innerHTML =  "<b>" + hh + "</b><span class='blink' style = 'font-family: Calibri ;'>:</span>" + zeropadder(mm) + " <span style= 'font-size: 44px;'> " + formatAMPM + "</span>";
    setTimeout(updateTime, 1000);
}

function getDay() {
    var mydate = new Date()
    var year = mydate.getYear()

    if (year < 1000)
        year += 1900

    var day = mydate.getDay()
    var month = mydate.getMonth()
    var daym = mydate.getDate()

    if (daym < 10)
        daym = "0" + daym

    var dayarray = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
        "Friday", "Saturday")
    var montharray = new Array("January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December")

    currentDay.innerHTML = dayarray[day] + ", " + montharray[month] + " " + daym + ", " + year;
}

updateTime();
getDay();