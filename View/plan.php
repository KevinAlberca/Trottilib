<div class="container-fluid">
    <hr/>
    <div class="comment-sabonner"><a href="./?page=abonnement">Comment devenir abonné ?</a></div>
    <div class="plan">
        <h1 class="title">Cartes des Stations</h1>
        <p>Des stations Trottilib’ réparties sur Paris sont à la disposition des abonnées pour louer la trottinette, la recharger et la ranger.</p>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6 saisis-adresse">
            <h1 class="title">1.Je saisis une adresse</h1>
            <div class="row">
                <div class="col-lg-8">
                    <div class="input-group search-adresse">
                        <div class="input-group-btn">
                            <button type="button" class="btn" ><span class="glyphicon glyphicon-map-marker"></span>Ici</button>
                        </div><!-- /btn-group -->
                        <input type="text" class="form-control" placeholder="Adresse, ville, code postal, métro">
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-4">
                    <input type="submit" class="btn btn-secondary" value="OK"/>
                </div>
            </div><!-- /.row -->
        </div>
        <div class="col-xs-12 col-sm-6 je-recherche">
            <h1 class="title">2.Je recherche</h1>
            <div class="row">
                <div class="col-xs-6">
                    <button class="btn btn-block">Une trottinette</button>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-block">Borne d'abonnement</button>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-block">Une Place de rangement</button>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-block">Borne de rangement</button>
                </div>
            </div>
        </div>
        <div class="col-xs-offset-2 col-xs-8 col-sm-offset-5 col-sm-2">
            <button class="btn btn-block btn-search" type="submit">Rechercher</button>
        </div>
        <div class="col-xs-12 map">
            <div id="map-canvas" style="width: 100%; min-height: 700px; height:80vh;"></div>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
<script type="text/javascript">
    var map;
    function initialize() {
        // Create a simple map.
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: 14,
            center: {lat: 48.8535988, lng: 2.356068}
        });

        // Load a GeoJSON from the same server as our demo.
        map.data.loadGeoJson('static/map/map.geojson');
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
