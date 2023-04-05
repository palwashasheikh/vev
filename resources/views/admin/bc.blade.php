<!DOCTYPE html>
<html>
    <head>
        <title>Bar Code</title>
        <style>
            #map_canvas {
                height: 100%;
            }

            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
                
        <div id="barcode">
            {!!$bc->getBarcodeHTML('PONKA', 'QRCODE', 5,5, '#ff6969')!!}
        </div>   
        
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>