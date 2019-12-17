var counter=1,ind=0,flag=1,b,lastval=0,turn=1,oppowon=0;
var url = window.location.href;
url=url.substring(url.lastIndexOf('/')+1);
url=url.split('.').slice(0, -1).join('.');
var stacke=[];
var mat=[];
var row=[0,0,0,0,0],col=[0,0,0,0,0],diag1=0,diag2=0,count=0;

function clicked(a){
    if(flag<=25){
        if(a.innerHTML==""){
            a.innerHTML=counter++;
            flag++;
            stacke[ind++]=a;
            b=parseInt(a.id);
            mat[a.id]=counter-1;
            //alert(parseInt(b/10));
            if(flag==26){
                document.getElementById('undo').style.innerHTML="";
                document.getElementById('undo').innerHTML="<button onclick=\"submitprocedure();\">submit</button>";
            }
        }
        if(flag<26)
        document.getElementById('undo').innerHTML="<button onclick=\"undoit();\">undo</button>";
    }
    else{
        if(a.innerHTML.length<3&&turn==1){
            a.innerHTML=a.innerHTML+"<span class=\"cross\"></span>";
            lastval=mat[a.id];
            strikecount(a);
            setnumber();
        }
        //alert(mat);
    }
}

function undoit(){
    stacke[ind-1].innerHTML="";
    counter--;
    ind--;
    flag--;
    stacke[ind]=null;
    if(ind==0){
        document.getElementById('undo').innerHTML="";
    }
}

function submitprocedure(){
    var xhttp = new XMLHttpRequest();
    var checker;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("undo").innerHTML = this.responseText;
            checker=this.responseText;
            //alert(checker.localeCompare("\n1"));
            //alert(checker);
            if(checker.localeCompare("\n1")==0){
                waitforplayer();
            }
            else{
                turn=2;
                getnumber();
            }
        }
    };
    xhttp.open("GET", "playersetter.php?name="+url, true);
    xhttp.send();
}

function setnumber(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            turn=2;
            //alert(lastval);
            document.getElementById("undo").innerHTML = this.responseText;
            winnercheck();
            getnumber();
        }
    };
    xhttp.open("GET", "numbersetter.php?num="+lastval+"&name="+url, true);
    xhttp.send();
}

function getnumber(){
    var rettext=0,ctr=1;
    var checker=setInterval(function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                winnercheck();
                rettext = this.responseText;
            }
        };
        xhttp.open("GET", "numbergetter.php?name="+url, true);
        xhttp.send();
        document.getElementById("undo").innerHTML = ctr++;
        rettext=parseInt(rettext.replace( /^\D+/g, ''));
        //alert(rettext);
        if(rettext!=lastval){
            var a=stacke[rettext-1];
            a.innerHTML=a.innerHTML+"<span class=\"cross\"></span>";
            lastval=rettext;
            strikecount(a);
            turn=1;
            clearInterval(checker);
        }
     }, 1000);
}

function waitforplayer(){
    var rettext,ctr=1;
    var checker=setInterval(function(){
       var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                rettext = this.responseText;
            }
        };
        xhttp.open("GET", "playerchecker.php?name="+url, true);
        xhttp.send();
        document.getElementById("undo").innerHTML = ctr++;
        if(rettext.localeCompare("\n1")==0){
            document.getElementById("undo").innerHTML = "player 2 online";
            clearInterval(checker);
        }
    }, 1000);
}

function winnercheck(){
    var rettext;
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                rettext = this.responseText;
                if(rettext.localeCompare("\n1")==0){
                    alert("YOU WON!!");
                }
                if(rettext.localeCompare("\n2")==0){
                    alert("OPPONENT WON!!");
                    oppowon=1;
                }
            }
        };
        xhttp.open("GET", "winnerchecker.php?name="+url, true);
        xhttp.send();
}

function setwinner(){
    var rettext=0;
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                rettext = this.responseText;
                winnercheck();
            }
        };
        xhttp.open("GET", "winnersetter.php?name="+url, true);
        xhttp.send();
}

function strikecount(x){
    var numb=parseInt(x.id);
    var uni,ten;
    uni=numb%10;
    ten=parseInt(numb/10);
    row[ten]++;
    col[uni]++;
    if(uni==ten){
        diag1++;
        if(diag1==5)
        count++;
    }
    if(numb==15||numb==24||numb==33||numb==42||numb==51){
        diag2++;
        if(diag2==5)
        count++;
    }
    if(row[ten]==5)
        count++;
    if(col[uni]==5)
        count++;
    if(count>=5&&oppowon==0)
        {
            setwinner();
        }
    document.getElementById("undo").innerHTML=count;
}