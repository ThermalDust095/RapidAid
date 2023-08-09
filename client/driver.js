if(sessionStorage.getItem("status") == 'false'){
    $('#body').remove();
  }

setInterval(()=>{

    const data = JSON.stringify({'name': sessionStorage.getItem("username")});

    $.ajax({
    url: "http://localhost/rapid-aid/api/checkOngoingTrip.php",
      dataType: 'json',
      data: data,
      method: "POST",
      success: function (data) {
        console.log(data)

        if(data.status){
            $('.loading').hide()
            $('.driver-page').show()
        }
      },
      error: function (x) {
        console.log(x);
      }
    })
},3000)