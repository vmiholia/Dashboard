function showHint(str) {
    var searchTerm = $(".search").val();
    var searchTerm = str;
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
}


function DailyTransaction() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } 
    else 
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            document.getElementById("report_view").innerHTML = xmlhttp.responseText;
        }
    };

    var url="DailyTransaction.php";
    xmlhttp.open("GET",url,true);

    xmlhttp.send();
}
function TillToday() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("report_view").innerHTML = xmlhttp.responseText;
        }
    };

    var url="TillToday.php";
    xmlhttp.open("GET",url,true);

    xmlhttp.send();
}
function AprMay() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("report_view").innerHTML = xmlhttp.responseText;
        }
    };

    var url="monthly_view.php?month=Apr";
    xmlhttp.open("GET",url,true);
    
    xmlhttp.send();
}
function JunJul() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("report_view").innerHTML = xmlhttp.responseText;
        }
    };

    var url="monthly_view.php?month=Jun";
    xmlhttp.open("GET",url,true);
    
    xmlhttp.send();
}
function AugSep() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("report_view").innerHTML = xmlhttp.responseText;
        }
    };

    var url="monthly_view.php?month=Aug";
    xmlhttp.open("GET",url,true);
    
    xmlhttp.send();
}
function OctNov() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("report_view").innerHTML = xmlhttp.responseText;
        }
    };

    var url="monthly_view.php?month=Oct";
    xmlhttp.open("GET",url,true);
    
    xmlhttp.send();
}
function DecJan() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("report_view").innerHTML = xmlhttp.responseText;
        }
    };

    var url="monthly_view.php?month=Dece";
    xmlhttp.open("GET",url,true);
    
    xmlhttp.send();
}
function FebMar() {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("report_view").innerHTML = xmlhttp.responseText;
        }
    };

    var url="monthly_view.php?month=Feb";
    xmlhttp.open("GET",url,true);
    
    xmlhttp.send();
}
