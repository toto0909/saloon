//現在時刻
timerID=setInterval("clock()",500);
function clock(){
    document.getElementById("view_clock").innerHTML=getNow();
}

function getNow(){
    var now = new Date;
    var mon = now.getMonth()+1;
    var day = now.getDate();
    var hour = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    var you = now.getDay();
    var youbi = new Array("日","月","火","水","木","金","土");

    var time = mon+"月"+day+"日"+"("+youbi[you]+")"+hour+"時"+min+"分"+sec+"秒";
    return time;
}