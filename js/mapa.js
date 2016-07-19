var map;
 

function initialize() {
    var options = {
        center: new google.maps.LatLng(-29.647467, -50.784592),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map(document.getElementById("mapa"), options);
}
initialize();

var locations = [
  ['First Shoppe', -29.647467, -50.784592]
];
    marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][0]),
    title: locations[i][0],
    map: map
  });


 
