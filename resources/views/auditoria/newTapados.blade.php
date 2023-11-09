<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        img {
            display: block;
            width: 100px;
            height: 100px;
            background-color: #C00;
            position: absolute;
            top: 75px;
            left: 75px;
          }
    </style>
</head>
<body>
    <div class="btn-group">
        <button type="button" class="js-zoom-in">Zoom In</button>
        <button type="button" class="js-zoom-out">Zoom Out</button>
        <button type="button" class="js-rotate-right">Rotate Right</button>
        <button type="button" class="js-rotate-left">Rotate Left</button>
      </div>
      <img id="image">
</body>
</html>
<script>
    var angle = 0;
var scale = 1;
var $img = $('#image');

$img.on('transform', function() {
  $img.css('transform', `rotate(${angle}deg) scale(${scale})`);
});

$('.js-rotate-right').on('click', function() {
  angle += 15;
  $img.trigger('transform');
});

$('.js-rotate-left').on('click', function() {
  angle -= 15;
  $img.trigger('transform');
});

$('.js-zoom-in').on('click', function() {
  scale += 0.25;
  if (scale == 2.25) {
    scale = 2;
  };
  $img.trigger('transform');
});

$('.js-zoom-out').on('click', function() {
  scale -= 0.25;
  if (scale == 0) {
    scale = 0.25;
  }
  $img.trigger('transform');
});
</script>
