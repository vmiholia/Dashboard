function tgraph() {
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("box-body").innerHTML = xmlhttp.responseText;
        }
    };
    var url="graphs/q11.php";
    xmlhttp.open("GET",url,true);
        //xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //httpc.setRequestHeader("Content-Length", address.length); 
    xmlhttp.send();
}