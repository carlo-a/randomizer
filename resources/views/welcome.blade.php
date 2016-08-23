<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="resources/assets/js/jquery-2.2.4.min.js"></script>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div id="result"class="title">RestauRand</div>
                <button id="random">Where do we eat?</button>
                <div><a href="http://localhost:8030/restaurand/admin">Manage Restaurant List</a></div>
                <input type="text" id="location"></input>
                <button id="filter">Filter</button>
                <div id="places"></div>
            </div>
        </div>
        <script>
        // $(function(){
          var json = "http://localhost:8030/restaurand/randomizer";
          var bubble = [];
          var bubble2 = [];
          getRestaurants(); 
          //getRestaurantsByLocation("http://localhost:8030/restaurand/filter/location/piazza");
          function getRestaurants(){
            $.ajax({
              dataType: "json",
              url: json,
              success: function(data){
                bubble = data;
              },
              error: function(data){
                getRestaurants();
              }
            });
          }
          function getRestaurantsByLocation(json){
            $.ajax({
              dataType: "json",
              url: json,
              success: function(data){
                bubble2 = data;
              },
              error: function(data){
                getRestaurantsByLocation(json);
              }
            });
          }   
        // });



        $( "#random" ).click(function() {
            var maxCount = bubble.length;
            var id = Math.floor((Math.random() * maxCount));
            $('#result').html(bubble[id].name);
        });
        $( "#filter" ).click(function() {
            var json2 = "http://localhost:8030/restaurand/filter/location/piazza";
            getRestaurantsByLocation(json2);
            $('#places').html(bubble2[0].name);
        });
        </script>
    </body>
</html>
