# Gli stili delle Google Maps

È possibile dare uno stile alle mappe di Google tramite la creazione di un json che va collegato allo script stesso della creazione della mappa.

Dal sito https://mapstyle.withgoogle.com/ è possibile creare il json che va collegato alla mappa. C'è però https://snazzymaps.com/ che sembra più funzionale e comprende già moltissimi temi fatti da poter usare o modificare.

Ecco come applicare lo stile a una mappa:

```js
// stilizing map
var styledMapType = new google.maps.StyledMapType([
        // style json
    ],
    {name: 'Styled Map'});


// vars
var args = {
    zoom		: 16,
    center		: new google.maps.LatLng(0, 0),
    mapTypeId	: google.maps.MapTypeId.ROADMAP
};


// create map
var map = new google.maps.Map( $el[0], args);


// associate the styled map with the MapTypeId and set it to display.
map.mapTypes.set('styled_map', styledMapType);
map.setMapTypeId('styled_map');

```
