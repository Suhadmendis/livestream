
function GetXmlHttpObject()
{
    var xmlHttp = null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e)
        {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}


function newent() {
    document.getElementById('user_name').value = "";
    document.getElementById('pass1').value = "";
    document.getElementById('pass2').value = "";
    document.getElementById('umail').value = "";
    document.getElementById('rmail').value = "";

    document.getElementById('msg_box').innerHTML = "";
    getdt();
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "CheckUsers.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function assign_dt() {
    document.getElementById('itemdetails').innerHTML = xmlHttp.responseText;
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {



    }
}


function getcode(cdata, cdata1, cdata2, cdata3, cdata4) {


    document.getElementById('user_name').value = cdata;
    document.getElementById('user_type').value = cdata1;
   // document.getElementById('user_depart').value = cdata2;
    document.getElementById('umail').value = cdata3;
    document.getElementById('rmail').value = cdata4;
// hide();
    window.scrollTo(0, 0);
    
}

//function hide(){
//    document.getElementById('pass1').hide;
//    document.getElementById("pass2").hide;
//}

function select_permission()
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "assign_privilages_data.php";
    url = url + "?Command=" + "select_permission";
    url = url + "&user_name=" + document.getElementById("user_name").value;

    xmlHttp.onreadystatechange = passsuppresult_select_permission;


    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function passsuppresult_select_permission()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("balance_table");
        document.getElementById('privi_table').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("mcount");
        document.getElementById('mcount').value = XMLAddress1[0].childNodes[0].nodeValue;


    }
}

function save_inv()
{


    
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null)
        {
            alert("Browser does not support HTTP Request");
            return;
        }

        if (document.getElementById('full_name').value == "") {
            alert("Full Name Not Entered");
            return false;
        }
        if (document.getElementById("email").value == "") {
          alert("Email Not Entered");
          return false;
        }
        if (document.getElementById("pass").value == "") {
          alert("New Password Not Entered");
          return false;
        }
        if (document.getElementById("uniq_id").value == "") {
          alert("ID Not Entered");
          return false;
        }

        
        var url = "CheckUsers.php";
        url = url + "?Command=" + "save_inv";
        url = url + "&full_name=" + document.getElementById("full_name").value;
        url = url + "&email=" + document.getElementById("email").value;
        url = url + "&pass=" + document.getElementById("pass").value;
        url = url + "&uniq_id=" + document.getElementById("uniq_id").value;
        
        xmlHttp.onreadystatechange = passsuppresult_save_inv;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

}



function passsuppresult_save_inv()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        if (xmlHttp.responseText == "LOG") {
          //    $("#status_message").html("Successfully Registered");
          //    $("#exampleModalCenter").modal("show");
          location.replace("index.php");
        } else if(xmlHttp.responseText == "NO ID"){
          // $("#status_message").html(xmlHttp.responseText);
          // $("#exampleModalCenter").modal("show");
          alert("Wrong ID");
        } else if(xmlHttp.responseText == "EX ID"){
          // $("#status_message").html(xmlHttp.responseText);
          // $("#exampleModalCenter").modal("show");
          alert("ID Expired");
        } else {
            // $("#status_message").html(xmlHttp.responseText);
            // $("#exampleModalCenter").modal("show");
            alert(xmlHttp.responseText);
        }


    }
}

function edit() {
//    if (document.getElementById("pass1").value != document.getElementById("pass2").value) {
//        alert("Please Confirm Password");
//        document.getElementById("pass2").value = "";
//        document.getElementById("pass2").focus();
//    } else {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('user_name').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>User  Not Selected</span></div>";
        return false;
    }

    var url = "CheckUsers.php";
    url = url + "?Command=" + "edit";
    url = url + "&user_name=" + document.getElementById("user_name").value;
  //  url = url + "&user_depart=" + document.getElementById("user_depart").value;
//        url = url + "&password=" + document.getElementById("pass1").value;
    url = url + "&user_type=" + document.getElementById("user_type").value;
    url = url + "&U_email=" + document.getElementById("umail").value;
    url = url + "&R_email=" + document.getElementById("rmail").value;

    xmlHttp.onreadystatechange = edited;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}
//}
function edited() {
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "EDIT") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>EDITED</span></div>";
            newent();
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}

function deleteproduct() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('user_name').value == "") {
        document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>User  Not Selected</span></div>";
        return false;
    }

    var url = "CheckUsers.php";
    url = url + "?Command=" + "delete";


    url = url + "&user_name=" + document.getElementById('user_name').value;

    xmlHttp.onreadystatechange = dele;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function dele() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Delete") {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-danger' role='alert'><span class='center-block'>Deleted</span></div>";
            newent();
        } else {
            document.getElementById('msg_box').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + xmlHttp.responseText + "</span></div>";
        }
    }
}
