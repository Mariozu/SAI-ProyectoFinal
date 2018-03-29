function show5(){
    if (!document.layers&&!document.all&&!document.getElementById)
    return

     var Digital=new Date()
     var hours=Digital.getHours()
     var minutes=Digital.getMinutes()
     var seconds=Digital.getSeconds()



     if (minutes<=9)
     minutes="0"+minutes
     if (seconds<=9)
     seconds="0"+seconds
    //change font size here to your desire
    myclock="<font size='10' face='Arial' ><b>"+hours+":"+minutes+":"
     +seconds+"</b></font>";
    myclock2="<font size='4' face='Arial' ><b>"+hours+":"+minutes+":"
     +seconds+"</b></font>";
    myclock3 = hours+":"+minutes+":"+seconds;
    if (document.layers){
    document.layers.liveclock.document.write(myclock)
    document.layers.liveclock.document.close()
    }
    else if (document.all)
    liveclock.innerHTML=myclock
    else if (document.getElementById)
    document.getElementById("liveclock").innerHTML=myclock
    document.getElementById("liveclock2").innerHTML=myclock2
    document.getElementById("liveclock3").setAttribute('value',myclock3)
    setTimeout("show5()",1000)
     }
    window.onload=show5