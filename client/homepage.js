if(sessionStorage.getItem("status") == 'false'){
  $('#body').remove();
}

$('body').hide()

function getCurrentCoordinates(callback) {
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



function change_map(coor,i){
  $.get(`https://geocode.maps.co/reverse?lat=${coor[0]}&lon=${coor[1]}`,
            function(data,status){
            console.log(data.display_name)

            var object = {q: data.display_name};
            var address = new URLSearchParams(object).toString();
            $(`#hos-map-${i+1}`).attr("src",`https://www.google.com/maps/embed/v1/search?${address}&key=AIzaSyA7Z6BXPcKuEikLGMWw389Ry27vYYNllQw`)
  })
}


function get_dist(origin,dests){
  var obj = {
    origins:origin,
    destinations: `${dests[0]};${dests[1]};${dests[2]};${dests[3]};${dests[4]};${dests[5]}`
  }
  var query = new URLSearchParams(obj).toString();
  const settings = {
    async: true,
    crossDomain: true,
    dataType:'json',
    url: `https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?${query}`,
    method: 'GET',
    headers: {
      'X-RapidAPI-Key': '6dc237b064msh61bd1cc6db391f0p18dad2jsn830977443da3',
      'X-RapidAPI-Host': 'trueway-matrix.p.rapidapi.com'
    }
  }

  $.ajax(settings).done(function (response) {
    sessionStorage.setItem("distances",response.distances)
    sessionStorage.setItem("duration",response.durations)
  });

}

function selectHospital(name, address){
  console.log(address)

  const data = JSON.stringify({'name': sessionStorage.getItem("username"),"source":sessionStorage.getItem("address"),"destination":address});

  console.log(data)

    $.ajax({
      url: "http://localhost/rapid-aid/api/addPendingTrip.php",
      dataType: 'json',
      data: data,
      method: "POST",
      success: function (data) {
        console.log(data)
        window.location.href = "driver.html"
      },
      error: function (x) {
        console.log(x);
      }
    })

}

getCurrentCoordinates(handleCoordinates);


  $(document).ready(function(){

    // latitude = sessionStorage.getItem("latitude")
    // longitude = sessionStorage.getItem("longitude")

    // $.get(`https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}`,
    // function(data,status){

    //     var object = {q: data.display_name};
    //     const address = new URLSearchParams(object).toString();
    //     sessionStorage.setItem("address",address)
    // })

    let output = ''

    $.ajax({
      url: "http://localhost/rapid-aid/api/getHospitals.php",
      dataType: 'json',
      method: 'GET',
      success: function get_data(response){
        x = response.data

        dests = []
        for(let i=0;i<6;i++){
          dests.push(x[i].coordinates)
        }

        get_dist('12.825134728578687,77.51545093539335',dests)

        distances = sessionStorage.getItem("distances")
        durations = sessionStorage.getItem("duration")

        distances_array = distances.split(",")
        durations_array = durations.split(",")


        for(let i=0;i<6;i++){
          var coor= x[i].coordinates.split(", ")
          // $(`#hos-card-${i+1}`).css("top",`${166+(i*350)}px`)

          output += `<div class="hospital-card d-flex p-4 m-5" id="hos-card-${i+1}">
          <iframe class="hos-map" id="hos-map-${i+1}" width="250" height="250" loading="lazy" allowfullscreen ></iframe>
          <div class="ml-5">
            <h1><img src="./Assets/hospital-solid.svg" class="hos-icon mr-2">${x[i].name}</h1>
            <p class="hos-address" id="hos-add-${i+1}">${x[i].address}</p>
            <p class="hos-cord" id="hos-cord-${i+1}">${x[i].coordinates}</p>
            <span class="hos-ETA badge badge-danger">ETA: ${(Number(durations_array[i])/60).toFixed(2)} Min</span>
            <span class="hos-ETA badge badge-primary">ETA: ${(Number(distances_array[i])/1000).toFixed(2)} KM</span>
            <button type="button" class="btn btn-success hos-submit-btn" hospital-id="${i+1}" onClick="selectHospital('${x[i].name}','${x[i].address}')" class="hos-button"><i class="fas fa-upload"></i> Submit</button>
          </div>
        </div>`
        }

        $("#box").html(output)

        for(i=0;i<6;i++){
          var coor = x[i].coordinates.split(", ")
          change_map(coor,i)
        }
        
      }
    })

    // $('.hospital-card').on('click', '.hos-submit-btn',function () {
      
    //   // console.log(`${$(this).parent().attr("id")} clicked`)
    //   alert()

    //   const data = JSON.stringify({'name': 'Akhil', "password": "source","destination":"Sri Sai Ram Hospital"});

    //   $.ajax({
    //     url: "http://localhost/api/addPendingTrip.php",
    //     dataType: 'json',
    //     data: data,
    //     method: "POST",
    //     success: function (data) {
    //       console.log(data)
    //     },
    //     error: function (x) {
    //       console.log(x);
    //     }
    //   })
    // })

    $('#proj-name').click(()=>{
      console.log("clicked")
      document.location.href = "login.html"
  })
    $('body').show();
})


