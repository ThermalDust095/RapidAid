

$(document).ready(function(){
    $(".navbar").fadeIn("slow");    
    $(".login-form").fadeIn("slow");    
    $("#amb-img").fadeIn("slow");    


    $(".login-form").submit(function(e) {
        e.preventDefault();
    }); 


    $("#submit-btn").click(function(e){
        e.preventDefault();

        let email = $("#user-i").val();
        let password = $("#pass-i").val();

        const data = JSON.stringify({ "email": email, "password": password });

        $.ajax({
            url: "http://localhost/rapid-aid/api/validateDriver.php",
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                console.log(data);
                if(data.status == true){
                    $("#user-i").val("")
                    $("#pass-i").val("")
                    sessionStorage.setItem("driverLogin", true);
                    sessionStorage.setItem("driverName", data.driverName);
                    window.location = "dashboard.html"
                }
                else {
                    alert(data.data);
                }


            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error
                console.log("error");
                $("#user-i").css("border","3px solid red")
                $("#pass-i").css("border","3px solid red")
            }
        });        

    })

    $("#sign-up").click(function(){
        window.location.href = "/register.html"
    })

})