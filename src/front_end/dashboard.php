<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>MBV Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="w3_edited.css">
  <script type='text/javascript' src = 'jquery-3.1.1.min.js'></script>
  <script>
  var dataObject;
  var jsonObject;
  function reloadJson() {
    $.ajax(
        {
            url: '../back_end/hostTest.php',
            type: 'GET',
            dataType: 'json',
            success: function (response)
            {
                jsonObject = response;
            }
        });

    dataObject = <?php exec('python ../back_end/parseCFGTest.py', $output, $code); $obj = json_encode($output); echo $obj;?>;
  }
  reloadJson();
  setInterval(reloadJson, 3000);
  [
    'geoxml3.js',
    'config.js',
    'dashboard_map.js',
    'over_map.js'
  ].forEach(function(src) {
    var script = document.createElement('script');
    script.src = src;
    script.async = false;
    document.head.appendChild(script);
  });

  </script>

</head>
<body>
  <div id="over_map">
    <div class="w3-opennav w3-xlarge w3-hide-xlarge w3-right" onclick="w3_open()">&#9776;</div>
    <nav class="w3-sidenav w3-collapse w3-white w3-card-2 w3-animate-right" style="width:0px;right:0;" id="mySidenav">
      <a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-xlarge w3-hide-xlarge">&times;</a>
    </div>
  </div>
</nav>
</div>
<div id="map">
  <div id="capture"></div>
</div>
</body>
</html>
