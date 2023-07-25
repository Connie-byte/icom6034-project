//Variables that can be reused in this page
var map;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay;

//Document ready event to call init and load initial data.
$(function () {
  init();
  loadMap(1);
  //console.log( "loadMap() finished!" );
});


//Initialize Map information
function init() {
  var mapOptions = {
    zoom: 10,
  };

  directionsDisplay = new google.maps.DirectionsRenderer();
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
}


//AJAX call to load the specific map
function loadMap(id) {
  var url = "/map"; // the url action to handle the form input.

  $.ajax({
    type: 'get',
    url: url,
    data: { 'query': id },
    success: function (data) {
      const destination = $('#map-canvas').data('destination');

      function geocodeAddress(location) {
        const geocoder = new google.maps.Geocoder();
        return new Promise((resolve, reject) => {
          geocoder.geocode({ address: location }, (results, status) => {
            if (status === "OK") {
              const lat = results[0].geometry.location.lat();
              const lng = results[0].geometry.location.lng();
              resolve({ lat, lng });
            } else {
              reject(`Geocode error: ${status}`);
            }
          });
        });
      }


      const map = new google.maps.Map(document.getElementById("map-canvas"), {
        zoom: 2,
        center: new google.maps.LatLng(37.7749, -122.4194),
      });



      // In the JavaScript code that adds the markers to the map
      for (const i of destination) {
        geocodeAddress(i)
          .then((result) => {
            if (result && result.lat && result.lng) {
              var marker = new google.maps.Marker({
                position: new google.maps.LatLng(result.lat, result.lng),
                map: map,
                title: i
              });


              // Add a click event listener to each marker
              marker.addListener('click', function () {
                // Make an AJAX request to the UserController@show method
                $.ajax({
                  type: 'GET',
                  url: searchIdeaUrl + i,
                  success: function (response) {
                    // Handle the response data, which should contain the user information
                    console.log('hihi')
                    console.log(response.data);
                  },
                  error: function (xhr, status, error) {
                    console.log('fail')
                    // Handle any errors that occur during the AJAX request
                    console.log(xhr.responseText);
                  }
                });






              });
            } else {
              console.error('Invalid result from geocodeAddress():', result);
            }
          })
          .catch((error) => {
            console.error(`Failed to geocode ${i}:`, error);
          });
      }





    }
  });
























}