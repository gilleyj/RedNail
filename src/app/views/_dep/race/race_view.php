<style>
    </style>
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="<?=$this->_base_url;?>assets/js/gmaps.js"></script>
<script type="text/javascript" src="<?=$this->_base_url;?>assets/js/bootstrap-slider.js"></script>
<link rel="stylesheet" href="<?=$this->_base_url;?>assets/css/slider.css" media="screen" />

<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <div id="route_map" style="border:2.5px solid #999;"></div>
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-5 well">
            <h1 style="word-break:break-all;"><?=$race['race_name'];?></h1>
            <p>Race Starts <?=date('jS \of F Y', strtotime($race['start_date']));?></p>
            <p>Race Ends <?=date('jS \of F Y', strtotime($race['end_date']));?></p>
            
            <div class="well" class="">
                <button id="btnDownload" name="btnDownload" class="btn btn-default btn-block" data-toggle="modal" data-remote="<?=$this->_base_url;?>form/race/download" href="#form_race_download">Download Waypoints</button>
                <button id="btnEnter" name="btnEnter" class="btn btn-info btn-block" data-toggle="modal" data-remote="<?=$this->_base_url;?>form/race/enter" href="#form_enter_race">Enter this race</button>
            </div>
            
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>

<script>
    var track_id = <?= intval($race['track_id']); ?> ;
    var base_url = '<?=$this->_base_url;?>';
    var data_url = base_url + '/api/race/view/' + track_id;

    var track_data;
    var map;
    var selected_segment = 0;
    var element_slider;
 
    $(document).ready(function () {
        $("#route_map").height("600px");
        map = new GMaps({
            div: '#route_map',
            lat: 3.119728,
            lng: 101.656158,
        });

        $.get( data_url, function (data) {
            track_data = data;
            var length = 0;
            var count = 0;
            var segment_id = 0;
            var segment_select_element = $('#segment_select');

            $.each(data.segments, function (index) {

                if (track_data.segments[index].point_data.length > 0 && segment_id == 0) segment_id = count;

                if (typeof track_data.segments[(index)].point_data != 'undefined') {
                    if (track_data.segments[(index)].point_data.length > 0) {
                        track_data.segments[index].bounds = new google.maps.LatLngBounds();
                        track_data.segments[index].point_array = [];
                        var point = [];
                        var option = '<option value="' + (index) + '">segment ' + (index) + ' (' + track_data.segments[(index)].point_data.length + ' total data points)</option>';
                        segment_select_element.append(option);
                        track_data.segments[index].saved = true;
                        $.each(track_data.segments[index].point_data, function (pindex, data) {
                            point = [];
                            var google_point = new google.maps.LatLng(parseFloat(data.lat), parseFloat(data.lng));
                            track_data.segments[index].bounds.extend(google_point);
                            point.push(parseFloat(data.lat));
                            point.push(parseFloat(data.lng));
                            track_data.segments[index].point_array.push(point);
                        });
                    }
                }

                count++;

            });

            init_segment(segment_id);

        });
    });

    $('#segment_select').change(function () {
        init_segment($(this).val());
    });


    function init_segment(segment_id) {
        $('#segment_select').val(segment_id);
        selected_segment = segment_id;
        var length = track_data.segments[segment_id].point_data.length;
        var index_start = parseInt(track_data.segments[segment_id].start_point);
        var index_end = parseInt(track_data.segments[segment_id].end_point);
        if (index_end == 0) {
            index_end = track_data.segments[segment_id].point_data.length - 1;
            track_data.segments[segment_id].end_point = index_end;
        }

        var slider_value = [];
        slider_value.push(index_start);
        slider_value.push(index_end);

        var element = '<input type="text" class="col-sm-12" style="width: 390px;" id="startstop" />';
        $('#slider_container').html(element);
        element_slider = $('#startstop')
            .slider({
                min: 0,
                max: length - 1,
                orientation: 'horizontal',
                value: slider_value,
            })
            .on('slide', slider_change)
            .data('slider');

        display_segment(selected_segment);
        map.fitBounds(track_data.segments[segment_id].bounds);

    }

    function save_segment() {
        track_data.segments[selected_segment].saved = true;
        display_segment(selected_segment);
        $.get("<?=$this->_base_url;?>api/race/save_segment", {
            track_id: track_id,
            segment_id: track_data.segments[selected_segment].segment_id,
            start_point: track_data.segments[selected_segment].start_point,
            end_point: track_data.segments[selected_segment].end_point
        });
    }

    function slider_change() {
        var new_array = element_slider.getValue();
        track_data.segments[selected_segment].saved = false;
        track_data.segments[selected_segment].start_point = new_array[0];
        track_data.segments[selected_segment].end_point = new_array[1];
        display_segment(selected_segment);
    }

    function display_segment(segment_id) {
        var length = track_data.segments[segment_id].point_data.length;
        var index_start = parseInt(track_data.segments[segment_id].start_point);
        var index_end = parseInt(track_data.segments[segment_id].end_point);
        if (index_end == 0) {
            index_end = track_data.segments[segment_id].point_data.length - 1;
            track_data.segments[segment_id].end_point = index_end;
        }

        map.removePolylines();
        map.removeMarkers();

        if (track_data.segments[selected_segment].saved) {
            $('#save_well').hide();
        } else {
            $('#save_well').show();
        }

        // Draw 0 to start
        map.drawPolyline({
            path: track_data.segments[segment_id].point_array.slice(0, index_start + 1),
            strokeColor: '#610B21',
            strokeOpacity: 0.6,
            strokeWeight: 6
        });

        // Draw end to -1
        map.drawPolyline({
            path: track_data.segments[segment_id].point_array.slice(index_end, length),
            strokeColor: '#610B21',
            strokeOpacity: 0.6,
            strokeWeight: 6
        });

        // Draw start to end
        map.drawPolyline({
            path: track_data.segments[segment_id].point_array.slice(index_start, index_end + 1),
            strokeColor: '#0B6121',
            strokeOpacity: 0.6,
            strokeWeight: 6
        });

        display_markers(segment_id);
        
    }

    function display_markers(segment_id) {
        var index_start = parseInt(track_data.segments[segment_id].start_point);
        var index_end = parseInt(track_data.segments[segment_id].end_point);
        map.removeMarkers();
        map.addMarker({
            lat: parseFloat(track_data.segments[segment_id].point_data[index_start].lat),
            lng: parseFloat(track_data.segments[segment_id].point_data[index_start].lng),
            title: 'Segment End',
            infoWindow: {
              content: '<p>Segment Start</p>'
            }
        });
        map.addMarker({
            lat: parseFloat(track_data.segments[segment_id].point_data[index_end].lat),
            lng: parseFloat(track_data.segments[segment_id].point_data[index_end].lng),
            title: 'Segment End',
            infoWindow: {
              content: '<p>Segment End</p>'
            }
        });
    }
  </script>
