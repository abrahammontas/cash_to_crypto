      // This project requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var infowindow;
      var radius;
      var defaultLocation;
      var geocoder;
      var directionsService;
      var directionsDisplay;
      var markers = [];


      function initMap() {
        radius = 5*1609.34;// in meters(1 miles equals to 1609.34 meter)
        defaultLocation = {lat: 33.7489950, lng: -84.3879820};
        //defaultLocation = {lat: -33.867, lng: 151.195};

        map = new google.maps.Map(document.getElementById('map'), {
          center: defaultLocation,
          zoom: 12,
        });

        // Create the search box and link it to the UI element.
        var input = /** @type {HTMLInputElement} */(
            document.getElementById('bl-form'));
        map.controls[google.maps.ControlPosition.RIGHT_TOP].push(input);
        // Try HTML5 geolocation
        if(navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            // var defaultLocation = new google.maps.LatLng(position.coords.latitude,
            //                                  position.coords.longitude);
            defaultLocation = {lat: position.coords.latitude,
                                             lng: position.coords.longitude};
            
            //show banks within given radius for user's location
            nearbyBanks();
          }, function() {
            handleLocationError(true, map.getCenter());
          });
        }else{
          // Browser doesn't support Geolocation
          handleLocationError(false, map.getCenter());
        }

        geocoder = new google.maps.Geocoder();
        directionsService = new google.maps.DirectionsService();
        var rendererOptions = {
            map: map,
            suppressMarkers: true,
          };
        directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
        directionsDisplay.setPanel(document.getElementById('directions-panel'));
      }

      function handleLocationError(browserHasGeolocation, pos) {
        //user opted not to share his location or browser does not support Geolocation
        // - show banks within given radius for default location
        nearbyBanks();
        if(!browserHasGeolocation){
          return;
          infowindow = new google.maps.InfoWindow({map: map,maxWidth: 350});
          infowindow.setPosition(pos);
          infowindow.setContent(browserHasGeolocation ?
                                'Error: The Geolocation service failed.' :
                                'Error: Your browser doesn\'t support geolocation.');
        }
      }

      function nearbyBanks(bank, showList){

        deleteMarkers();
        if (showList) {
          $(".addresses").each(function(){
            $(this).html('').removeClass("active");
          });
        }

        //set center
        map.setCenter(defaultLocation);
        
        //google map custom marker icon - .png fallback for IE11
        var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
        var marker_url = ( is_internetExplorer11 ) ? '/images/GGS_icon-target.png' : '/images/GGS_icon-target.svg';

        //centre of the map or user's location
        var marker = new google.maps.Marker({
          map: map,
          position: defaultLocation,
          visible: true,
          icon: marker_url,
          title: "You are here"
        });
        markers.push(marker);

        infowindow = new google.maps.InfoWindow({maxWidth: 300});
        var services = [];
        var handlers = [];
        for (var i = 0; i < banks.length; i++) {
            if (bank !== undefined && banks[i] != bank) {
              continue;
            }
            var searchedBank = banks[i];

            handlers.push(function(searchedBank){
              return function(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                  for (var j = 0; j < results.length; j++) {
                    if (results[j].name.toLowerCase().includes(searchedBank.toLowerCase())) {
                      createMarker(results[j], searchedBank, showList);
                    }
                  }
                }
              };
            }(searchedBank));


            services.push(new google.maps.places.PlacesService(map));
            services[services.length-1].nearbySearch({
              location: defaultLocation,
              radius: radius,//in meters
              type: ['bank'],
              keyword: searchedBank
            }, handlers[handlers.length-1]);
        }
      }

      function createMarker(place, bank, showList) {
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location,
          label: place.name
        });

        markers.push(marker);

        var bankInfo = function() {
          var content = '<div class="bank-info-window"><div class="title full-width">'+place.name+'</div><div class="address">'+place.vicinity+'</div><div><select onchange="directions(\''+place.place_id+'\')" id="mode"><option value="">Route here</option><option value="DRIVING">Driving</option><option value="WALKING">Walking</option><option value="BICYCLING">Bicycling</option><option value="TRANSIT">Transit</option></select></div></div>';

          infowindow.setContent(content);
          infowindow.open(map, marker);       
        };

        google.maps.event.addListener(marker, 'mouseover', bankInfo);
        google.maps.event.addListener(marker, 'click', bankInfo);
        if (showList){
          var hash = "#"+bank.toLowerCase().replace(/[^a-z]/g, '');

          var service = new google.maps.DistanceMatrixService();
          service.getDistanceMatrix(
            {
              origins: [defaultLocation],
              destinations: [place.geometry.location],
              travelMode: google.maps.TravelMode.DRIVING
            }, function callback(response, status) {
                $(hash).append(
                  "<div class='address-item' data-sort='"+response.rows[0].elements[0].distance.value+"'>"+
                    "<div class='name'>"+ place.name+"</div>"+
                    "<div class='address'>"+ place.vicinity+"</div>"+
                    "<div class='distance'>"+ response.rows[0].elements[0].distance.text+"</div>"+
                    "<div class='clear'></div>"+
                  "</div>"
                ).addClass('active');

                var items = $('.addresses.active > div');
                items.sort(function(a, b){
                    return +$(a).data('sort') - +$(b).data('sort');
                });
                items.appendTo('.addresses.active');

            });      
        }
      }

      function directions(placeId) {
        // body...
        var selectedMode = document.getElementById('mode').value;
        $("#cancel_route").on('click', function(){
            $("#cancel_route").hide();
            directionsDisplay.setDirections({routes:[]});
            $("#banks").show();
        });
        if (selectedMode != '') {
          $("#banks").hide();
          $("#cancel_route").show();
          var request = {
              origin: {location: defaultLocation},
              destination: {placeId: placeId},
              travelMode: google.maps.TravelMode[selectedMode]
          };
          directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
              directionsDisplay.setDirections(response);
          }
          });
        } else {
           $("#cancel_route").hide();
           directionsDisplay.setDirections({routes:[]});
           $("#banks").show();
        }
        
      }

      
      //function to convert zipcode into geocode and intialize nearbyBanks()
      $("#bl-form").submit(function(event) {
        var zipcode = $.trim($("#bl-input").val());
        if(!zipcode){
          //empty search field alert
          alert("Please enter a zipcode to search Bank Branches.");
          return false;
        }
        geocoder.geocode({'address': zipcode}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
              console.log(results[0].geometry.location);
                  var latitude  = results[0].geometry.location.lat();
                  var longitude = results[0].geometry.location.lng();
                  defaultLocation = {lat: latitude, lng: longitude};
                  console.log(defaultLocation);
                  //plot Bank Branches for zipcode entered by user
                  nearbyBanks();
            }
          }
        });
        event.preventDefault();
        return false;
      });

      $("#banks li").on("mouseenter", _.debounce(function(){
        var bank = $(this).text();
        $("#banks li.active").removeClass("active");
        $(this).addClass("active");
        if (bank == "All") {
          nearbyBanks();
        } else {
          nearbyBanks(bank);
        }
        
      },300));

      $("#banks li").on("click", _.debounce(function(){
        var bank = $(this).text();
        $("#banks li.active").removeClass("active");
        $(this).addClass("active");
        if (bank == "All") {
          nearbyBanks(null, true);
        } else {
          nearbyBanks(bank, true);
        }
        
      },300));

      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }

      // Shows any markers currently in the array.
      function showMarkers() {
        setMapOnAll(map);
      }

      // Deletes all markers in the array by removing references to them.
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }