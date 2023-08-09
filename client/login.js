console.log(document.location.href)

function getCurrentCoordinates(callback) {
    
    console.log(sessionStorage);

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          const latitude = position.coords.latitude;
          const longitude = position.coords.longitude;
          callback(null, { latitude, longitude });
          console.log(`latitude: ${latitude} longitude: ${longitude}`)
        },
        function (error) {
          callback(error);
        }
      );
    } else {
      callback(new Error('Geolocation is not supported by this browser.'));
    }
  }

  function handleCoordinates(error, coordinates) {
    if (error) {
      console.error('Error getting coordinates:', error.message);
    } else {
      let x = coordinates.latitude;
      let y = coordinates.longitude;
      
      sessionStorage.setItem("latitude", x);
      sessionStorage.setItem("longitude", y);
    }
  }

  getCurrentCoordinates(handleCoordinates);
  


$(document).ready(function(){

  latitude = sessionStorage.getItem("latitude")
  longitude = sessionStorage.getItem("longitude")

  $.get(`https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}`,
  function(data,status){

      var address =  data.display_name
      sessionStorage.setItem("address",address)
  })

    sessionStorage.setItem("status",false)

    $(".navbar").fadeIn("slow");
    
    $(".login-form").fadeIn("slow");    
    $("#amb-img").fadeIn("slow");
    $(".register").hide()    

    $(".login-form").submit(function(e) {
        e.preventDefault();
    });
    
    $(".register").submit(function(e) {
        e.preventDefault();
    });

    $("#submit-btn").click(function(e){
        let un = $("#user-i").val();
		    let pw = $("#pass-i").val();
      

        sessionStorage.setItem("username",un)
			e.preventDefault();
			const data = JSON.stringify({'email': un, "password": pw});
			console.log(data);
			$(document).ready(()=>{
				$.ajax({
					url: "http://localhost/rapid-aid/api/validateUser.php",
                    dataType: 'json',
					data: data,
					method: "POST",
					success: function (data) {
						console.log(data);
                        console.log(data.status)
                        if(data.status){
                            sessionStorage.setItem("status",true)
                            document.location.href = "homepage.html"
                        }

                        else{
                            $("#user-i").css("border","3px solid red")
                            $("#pass-i").css("border","3px solid red")
                        }
					},
					error: function (x) {
						console.log(x);
					}
				})
			})
			})

    $('#sign-up').click(function(){
        console.log("clicked")
        $(".login-form").hide()
        $("#amb-img").hide()
        $(".register").show()

    })
    
    $('#login').click(function(){
        $(".login-form").show()
        $("#amb-img").show()
        $(".register").hide()
    })
    

    $("#bars").click(function(){
        window.location.href = "/register.html"
    })
    
    $('#proj-name').click(()=>{
        console.log("clicked")
        document.location.href = "/login.html"
    })

    console.log(sessionStorage);

})
console.log(sessionStorage)



// function getUser() {
//     $.ajax({
//         url: "http://localhost/api-test/user-for-ambulance-api/getUser.php",
//         data: JSON.stringify({"id": 2}),
//         method: "POST",
//         dataType: "json",
//         success: function name(x) {
//             console.log(x)
//         }
//     })
// }

// getUser();