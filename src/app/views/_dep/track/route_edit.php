<style>
    </style>
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="<?=$this->_base_url;?>assets/js/gmaps.js"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div id="route_map"></div>
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-4">
            
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>

<script>
    
    $(document).ready(function(){
                      $("#route_map").width("600px").height("600px");
                      map = new GMaps({
                                      div: '#route_map',
                                      lat: -12.043333,
                                      lng: -77.028333,
                                      click: function(e){
                                      console.log(e);
                                      }
                                      });
                      
                      
                      var path_vala = [[-13.044012922866312, -77.02470665341184],
                                       [-13.05449279282314, -77.03024273281858],
                                       [-13.055122327623378, -77.03039293652341],
                                       [-13.075917129727586, -77.02764635449216],
                                       [-13.07635776902266, -77.02792530422971],
                                       [-13.076819390363665, -77.02893381481931],
                                       [-13.088527520066453, -77.0241058385925],
                                       [-13.090814532191756, -77.02271108990476]];
                      
                      var path_valb = [[-12.044012922866312, -77.02470665341184],
                                       [-12.05449279282314, -77.03024273281858],
                                       [-12.055122327623378, -77.03039293652341],
                                       [-12.075917129727586, -77.02764635449216],
                                       [-12.07635776902266, -77.02792530422971],
                                       [-12.076819390363665, -77.02893381481931],
                                       [-12.088527520066453, -77.0241058385925],
                                       [-12.090814532191756, -77.02271108990476]];
                      
                      
                      map.removePolylines();
                      map.drawPolyline({
                                       path: path_valb,
                                       strokeColor: '#131540',
                                       strokeOpacity: 0.6,
                                       strokeWeight: 6
                                       });
                      });
    
    </script>
