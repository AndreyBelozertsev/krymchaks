

  <div class="card card-outline card-success card-widget">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
     integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
     integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
     crossorigin=""></script>
    <input type="hidden" v-pre {!! $attributes !!} 
    
    @if (isset($value)) 
    value="{{$value}}"
    @endif
    >

    
    <div class="card-header">
      <label for="{{ $name }}" class="card-title form-group">
        Положение на карте
        @if($required)
              <span class="form-element-required">*</span>
        @endif
      </label>
    </div>
    @include(AdminTemplate::getViewPath('form.element.partials.errors'))
    <div class="card-footer p-0">
      <div id="streetmap" style="height: 450px;"></div>
    </div>

    <script type="text/javascript">
    function ready() {
      @if (isset($value))
        var markermap = L.marker([
          {{ $value }}
        ]);

        var map = L.map('streetmap', {
          center: [{{ $value }}],
          zoom: 14,
          layers: [markermap]
        });
      @else
      var markermap = L.marker([]);
        var map = L.map('streetmap', {
          center: [44.95216519926006,444994.1025066377],
          zoom: 14,
        });

      @endif

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      map.on('click',function(e){
        lat = e.latlng.lat;
        lon = e.latlng.lng;
        document.getElementById('{{ $id }}').value = lat +","+lon;
        
            //Clear existing marker,
            if (markermap != undefined) {
                map.removeLayer(markermap);
            };
        //Add a marker to show where you clicked.
        markermap = L.marker([lat,lon]).addTo(map);
    });


    }
   
    document.addEventListener("DOMContentLoaded", ready);
    
    </script>

  </div>

