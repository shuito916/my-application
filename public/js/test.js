navigator.geolocation.getCurrentPosition(
    function(position){
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        document.getElementsByName('lat')[0].value=lat;
        document.getElementsByName('lng')[0].value=lng;
        
    }
);


