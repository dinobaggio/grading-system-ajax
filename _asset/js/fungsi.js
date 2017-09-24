function ambilDoc (filenya, fungsinya) {
    var iniHttp;
    try {
        iniHttp = new XMLHttpRequest();
    } catch (e) {
        try {
            iniHttp = new ActiveXObject("Msxml.XMLHTTP");
        } catch (e) {
            try {
                iniHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("browser anda error tidak support ajax");
            }
        }
    }

    iniHttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            fungsinya(this);
        }
    
    }
    iniHttp.open("POST", filenya, true);
    iniHttp.send();
}

function ambilDoc_data(file, data, fungsinya) {
    var iniHttp;
    try {
        iniHttp = new XMLHttpRequest();
    } catch (e) {
        try {
            iniHttp = new ActiveXObject("Msxml.XMLHTTP");
        } catch (e) {
            try {
                iniHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("browser anda tidak support aja maaf!");
            }
        }
    }

    iniHttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200 ) {
            fungsinya(this);
        }
    }
    iniHttp.open("POST", file, true);
    iniHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    iniHttp.send(data);
}

function tampilAjaxIndex(tampil) {
    var ajaxIndex = document.getElementById("ajaxIndex");
    ajaxIndex.innerHTML = "Loading .....";
    ajaxIndex.innerHTML = tampil.responseText;
}