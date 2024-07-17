<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

	<style>
		.leaflet-container {
			width: 100%;
            align-items: center;
            height: 100vh;
		}
	</style>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        
        <h2 class="h4">Location Tracker</h2>
    </div>
</div>
<div class="table-settings mb-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-9 col-lg-8 d-md-flex">
            <select class="form-select fmxw-200 d-md-inline" id="change-year" aria-label="Message select example 2">
                @php $years = range(2020, 2040); @endphp
                @foreach($years as $year)
                    <option value="{{ $year }}" @if(Session::get('year') == $year) selected @endif>Year: {{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div id="map" class="leaflet-container rounded mb-4 leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; z-index: 0; outline: none;">
    <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(-225px, 0px, 0px);">
        <div class="leaflet-pane leaflet-tile-pane">
            <div class="leaflet-layer " style="z-index: 1; opacity: 1;">      
        </div>
    
        <div class="leaflet-pane leaflet-overlay-pane"></div>
        
        <div class="leaflet-pane leaflet-tooltip-pane"></div>
        
        <div class="leaflet-pane leaflet-popup-pane"></div>

        <div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(54621px, 99498px, 0px) scale(512);"></div>

    </div>
    <div class="leaflet-control-container">
        <div class="leaflet-top leaflet-left">
            <div class="leaflet-control-zoom leaflet-bar leaflet-control">
                <a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in" aria-disabled="false">
                    <span aria-hidden="true">+</span>
                </a>
                
                <a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out" aria-disabled="false">
                    <span aria-hidden="true">−</span>
                </a>
            </div>
        </div>
        
        <div class="leaflet-top leaflet-right">
            <div class="leaflet-control-layers leaflet-control" aria-haspopup="true">
                <a class="leaflet-control-layers-toggle" href="#" title="Layers" role="button"></a>
                <section class="leaflet-control-layers-list">
                    <div class="leaflet-control-layers-base">
                        <label>
                            <span>
                                <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_55" checked="checked">
                                <span> OpenStreetMap</span>
                            </span>
                        </label>
                        
                        <label>
                            <span>
                                <input type="radio" class="leaflet-control-layers-selector" name="leaflet-base-layers_55">
                                <span> Hybrid</span>
                            </span>
                        </label>
                        
                    </div>

                  
                </section>
            </div>
        </div>
        <div class="leaflet-bottom leaflet-left"></div>
        <div class="leaflet-bottom leaflet-right">
            <div class="leaflet-control-attribution leaflet-control">
                <a href="https://leafletjs.com" title="A JavaScript library for interactive maps">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" class="leaflet-attribution-flag">
                        <path fill="#4C7BE1" d="M0 0h12v4H0z"></path>
                        <path fill="#FFD500" d="M0 4h12v3H0z"></path>
                        <path fill="#E0BC00" d="M0 7h12v1H0z"></path>
                    </svg> Leaflet</a> 
                    
                    <span aria-hidden="true">|</span> 
                    "©"
                    <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>
                </div>
            </div>
        </div>
    </div>

        <script src="./lib/leaflet.browser.print.min.js"></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

        @if(Auth::user()->type == 1)
            @foreach($locationTracker as $lt)
                <audio autoplay src="{{ asset("storage/sounds/siren.mp3") }}"></audio>
            @endforeach
        @endif

        @if(Auth::user()->type == 2)
            @foreach($locationTracker as $lt)
                @if ($lt->location == Auth::user()->address)
                    <audio autoplay src="{{ asset("storage/sounds/siren.mp3") }}"></audio>
                @endif
            @endforeach
        @endif
<div>
</center>
<script>
const emergency = L.layerGroup();

var barangayIcon = L.icon({
    iconUrl: '<?php echo asset("storage/gif/police.gif") ?>',

    iconSize:     [50, 50], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
            <?php if(Auth::user()->type == 1) {?>
            <?php foreach($locationTracker as $lt) { ?>

                    var latitude = parseFloat(<?php echo $lt->Barangay->latitude; ?>);
                    var longitude = parseFloat(<?php echo $lt->Barangay->longitude; ?>);
                        
                    var information = '<center><h6><?php echo $lt->Barangay->brgy ?> (<?php echo $lt->zone ?>)</h6><div><?php echo $lt->type." (".$lt->Type->subtype.")" ?></div><div class="fw-bolder text-danger">Status: <?php if($lt->status == 1) { echo "Reported (Barangay)"; } if($lt->status == 2) { echo "Reported (Police)"; } ?></div><div><?php echo date('M d, Y - h:i A', strtotime($lt->created_at)) ?></div></center>';

                    var marker_<?php echo $lt->id ?> = new L.marker([longitude, latitude], {icon: barangayIcon}).addTo(emergency).bindPopup(information, {closeOnClick:false,closeButton:false,autoClose:false, zoomControl:false}).openPopup(); 
                
                    setTimeout(() => {
                        marker_<?php echo $lt->id ?>.openPopup();
                    }, 500);
           
            <?php } ?>
            <?php } ?>

            <?php if(Auth::user()->type == 2) {?>
            <?php foreach($locationTracker as $lt) { ?>
                    <?php if($lt->location == Auth::user()->address) { ?>

                    var latitude = parseFloat(<?php echo $lt->Barangay->latitude; ?>);
                    var longitude = parseFloat(<?php echo $lt->Barangay->longitude; ?>);
                        
                    var information = '<center><h6><?php echo $lt->Barangay->brgy ?> (<?php echo $lt->zone ?>)</h6><div><?php echo $lt->type." (".$lt->Type->subtype.")" ?></div><div class="fw-bolder text-danger">Status: <?php if($lt->status == 1) { echo "Reported (Barangay)"; } if($lt->status == 2) { echo "Reported (Police)"; } ?></div><div><?php echo date('M d, Y - h:i A', strtotime($lt->created_at)) ?></div></center>';

                    var marker_<?php echo $lt->id ?> = new L.marker([longitude, latitude], {icon: barangayIcon}).addTo(emergency).bindPopup(information, {closeOnClick:false,closeButton:false,autoClose:false, zoomControl:false}).openPopup(); 
                
                    setTimeout(() => {
                        marker_<?php echo $lt->id ?>.openPopup();
                    }, 500);

                    <?php } ?>
            <?php } ?>
            <?php } ?>

</script>
<script>


	const mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
	const mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
 
	const streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

    const hybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
         maxZoom: 20,
         subdomains:['mt0','mt1','mt2','mt3']
        });

	const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});

	const map = L.map('map', {
		center: [10.3426, 124.9638],
		zoom: 15,
		layers: [osm, emergency, hybrid]
	});

	const baseLayers = {
		
        'OpenStreetMap': osm,
        'Hybrid': hybrid,
	};

	const overlays = {
		'Emergency': emergency,
	};

	const layerControl = L.control.layers(baseLayers, overlays).addTo(map);
	

	const satellite = L.tileLayer(mbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
	

     //search geo
     L.Control.geocoder().addTo(map);


       //map print
       L.control.browserPrint().addTo(map);
</script>
               
    </div>
</div>