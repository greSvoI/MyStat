var ao = createAjaxObject(); //ao is global variable
function createAjaxObject()
{
    var ao=null;
    try
    {
        ao = new XMLHttpRequest(); //for modern browsers
    }
    catch(e)
    {
        try{ //for new IE
            ao = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e)
        {
            try{ //for old browsers
                ao = new
                ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e){
                alert("AJAX is not supported by your browser!")
                return false;
            }
        }
    }
    return ao;
}
function Process()
{
    if(ao.readyState == 4 || ao.readyState == 0)
    {
        let name = document.getElementById("usertext").value;
        ao.open("GET", "../controller/controller.php?name="+name, true);
        ao.onreadystatechange = getData;
        ao.send(null);
    }
}
function getData()
{
    if(ao.readyState == 4 && ao.status == 200)
    {
        resp = ao.responseText;
        document.getElementById("result").innerHTML = resp;
    }
}