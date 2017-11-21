$(function(){
    $(document).on('click','a',function(event){//binds listener to image link, clears content on click instead of actually going anywhere
        event.preventDefault();
        $("#content").empty();
    });
    $("#searchBtn").click(function(event){//note, button is not named yet.
        //$("#content").text("Hurray!"); test only
        //search function goes here
        showView();
    });
});

function showView(){
    var result = "First Name:";
    result += "<input type ='text' id='fname' value=''/> <br />"
    result += "Last Name:"
    result += "<input type ='text' id='lname' value=''/> <br />"
    result += "Email:"
    result += "<input type ='text' id='email' value=''/> <br />"
    result += "Phone Number:"
    result += "<input type ='text' id='phone' value=''/> <br />"
    result += "Your Comment:"
    result += "<textarea maxlength='500' name='comment' id='comment'></textarea> <br />"//how to set this to a text area??? with max 200 char
    result += "<input type ='button' id='submitBtn' value='Submit'/> <br />"

    $("#content").html(result);
}