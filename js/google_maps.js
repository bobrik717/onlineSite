var marker;
var map;

function initialize() {
    var mapOptions = {
        zoom: 13,
        center: new google.maps.LatLng(49.669819, 36.357937)
    }
    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    var image = {
        url:'/images/beachflag.jpg',
//        size: new google.maps.Size(71, 71),
//        origin: new google.maps.Point(0, 0),
//        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
        }
    var myLatLng = new google.maps.LatLng(49.669819, 36.357937);
    marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        animation: google.maps.Animation.DROP,
        title:"Home"
    });
    google.maps.event.addListener(marker, 'click', toggleBounce);
}
function toggleBounce() {

    if (marker.getAnimation() != null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}
google.maps.event.addDomListener(window, 'load', initialize);
