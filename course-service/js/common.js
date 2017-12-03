$(function(){
    $(document).on('click','a',function(event){//binds listener to image link, clears content on click instead of actually going anywhere
        event.preventDefault();
        $("#content").empty();
    });
    $(document).on('click','a.course-listing',function(event){
        event.preventDefault();
        $("#content").empty();
        $.ajax({
            url: "courses",
            type: "GET",
            dataType: "json",
            cache: false,
            success: function(response){
                try{
                    var courses = response.data.courses;
                    if (courses){
                        var data = "";
                        data +="<table><tr><th>Id</th>";
                        data += "<th>Course Name</th>"
                        data += "<th>Description</th></tr>"
                        courses.forEach(function(element){
                            data += "<tr>"
                            data += "<td>" + element.id + "</td>";
                            data += "<td>" + element.name + "</td>";
                            data += "<td>" + element.description + "</td>";
                            data += "<td>" + " <a href='course/" + element.id + "' class='detail'>Detail</a> " +"</td>"+"</tr>";
                            data += "<br />";
                        });
                        $("#content").html(data);
                    }else{
                        $("#content").html("No courses found.");
                    }
                }catch (ex){
                    $("#content").html("Error Parsing: " +ex);
                }
            },
            error: function(response){
                $("#content").html("Nothing found.");
            },
            accepts: "application/json"
        });
    });

    $(document).on('click','a.detail',function(event){//HANNAH DID THIS- this is the listener and code for the DETAIL link
        event.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            type: "GET",
            dataType: "json",
            cache: false,
            success: function(response){
                try{
                    var course = response.data.course;

                    if(course){
                        var data = "";
                        course.forEach(function(element){
                        data += element.id;
                        data += "<br />" + element.name;
                        data += "<br />" + "<textarea>" + element.description; + "</textarea>";
                        data += "<br /> <br />"
                        });
                        // data +="<table><tr><th>ISBN</th>";
                        // data += "<th>Title</th>"
                        // textbook.forEach(function(element){
                        //     data += "<tr>"
                        //     data += "<td>" + element.isbn + "</td>";
                        //     data += "<td>" + element.name + "</td>";
                        //     data += "<br /> <br />";
                        //     data +="<table><tr><th>Section</th>";
                        //     data += "<th>Days</th>"
                        //     data += "<th>Time</th>"
                        // section.forEach(function(element){
                        //     data += "<tr>"
                        //     data += "<td>" + element.id + "</td>";
                        //     data += "<td>" + element.day_of_week + "</td>";
                        //     data += "<td>" + element.time + "</td>"+"</tr>";
                        //     data += "<br />";
                        // }

                        $("#content").html(data);
                    }else{
                        $("#content").html("No course found");
                    }

                }catch (ex){
                    $("#content").html("Error parsing.");
                }
            },
            error: function(response) {
                $("#content").html("Nothing found.");
            },
            accepts: "application/json"
        });
    });

    $("#searchBtn").click(function(event){
        var searchKey = $('#search').val();
        event.preventDefault();
        $("#content").empty();
        $.ajax({
            url: searchKey,
            type: "GET",
            dataType: "json",
            cache: false,
            success: function(response) {
                try {
                    var course = response.data.courses;
                    if(course){
                        var data = "";
                        data += course.id;
                        data += "<br />" + course.name;
                        data += "<br />" + "<textarea>" + course.description; + "</textarea>";
                        data += "<br /> <br />"

                        //DISPLAY TEXTBOOK AND SECTION DATA IN TABLES HERE!

                        $("#content").html(data);
                    }else{
                        $("#content").html("No course found");
                    }

                }catch (ex){
                    $("#content").html("Error parsing.");
                }
            },
            error: function(response) {
                $("#content").html("Nothing found.");
            },
            accepts: "application/json"
        });
    });
});

