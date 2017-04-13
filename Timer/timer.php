<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
canvas {
    border:1px solid #d3d3d3;
    background-color: #f1f1f1;
}
</style>
</head>
<body>

<script>

var myTimer;

function startTimer() {
    myTimer = new component("30px", "Consolas", "black", 280, 100, "text");
    myTimerArea.start();
}

var myTimerArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 480;
        this.canvas.height = 270;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateTimerArea, 20);
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}

function component(width, height, color, x, y, type) {
    this.type = type;
    this.timer = 0;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;
    this.x = x;
    this.y = y;
    this.update = function() {
        ctx = myTimerArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }

function updateTimerArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myTimerPiece.crashWith(myObstacles[i])) {
            return;
        } 
    }
    myTimerArea.clear();
    myTimerArea.frameNo += 1;
    if (myTimerArea.frameNo == 1 || everyinterval(1000)) {
        x = myTimerArea.canvas.width;
    }

    myTimer.text="TIME: " + myTimerArea.frameNo;
    myTimer.update();
    myTimerPiece.newPos();
    myTimerPiece.update();
}

function everyinterval(n) {
    if ((myTimerArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}

function timerstart(n) {
    myTimerPiece.gravity = n;
}
</script>

<br>
<button onmousedown="" onmouseup="">Start Timer</button>

<p>Timer</p>

</body>
</html>
