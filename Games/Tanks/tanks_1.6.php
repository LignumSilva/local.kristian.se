<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="tanks.css">
</head>
<body onload="startGame()">

<script>
var myVehicle;
var myCanvas;

function startGame() {
    myVehicle = new component(60, 25, "img/vehicles/tank1.png", 930, 500, "image");
    myBackground = new component(1000, 1000, "img/scenery/desert.png", 0, 0, "background");
    myGameArea.start();
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 1000;
        this.canvas.height = 1000;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
        window.addEventListener('keydown', function (e) {
            e.preventDefault();
            myGameArea.keys = (myGameArea.keys || []);
            myGameArea.keys[e.keyCode] = (e.type == "keydown");
        })
        window.addEventListener('keyup', function (e) {
            myGameArea.keys[e.keyCode] = (e.type == "keydown");
        })
    },
    stop : function() {
        clearInterval(this.interval);
    },    
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}

function component.image(width, height, color, x, y, type) {

    this.type = type;
    this.width = width;
    this.height = height;
    this.speed = 0;
    this.angle = 0;
    this.moveAngle = 0;
    this.x = x;
    this.y = y;    
    this.update = function() {
        ctx = myGameArea.context;
        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.rotate(this.angle);
        ctx.fillStyle = color;
        ctx.fillRect(this.width / -2, this.height / -2, this.width, this.height);
        ctx.restore();    
    }
    this.newPos = function() {
        this.angle += this.moveAngle * Math.PI / 180;
        this.x += this.speed * Math.sin(this.angle);
        this.y -= this.speed * Math.cos(this.angle);
    }
}

function updateGameArea() {
    myGameArea.clear();
    myVehicle.moveAngle = 0;
    myVehicle.speed = 0;
    if (myGameArea.keys && myGameArea.keys[68]) {myVehicle.moveAngle = 1; }
    if (myGameArea.keys && myGameArea.keys[65]) {myVehicle.moveAngle = -1; }
    if (myGameArea.keys && myGameArea.keys[87]) {myVehicle.speed= 1; }
    if (myGameArea.keys && myGameArea.keys[83]) {myVehicle.speed= -1; }
    myVehicle.newPos();
    myVehicle.update();
}
</script>

<h3>Use the w,a,s,d keys to drive your vehicle.</h3>

</body>
</html>
