<!DOCTYPE html> 
<!-- 구글지도 v3.0은 html5를 사용하므로 DOCTYPE이 필요합니다. 
만약 페이지 내용이 2px 정도의 줄간격이 생기면 DocType 삭제하세요 (2013-05-16) --> 
<html> 
<head> 
<title></title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<style type="text/css"> 
html, body { 
  /* height: 100%;  IE에서 지도위치가 브라우저 하단에 고정되는 현상 발생해서 삭제 (2013-05-16)  */ 
  margin: 0; 
  padding: 0; 
} 

#map-canvas, #map_canvas {
  min-width: 200px;
  width: 100%;
  min-height: 200px;
  height: 100%;
}

/* 말풍선관련 css 시작 */ 
.map_Heading { /* 말풍선 타이틀(회사명) css */ 
  line-height:30px; 
  font-size:20px; 
  font-weight:bold; 
  color:#30C; 
} 

.map_Content { /* 말풍선 내용 css */ 
  font-size:12px; 
  color:#333; 
} 

/* 말풍선 회사홈페이지 링크 css */ 
a:link.map_Content    { text-decoration: none; color: #333; } 
a:active.map_Content  { text-decoration: none; color: #333; } 
a:visited.map_Content { text-decoration: none; color: #333; } 
a:hover.map_Content  { text-decoration: none; color: #A2002E; } 
/* 말풍선관련 css 끝 */ 

@media print { 
  html, body { 
    height: auto; 
  } 
  #map_canvas { 
    height: 650px; 
  } 
} 
</style> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> 
<script> 
function initialize() { 
  /* 
  http://maps.googleapis.com/maps/api/geocode/xml?sensor=true&address=서울시 구로구 구로동 851 
  위의 링크에서 뒤에 주소를 적으면 x,y 값을 구할수 있습니다. 
  <location> 
    <lat>37.4037838</lat>  이것이 Y_point 
    <lng>126.9731414</lng>  이것이 X-point 
  </location> 
  */ 
  var Y_point        = 35.3620081;    // lat 값 
  var X_point        = 129.0498452;  // lng 값 

  var zoomLevel      = 17;  // 첫 로딩시 보일 지도의 확대 레벨 

  var markerTitle    = "인정머리";  // 현재 위치 마커에 마우스를 올렸을때 나타나는 이름 
  var markerMaxWidth = 300;  // 마커를 클릭했을때 나타나는 말풍선의 최대 크기 

  // 말풍선 내용 
  var contentString	= '<div>' + 
    '<div>'+ 
    '</div>'+ 
    '<span class="map_Heading">'+markerTitle+'</span>'+ 
    '<div class="map_Content">'+ 
    '</div>'+ 
  '</div>'; 

  var myLatlng = new google.maps.LatLng(Y_point, X_point); 
  var mapOptions = { 
    zoom: zoomLevel, 
    center: myLatlng, 
    mapTypeId: google.maps.MapTypeId.ROADMAP 
  } 
  var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions); 

  var marker = new google.maps.Marker({ 
    position: myLatlng, 
    map: map, 
    draggable:true, 
    animation: google.maps.Animation.DROP, 
    title: markerTitle 
  }); 

  var infowindow = new google.maps.InfoWindow({ 
    content: contentString, 
    maxWidth: markerMaxWidth 
  }); 
  infowindow.open(map, marker); 

  google.maps.event.addListener(marker, 'click', function() { 
    infowindow.open(map, marker); 
  }); 

} 

google.maps.event.addDomListener(window, 'load', initialize); 
</script> 
</head> 

<body> 
  <div id="map_canvas" style="border:0px solid #ffffff; margin:0 0 0px 0;"></div>
</body> 
</html> 