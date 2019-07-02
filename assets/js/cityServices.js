function initMap(lat,long, title, address,schedules) {
    let myLatlng = new google.maps.LatLng(lat, long)
    let mapOptions = {
        zoom: 16,
        center: myLatlng
    }

    let map = new google.maps.Map(document.getElementById("map"), mapOptions)

    let contentString = '<div id="content" style="align-items: center;flex-direction: column;">'+
        '<h1 style="text-align: center;" id="firstHeading" class="firstHeading">'+title+'</h1>'+
        '<div id="bodyContent" style="align-items: center;flex-direction: column;">'+
        '<p style="text-align: center;">'+ address+'</p>'+
        '<p style="text-align: center;">'+ schedules+'</p>'+
        '</div>'+
        '</div>';

    let infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    let marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });

    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });
}

window.onload=function(){
    initMap(48.077554,7.3563501,'Colmar','18 Place de la Cathédrale, 68000 Colmar','Ouvert 7j/7')
}

let cityServices = document.querySelectorAll('#cityServices')
cityServices.forEach(function (services) {
    services.addEventListener('click',function () {
        initMap(services.getAttribute('data-lat'),services.getAttribute('data-long'),
            services.getAttribute('data-title'),services.getAttribute('data-address'),
            services.getAttribute('data-schedules'))
    })
})
