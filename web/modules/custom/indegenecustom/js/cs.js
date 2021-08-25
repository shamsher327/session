function startTime() {
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clocktxt').innerHTML = "<span class='hours_span'>"+ h + "</span> : <span class='min_span'>" + m + "</span> : <span class='second_span'>" + s + '</span>';
    setTimeout(startTime, 1000);
  }

  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }

  startTime();

