jQuery(document).ready(function(){
    

function render_map( $el ) {
    
// ************ VIEWPORT INFO ************* //

    function updateViewportDimensions() {
      var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
      return { width:x,height:y }
    }
    
    // setting the viewport width
    var viewport = updateViewportDimensions();
      
    // markers var (there will only be ONE)
    var $markers = $el.find('.marker');
    
    // http://www.mapstylr.com/map-style-editor/
    //var styles = [{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cccccc"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"},{"color":"#dddddd"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"on"},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.01}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"saturation":-96},{"lightness":-76},{"gamma":4.84}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"weight":1}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"saturation":0},{"lightness":0},{"gamma":5}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"},{"gamma":5.04}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#666666"},{"lightness":17},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"}]},{"featureType":"administrative.province","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"},{"gamma":1.3}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"visibility":"on"},{"weight":1.54},{"gamma":1.84}]},{"featureType":"administrative.locality","elementType":"labels.icon","stylers":[{"visibility":"on"},{"weight":0.64},{"lightness":21},{"gamma":4.53}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":35},{"gamma":4.51}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"hue":"#000000"},{"lightness":30},{"gamma":5.17}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":11},{"gamma":2.36}]}];
    var styles = [{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cccccc"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cccccc"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"},{"color":"#dddddd"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"on"},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.01}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"saturation":-96},{"lightness":-76},{"gamma":4.84}]},{"featureType":"administrative.country","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"weight":1}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"saturation":0},{"lightness":0},{"gamma":5}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"},{"gamma":5.04}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#666666"},{"lightness":17},{"gamma":1.24}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"}]},{"featureType":"administrative.province","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aaaaaa"},{"gamma":1.3}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"visibility":"on"},{"weight":1.54},{"gamma":1.84}]},{"featureType":"administrative.locality","elementType":"labels.icon","stylers":[{"visibility":"on"},{"weight":0.64},{"lightness":21},{"gamma":4.53}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":35},{"gamma":4.51}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#000000"},{"hue":"#000000"},{"lightness":30},{"gamma":5.17}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":11},{"gamma":2.36}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"},{"weight":1.37},{"lightness":21}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":84}]},{"featureType":"road.local","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":76}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#000000"},{"lightness":54}]}];
 
    var dragtoggle;
    if (viewport.width > 768) { dragtoggle = true; } else { dragtoggle = false; };
 
    // vars
    var args = {
        zoom        : 16, //  this is reset below when there's only one marker....as there should be
        scrollwheel : false,
        center      : new google.maps.LatLng(0, 0),
        mapTypeId   : google.maps.MapTypeId.ROADMAP,
        draggable   : dragtoggle,
        styles      : styles
    };
 
    // create map               
    var map = new google.maps.Map( $el[0], args);
 
    // add a markers reference
    map.markers = [];
 
    // add markers
    $markers.each(function(){
 
        add_marker( jQuery(this), map );
 
    });
 
    // center map
    center_map( map );
 
}
 
function add_marker( $marker, map ) {
 
    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // Marker Image
    var pinImage = '/wp-content/themes/huhot/library/images/map-marker-location.png';

    // 2x Marker Image
    if(window.devicePixelRatio > 1.5){
        pinImage = '/wp-content/themes/huhot/library/images/map-marker-location@2x.png';
    }

    var image = {
        url : pinImage,
        size : new google.maps.Size(23, 37), 
        scaledSize : new google.maps.Size(23, 37),
        origin : new google.maps.Point(0, 0),
        anchor : new google.maps.Point(11, 37)
    }    
 
    // create marker
    var marker = new google.maps.Marker({
        position    : latlng,
        map         : map,
        icon        : image
    });
 
    // add to array
    map.markers.push( marker );
 
    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
        // create info window
        var infowindow = new google.maps.InfoWindow({
            content     : $marker.html()
        });
 
// ************ INFOWINDOW CLICK OPTIONS ************* //  

    google.maps.event.addListener(marker, 'click', function() {

        infowindow.open( map, marker );
        map.setOptions({draggable:true}); // this really only applies to mobile (desktop always has draggable:true)

    });
        
// ************ MAP CLICK OPTIONS ************* //        
        
       google.maps.event.addListener(map, 'click', function(event){
          infowindow.close(); // close all infowindows
          this.setOptions({scrollwheel:true});
          this.setOptions({draggable:true}); // this really only applies to mobile (desktop always has draggable:true)
        });         
    }
 
}
 
function center_map( map ) {
 
    // vars
    var bounds = new google.maps.LatLngBounds();
 
    // loop through all markers and create bounds
    jQuery.each( map.markers, function( i, marker ){
 
        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
 
        bounds.extend( latlng );
 
    });
 
    // only 1 marker?
    if( map.markers.length == 1 )
    {
        // set center of map
        map.setCenter( bounds.getCenter() );
        map.setZoom( 14 );
    }
    else
    {
        // fit to bounds
        map.fitBounds( bounds );
    }
 
 // ************ RESIZE LISTENER ************* //
        
        google.maps.event.addDomListener(window, "resize", function() {
            var center = map.getCenter(); // get the center value first
            google.maps.event.trigger(map, "resize"); // resize the map
            //map.setCenter(center);
            map.panTo(center); // animate to the center
        });      
    
        
// ************ MAP MOUSEOUT OPTIONS ************* //             
        
        google.maps.event.addListener(map, 'mouseout', function(event){
         this.setOptions({scrollwheel:false});  
        });
        
}
 
 
    jQuery('#single-location-map').each(function(){ // loop through each child element of the single-location-map element
 
        render_map( jQuery(this) );
 
    }); 
 
});
 




  

   

  
