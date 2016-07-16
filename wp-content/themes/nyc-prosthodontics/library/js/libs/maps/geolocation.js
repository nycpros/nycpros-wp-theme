jQuery(document).ready(function() {
  
  
// ************ VIEWPORT INFO ************* //

  function updateViewportDimensions() {
  	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
  	return { width:x,height:y }
  }
  // setting the viewport width
  var viewport = updateViewportDimensions();
  	
// ************ COLLECT MARKER DATA FROM HTML ************* //	
	
  var markers = jQuery("#locations-results").html();	
  
    var locations = [];
      jQuery(markers).find(".marker").each(function(){
        if(jQuery(this).attr("data-latlng") != ""){
          var location = {};
          location.lat = parseFloat(jQuery(this).attr("data-latlng").split(",")[0]);
          location.lon = parseFloat(jQuery(this).attr("data-latlng").split(",")[1]);
          location.place = jQuery(this).attr("data-title");
          location.address = jQuery(this).attr("data-address");
          location.city = jQuery(this).attr("data-city");
          location.state = jQuery(this).attr("data-state");
          locations.push(location);
        }
      });
      
  // set of locations represented by lat/lon pairs (being built dynamically ABOVE) -- THIS IS HERE FOR REFERENCE ONLY -- NOT USED
  // var locations = [{lat:47.6, lon:-122.3, place:"Seattle, WA"}, {lat:34, lon:-118.2, place:"Los Angeles, CA"}, {lat:30.2, lon:-97.7, place:"Austin, TX"}, {lat:40, lon:-83, place:"Columbus,OH"}];
			      
  
// ************ GOOGLE MAP OBJECT ************* //

   
    var map;    // Google map object
    var geocoder; // Google geocode fallback

    // Initialize and display a google map
    function Init()
    {
        // HTML5/W3C Geolocation
        if ( navigator.geolocation ) {
            //navigator.geolocation.getCurrentPosition( UserLocation, errorCallback,{maximumAge:60000,timeout:10000});
            navigator.geolocation.getCurrentPosition( UserLocation, errorCallback);
        } else {
          // Default to Missoula, MT
          ClosestLocation( 46.8625, -114.0117, "Missoula, MT" );
        }
        
        geocoder = new google.maps.Geocoder();
    }

    function errorCallback( error )
    {
      // Update a div element with the error message?
    }

    // Callback function for asynchronous call to HTML5 geolocation
    function UserLocation( position )
    {
        ClosestLocation( position.coords.latitude, position.coords.longitude, "You are here" );
    }

// ************ FALLBACK GET LAT/LONG FROM ZIPCODE ************* //	

  
  jQuery('#inputButtonGeocode').click(function() {
    
    var zipaddress = jQuery('#input-zip').val();
    //var zipRegex = /^\d{5}$/; // zip (5)
    var zipRegex = /^\d{5}(-\d{4})?$/; // zip (5) plus 4

    if (!zipRegex.test(zipaddress)) // error
    {
       alert('Please enter a proper Zip Code: "XXXXX" or "XXXXX-XXXX"');
                  
    } else { // no error, lets geocode
    
        geocoder.geocode( { 'address': zipaddress}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          
          //console.log(results[0].geometry.location.toString());
          //console.log('lat: '+results[0].geometry.location.lat());
          //console.log('lng: '+results[0].geometry.location.lng());
          
          ClosestLocation( results[0].geometry.location.lat(), results[0].geometry.location.lng(), "Locations close to: "+zipaddress );
          
 
        } else {
          
          alert('Geocode was not successful for the following reason: ' + status);
          
        }
      });
    }
    
    

  });
    



    // Display a map centered at the nearest location with a marker and InfoWindow.
    function ClosestLocation( lat, lon, title )
    {
        // Create a Google coordinate object for where to center the map
        var latlng = new google.maps.LatLng( lat, lon );  
        
        // http://www.mapstylr.com/map-style-editor/
        //var styles = [{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cccccc"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"},{"color":"#dddddd"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"on"},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.01}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"saturation":-96},{"lightness":-76},{"gamma":4.84}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"weight":1}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"saturation":0},{"lightness":0},{"gamma":5}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"},{"gamma":5.04}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#666666"},{"lightness":17},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"}]},{"featureType":"administrative.province","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"},{"gamma":1.3}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"visibility":"on"},{"weight":1.54},{"gamma":1.84}]},{"featureType":"administrative.locality","elementType":"labels.icon","stylers":[{"visibility":"on"},{"weight":0.64},{"lightness":21},{"gamma":4.53}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":35},{"gamma":4.51}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"hue":"#000000"},{"lightness":30},{"gamma":5.17}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":11},{"gamma":2.36}]}];
        var styles = [{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cccccc"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cccccc"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"},{"color":"#dddddd"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"on"},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.01}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"saturation":-96},{"lightness":-76},{"gamma":4.84}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"weight":1}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"saturation":0},{"lightness":0},{"gamma":5}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"},{"gamma":5.04}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#666666"},{"lightness":17},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"}]},{"featureType":"administrative.province","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"},{"gamma":1.3}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"visibility":"on"},{"weight":1.54},{"gamma":1.84}]},{"featureType":"administrative.locality","elementType":"labels.icon","stylers":[{"visibility":"on"},{"weight":0.64},{"lightness":21},{"gamma":4.53}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":35},{"gamma":4.51}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"hue":"#000000"},{"lightness":30},{"gamma":5.17}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":11},{"gamma":2.36}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"},{"weight":1.37},{"lightness":21}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":84}]},{"featureType":"road.local","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":76}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#000000"},{"lightness":54}]}];
        
        var dragtoggle;
        if (viewport.width > 768) { dragtoggle = true; } else { dragtoggle = false; };
        
        // Map options for how to display the Google map
        var mapOptions = { 
          draggable: dragtoggle,
          zoom:11,
          minZoom:4,
          center: latlng,
          disableDefaultUI: false,
          streetViewControl: false,
          mapTypeControl: false, 
          scrollwheel:false,
          mapTypeId: google.maps.MapTypeId.ROADMAP,  
          styles: styles
        };

        // Show the Google map in the div with the attribute id 'map-canvas'.
        map = new google.maps.Map(document.getElementById('locations-map'), mapOptions);

        // find the closest location to the user's location
        var closest = 0;
        var mindist = 99999;
        
// ************ ADD DEFAULT MARKERS ************* //   
        
        // default marker image
        var pinImage = '/wp-content/themes/huhot/library/images/map-marker-location.png';

        // 2x Marker Image
        if(window.devicePixelRatio > 1.5){
            pinImage = '/wp-content/themes/huhot/library/images/map-marker-location@2x.png';
        }

        var defaultimage = {
            url : pinImage,
            size : new google.maps.Size(23, 37), 
            scaledSize : new google.maps.Size(23, 37),
            origin : new google.maps.Point(0, 0),
            anchor : new google.maps.Point(11, 37)
        }
        
      
// ************ LOOP THROUGH AND PLACE OTHER MARKERS (W/DISTANCE CALCULATIONS) ************* //
     
        // temp array to count markers
        var markersArr = [];

        for(var i = 0; i < locations.length; i++) 
        {
            
            // specific location lat/long
            var latlng = new google.maps.LatLng( locations[ i ].lat, locations[ i ].lon );
        
            // get the distance between user's location and this point
            var dist = Haversine( locations[ i ].lat, locations[ i ].lon, lat, lon );
            
            var defaultmarker = new google.maps.Marker( { 
                position: latlng,     
                map: map,      
                title: "Distance away: Distance is " + dist + " miles",
                icon: defaultimage,
                id: i,
                html: "<div class='address-infowindow'><strong>" + locations[ i ].place + "</strong><span>" + "Distance away: " + dist + " miles</span><a href='https://www.google.com/maps?saddr="+ lat + ","+ lon +"&daddr=HuHot+Mongolion+Grill+"+ encodeURIComponent(locations[i].address) +"+" + encodeURIComponent(locations[i].city)+"+" + encodeURIComponent(locations[i].state) +"' class='btn btn-green' target='_blank'>GET DIRECTIONS</a></div>"
            });
            
            
// ************ ADD DEFAULT INFOWINDOW ************* //
            
            // Create default InfoWindow
            var infowindowdefault = new google.maps.InfoWindow( { content: "Loading..." } );  
            
            // Click Function for default InfoWindow 
            google.maps.event.addListener(defaultmarker, "click", function () 
            {
                //console.log('click');
                infowindowdefault.setContent(this.html);
                infowindowdefault.open(map, this);
                map.setOptions({draggable:true}); // this really only applies to mobile (desktop always has draggable:true)

            });             
                
            //add to markers array
            markersArr.push(defaultmarker);
        
            // check if this is the shortest distance so far
            if ( dist < mindist )
            {
                closest = i;
                mindist = dist;
            }
        }  // end the for


// ************ ADD YOU ARE HERE MARKER ************* //
    
        // default marker image
        var yah_pinImage = '/wp-content/themes/huhot/library/images/map-marker-youarehere.png';

        // 2x Marker Image
        if(window.devicePixelRatio > 1.5){
            yah_pinImage = '/wp-content/themes/huhot/library/images/map-marker-youarehere@2x.png';
        }

        var youarehere_image = {
            url : yah_pinImage,
            size : new google.maps.Size(37, 37), 
            scaledSize : new google.maps.Size(37, 37),
            origin : new google.maps.Point(0, 0),
            anchor : new google.maps.Point(18, 25)
        }
        
        // Create a Google coordinate object for the user's location 
        var userlatlng = new google.maps.LatLng( lat, lon );    

        // Place a Google Marker at the user's location 
        // When you hover over the marker, it will display the title
        var usermarker = new google.maps.Marker( { 
            position: userlatlng,     
            map: map,    
            icon: youarehere_image,
            title: title
        });
        
        
// ************ ADD YOU ARE HERE MARKER INFOWINDOW ************* //

        var infowindowyouarehere = new google.maps.InfoWindow( 
          { 
            content: "<div class='address-infowindow'><h4>YOU ARE HERE</h4><strong>", 
          });  
        
        // Click Function for CLOSEST MARKER InfoWindow 
        google.maps.event.addListener( usermarker, 'click', function() 
        { 
            infowindowyouarehere.open( map, usermarker );
            map.setOptions({draggable:true}); // this really only applies to mobile (desktop always has draggable:true)

        });
        
        
// ************ ADD CLOSEST PIN ************* //

        // Create a Google coordinate object for the closest location (uses calculated closest info from for loop above)
        var latlng = new google.maps.LatLng( locations[closest].lat, locations[closest].lon );    

        // Place a Google Marker at the closest location as the map center 
        // When you hover over the marker, it will display the title
        var closestmarker = new google.maps.Marker( { 
            position: latlng,     
            map: map,      
            title: "Closest Location: " + mindist + " miles",
            icon: defaultimage,
        });
        
        // hide the one default marker from above that ended up ALSO being closest (we don't need TWO markers at the same location)
        markersArr[closest].setVisible(false);
        
        
// ************ ADD CLOSEST MARKER INFOWINDOW ************* //

        var closestContentString = "<div class='address-infowindow'><h4>CLOSEST LOCATION</h4><strong>" + locations[closest].place + "</strong><span>Distance away: " + mindist + " miles</span><a href='https://www.google.com/maps?saddr="+ lat + ","+ lon +"&daddr=HuHot+Mongolion+Grill+"+ encodeURIComponent(locations[closest].address) +"+" + encodeURIComponent(locations[closest].city)+"+" + encodeURIComponent(locations[closest].state) +"' class='btn btn-green' target='_blank'>GET DIRECTIONS</a></div>";    // HTML text to display in the InfoWindow
        var infowindowclosest = new google.maps.InfoWindow( 
          { 
            content: closestContentString, 
          });  
        
        // Click Function for CLOSEST MARKER InfoWindow 
        google.maps.event.addListener( closestmarker, 'click', function() 
        { 
            infowindowclosest.open( map, closestmarker ); 
            map.setOptions({draggable:true}); // this really only applies to mobile (desktop always has draggable:true)

        });
        

// ************ CENTER THE MAP ************* //
        
       // Adjusting LAT/LONG 
       var adjlat = locations[closest].lat+0.02; // bit of a hack to make room for the infowindow on initial load
       var adjlon = locations[closest].lon;
       //console.log (adjlat+","+adjlon);
       var adjlatlng = new google.maps.LatLng(adjlat,adjlon);
    
        //Pan to (like this...but animated 'map.setCenter( latlng );')
        map.panTo(adjlatlng);
        
        //open infowindow by default
        infowindowclosest.open( map, closestmarker );        
        
        
// ************ ZOOM LISTENER ************* //
        
        // google.maps.event.addListener(map, 'zoom_changed', function() {
        //   infowindowclosest.open( map, closestmarker );
        // });
        
        
// ************ RESIZE LISTENER ************* //
        
        google.maps.event.addDomListener(window, "resize", function() {
            var center = map.getCenter(); // get the center value first
            google.maps.event.trigger(map, "resize"); // resize the map
            //map.setCenter(center);
            map.panTo(center); // animate to the center
        });   
        
// ************ MAP CLICK OPTIONS ************* //        
        
       google.maps.event.addListener(map, 'click', function(event){
         infowindowdefault.close(); // close all infowindows
          this.setOptions({scrollwheel:true});
          this.setOptions({draggable:true}); // this really only applies to mobile (desktop always has draggable:true)
        }); 
        
// ************ MAP MOUSEOUT OPTIONS ************* //            
        
        google.maps.event.addListener(map, 'mouseout', function(event){
         this.setOptions({scrollwheel:false});  
        });
        
    
// ************ DEBUGGING ************* //
        
        // markers array
        //markersArr.push(closestmarker);
        
        // total markers
        //console.log(markersArr);     
  
}

// ************ DISTANCE CALCULATION FUNCTIONS ************* //

    // Convert Degress to Radians
    function Deg2Rad( deg ) {
       return deg * Math.PI / 180;
    }

    // Get Distance between two lat/lng points using the Haversine function
    // First published by Roger Sinnott in Sky & Telescope magazine in 1984 (“Virtues of the Haversine”)
    //
    function Haversine( lat1, lon1, lat2, lon2 )
    {
        var R = 6372.8; // Earth Radius in Kilometers

        var dLat = Deg2Rad(lat2-lat1);  
        var dLon = Deg2Rad(lon2-lon1);  

        var a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
                        Math.cos(Deg2Rad(lat1)) * Math.cos(Deg2Rad(lat2)) * 
                        Math.sin(dLon/2) * Math.sin(dLon/2);  
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; 

        // Return Distance in Kilometers
        //return d;
        
        var miles = d * .6214;
        return Math.round(miles);
    }
	
// ************ INIT THE MAP!! ************* //
    
    // Call the method 'Init()' to display the google map when the web page is displayed ( load event )
    google.maps.event.addDomListener( window, 'load', Init );
	

}); // end document ready
