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
                <input type="text" id="name"></input>
                <input type="text" id="location"></input>
                <button id="save">Save</button>
                <div><a href="http://localhost:8030/restaurand/">Back to Home</a></div>
            </div>
        </div>
        <script>
        // $(function(){

          function saveRestaurant(json){
            $.ajax({
              url: json,
              success: function(data){
                alert("save successful");
              },
              error: function(data){
                saveRestaurant(json);
              }
            });
          } 
        // });



        $( "#save" ).click(function() {
            var json = "http://localhost:8030/restaurand/save/name/"+$('#name').val()+"/location/"+$('#location').val();
            saveRestaurant(json);
        });
        </script>
    </body>
</html>
