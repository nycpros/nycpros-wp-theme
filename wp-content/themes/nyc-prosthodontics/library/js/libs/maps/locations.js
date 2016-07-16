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
          location.slug = jQuery(this).attr("data-slug");
          locations.push(location);
        }
      });
      
  // set of locations represented by lat/lon pairs (being built dynamically ABOVE) -- THIS IS HERE FOR REFERENCE ONLY -- NOT USED
  // var locations = [{lat:47.6, lon:-122.3, place:"Seattle, WA"}, {lat:34, lon:-118.2, place:"Los Angeles, CA"}, {lat:30.2, lon:-97.7, place:"Austin, TX"}, {lat:40, lon:-83, place:"Columbus,OH"}];
			      
			      
 // ************ GOOGLE MAP OBJECT ************* //

    var map;
    // var markerLatLng = [];
    // var markerName = [];
    // var gmarkers = [];
    var myLatlng = new google.maps.LatLng(42.877742,-97.380979); // center of USA
    
    // http://www.mapstylr.com/map-style-editor/
    //var styles = [{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cccccc"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"},{"color":"#dddddd"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"on"},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.01}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"saturation":-96},{"lightness":-76},{"gamma":4.84}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"weight":1}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"saturation":0},{"lightness":0},{"gamma":5}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"},{"gamma":5.04}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#666666"},{"lightness":17},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"}]},{"featureType":"administrative.province","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"},{"gamma":1.3}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"visibility":"on"},{"weight":1.54},{"gamma":1.84}]},{"featureType":"administrative.locality","elementType":"labels.icon","stylers":[{"visibility":"on"},{"weight":0.64},{"lightness":21},{"gamma":4.53}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":35},{"gamma":4.51}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"hue":"#000000"},{"lightness":30},{"gamma":5.17}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":11},{"gamma":2.36}]}];
    var styles = [{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cccccc"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cccccc"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"},{"color":"#dddddd"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"on"},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.01}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"saturation":-96},{"lightness":-76},{"gamma":4.84}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"weight":1}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"saturation":0},{"lightness":0},{"gamma":5}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"},{"gamma":5.04}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#666666"},{"lightness":17},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"}]},{"featureType":"administrative.province","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"},{"gamma":1.3}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"visibility":"on"},{"weight":1.54},{"gamma":1.84}]},{"featureType":"administrative.locality","elementType":"labels.icon","stylers":[{"visibility":"on"},{"weight":0.64},{"lightness":21},{"gamma":4.53}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":35},{"gamma":4.51}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"hue":"#000000"},{"lightness":30},{"gamma":5.17}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":11},{"gamma":2.36}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"},{"weight":1.37},{"lightness":21}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":84}]},{"featureType":"road.local","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":76}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#000000"},{"lightness":54}]}];

    var dragtoggle;
    if (viewport.width > 768) { dragtoggle = true; } else { dragtoggle = false; };
    
    // Map options for how to display the Google map
    var mapOptions = { 
      draggable: dragtoggle,
      zoom:4,
      minZoom:4,
      center: myLatlng,
      disableDefaultUI: false,
      streetViewControl: false,
      mapTypeControl: false, 
      scrollwheel:false,
      mapTypeId: google.maps.MapTypeId.ROADMAP,  
      styles: styles
    };

    map = new google.maps.Map(document.getElementById("locations-map"), mapOptions);
    
    
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
            
    
    
// ************ LOOP THROUGH AND PLACE MARKERS ************* //
    
        for(var i = 0; i < locations.length; i++) 
        {
            
            // specific location lat/long
            var latlng = new google.maps.LatLng( locations[ i ].lat, locations[ i ].lon );
            
            var description = "<div class=\"address-infowindow\">" +
                "<strong>"+ locations[ i ].place + "</strong>" +
                "<span>"+ locations[ i ].address +"</span>" +
                "<span>"+ locations[ i ].city + ", " + locations[ i ].state + "</span>";
                if (locations[ i ].slug != "") { description = description + "<a href=\"/location/" + locations[ i ].slug + "\" class=\"btn btn-green\">Location Details</a>"; }
                "</div>";
                    
            var marker = new google.maps.Marker( { 
                position: latlng,     
                map: map,      
                title: locations[ i ].place,
                icon: defaultimage,
                id: i,
                html : description
                //html: "<div class='address-infowindow'><strong>" + locations[ i ].place + "</strong><span>" + "Distance away: " + dist + " miles</span><a href='https://www.google.com/maps?saddr="+ lat + ","+ lon +"&daddr=HuHot+Mongolion+Grill+"+ encodeURIComponent(locations[i].address) +"+" + encodeURIComponent(locations[i].city)+"+" + encodeURIComponent(locations[i].state) +"' class='btn btn-green' target='_blank'>GET DIRECTIONS</a></div>"
            });
            
// ************ ADD INFOWINDOW ************* //
            
            // Create default InfoWindow
            var infowindow = new google.maps.InfoWindow( { content: "Loading..." } );  
            
            // Click Function for default InfoWindow 
            google.maps.event.addListener(marker, "click", function () 
            {
                infowindow.setContent(this.html);
                infowindow.open(map, this);
                map.setOptions({draggable:true}); // this really only applies to mobile (desktop always has draggable:true)
            });             
                
        }  // end the for    
    
    
  
    // collect marker data from html
    /*
    var markers = jQuery("#locations-results").html();

    jQuery(markers).find(".marker").each(function() {
    
      if(jQuery(this).attr("data-latlng") != ""){
      
        var markerLatlngSet = new google.maps.LatLng(parseFloat(jQuery(this).attr("data-latlng").split(",")[0]), parseFloat(jQuery(this).attr("data-latlng").split(",")[1]));
        
        // Marker Image
        var pinImage = '/wp-content/themes/huhot/library/images/map-marker-location.png';
        var pinSize = new google.maps.Size(23, 37);

        // 2x Marker Image
        if(window.devicePixelRatio > 1.5){
            pinImage = '/wp-content/themes/huhot/library/images/map-marker-location@2x.png';
            pinSize = new google.maps.Size(46, 74);
        }

        var image = {
            url : pinImage,
            size : pinSize, 
            scaledSize : new google.maps.Size(23, 37),
            origin : new google.maps.Point(0, 0),
            anchor : new google.maps.Point(0, 37)
        }

        var marker = new google.maps.Marker({
            position: markerLatlngSet,
            map: map,
            title: jQuery(this).attr("data-name"),
            icon: image
        }); 
        
        var description = "<div class=\"address-infowindow\">" +
        "<strong>"+ jQuery(this).attr("data-title") + "</strong>" +
        "<span>"+ jQuery(this).attr("data-address") +"</span>" +
        "<span>"+ jQuery(this).attr("data-city") + ", " + jQuery(this).attr("data-state") + "</span>";
        if (jQuery(this).attr("data-slug") != "") { description = description + "<a href=\"/location/" + jQuery(this).attr("data-slug") + "\" class=\"btn btn-green\">Location Details</a>"; }
        "</div>";
                
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(description);
          infowindow.open(map, marker);
        });
        
        // Resize stuff...
        google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
        });
        
      }
    }); */
    
// ************ RESIZE LISTENER ************* //
        
        google.maps.event.addDomListener(window, "resize", function() {
            var center = map.getCenter(); // get the center value first
            google.maps.event.trigger(map, "resize"); // resize the map
            //map.setCenter(center);
            map.panTo(center); // animate to the center
        });      
    
    
    
// ************ MAP CLICK OPTIONS ************* //        
        
       google.maps.event.addListener(map, 'click', function(event){
          infowindow.close(); // close all infowindows
          this.setOptions({scrollwheel:true});
          this.setOptions({draggable:true}); // this really only applies to mobile (desktop always has draggable:true)
        });    
        
// ************ MAP MOUSEOUT OPTIONS ************* //             
        
        google.maps.event.addListener(map, 'mouseout', function(event){
         this.setOptions({scrollwheel:false});  
        });
        

}); // end document ready