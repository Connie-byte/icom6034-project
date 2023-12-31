//Variables that can be reused in this page
var map;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay;

//Document ready event to call init and load initial data.
$(function() {
	init();
    loadMap(1);
    //console.log( "loadMap() finished!" );
});


//Initialize Map information
function init(){
    var mapOptions = {
    zoom: 10,
    };
    
    directionsDisplay = new google.maps.DirectionsRenderer();
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    directionsDisplay.setMap(map);
}


//AJAX call to load the specific map
function loadMap(id){
	var url = "/map"; // the url action to handle the form input.
    
	$.ajax({
				type : 'get',
				url : url,
				data:{'query':id},
				success:function(data){
					 
        
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
                        center:  new google.maps.LatLng(37.7749, -122.4194),
                    });


                      for (const i of destination) {
                        geocodeAddress(i)
                          .then((result) => {
                            if (result && result.lat && result.lng) {
                              var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(result.lat, result.lng),
                                map: map,
                                title: i
                              });


                              marker.addListener('click', function() {
                                // Get the latitude and longitude of the clicked marker
                                const lat = marker.getPosition().lat();
                                const lng = marker.getPosition().lng();
                                
                                // Call the weather API with the latitude and longitude
                                
                                const weatherUrl = `https://api.open-meteo.com/v1/dwd-icon?latitude=${lat}&longitude=${lng}&daily=weathercode,temperature_2m_max,temperature_2m_min&timezone=Asia%2FSingapore`;
                                
                                $.ajax({
                                  url: weatherUrl,
                                  success: function(data) {
                                    const weatherDescriptions = {
                                        0: 'Clear sky',
                                        1: 'Mainly clear',
                                        2: 'Partly cloudy',
                                        3: 'Overcast',
                                        45: 'Fog and depositing rime fog',
                                        48: 'Fog and depositing rime fog',
                                        51: 'Drizzle: Light intensity',
                                        53: 'Drizzle: Moderate intensity',
                                        55: 'Drizzle: Dense intensity',
                                        56: 'Freezing Drizzle: Light intensity',
                                        57: 'Freezing Drizzle: Dense intensity',
                                        61: 'Rain: Slight intensity',
                                        63:  'Rain: Moderate intensity',
                                        65: 'Rain: Heavy intensity',
                                        66: 'Freezing Rain: Light intensity',
                                        67: 'Freezing Rain: Heavy intensity',
                                        71: 'Snow fall: Slight intensity',
                                        73: 'Snow fall: Moderate intensity',
                                        75: 'Snow fall: Heavy intensity',
                                        77: 'Snow grains',
                                        80: 'Rain showers: Slight intensity',
                                        81: 'Rain showers: Moderate intensity',
                                        82: 'Rain showers: Violent intensity',
                                        85: 'Snow showers: Slight intensity',
                                        86: 'Snow showers: Heavy intensity',
                                        95: 'Thunderstorm: Slight or moderate',
                                        96: 'Thunderstorm with slight hail',
                                        99: 'Thunderstorm with heavy hail'
                                      };
                                    const max_temp=data.daily.temperature_2m_max[0];
                                    const min_temp=data.daily.temperature_2m_min[0];
                                    const weathercode_translate=weatherDescriptions[data.daily.weathercode[0]];
                                    console.log(weathercode_translate)

                                  },
                                  error: function(xhr, status, error) {
                                    console.error(`Failed to retrieve weather data: ${error}`);
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