<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="tanks.css">
</head>
< body onload="startGame()">

    <div class="container">
        <div class="canvasContainer"><canvas id="canvas" width="1000" height="1000"></canvas>
        </div>
    </div>

    <script>

        var myVehicle;
        var myVehicle2;

        var myObstacle;
        var myObstacle2;

        //var myBackground;

        function startGame(width, height, color, x, y, type) {
            myVehicle = new component(60, 25, "tank1.png", 930, 500, "image");
            myVehicle2 = new component(60, 25, "tank2.png", 70, 500, "image");
            myObstacle = new component(45, 45, "tree.png", 350, 300, "image");
            myObstacle2 = new component(45, 45, "tree.png", 600, 650, "image");
            //myBackground = new component(1000, 1000, "desert.png", 0, 0, "image");
            myMap.start();
        }

        var myMap = {
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
                    myMap.keys = (myMap.keys || []);
                    myMap.keys[e.keyCode] = (e.type == "keydown");
                })
                window.addEventListener('keyup', function (e) {
                    myMap.keys[e.keyCode] = (e.type == "keydown");
                })
            },
            clear : function() {
                this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
            },
            stop : function() {
                clearInterval(this.interval);
            }
        }

        function component(width, height, color, x, y, type) {
            this.type = type;
            if (type == "image") {
                this.image = new Image();
                this.image.src = color;
            }
            this.width = width;
            this.height = height;
            this.speed = 0;
            this.angle = 0;
            this.moveAngle = 0;
            this.x = x;
            this.y = y;

            this.update = function() {
                ctx = myMap.context;
                ctx.save();
                ctx.translate(this.x, this.y);
                ctx.rotate( 0 - this.angle);
                ctx.fillStyle = color;
                ctx.fillRect(this.width / -2, this.height / -2, this.width, this.height);
                ctx.restore();
            }
            this.newPos = function() {
                this.angle += this.moveAngle * Math.PI / 180;
                this.x -= this.speed * Math.cos(this.angle);
                this.y += this.speed * Math.sin(this.angle);
            }
        }

            // this.crashWith = function(otherobj) {
            //     var myleft = this.x;
            //     var myright = this.x + (this.width);
            //     var mytop = this.y;
            //     var mybottom = this.y + (this.height);
            //     var otherleft = otherobj.x;
            //     var otherright = otherobj.x + (otherobj.width);
            //     var othertop = otherobj.y;
            //     var otherbottom = otherobj.y + (otherobj.height);
            //     var crash = true;
            //     if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            //         crash = false;
            //     }
            //     return crash;
            // }


            function updateGameArea() {

                myVehicle.moveAngle = 0;
                myVehicle.speed = 0;
                if (myMap.keys && myMap.keys[37]) {myVehicle.moveAngle = 1; }
                if (myMap.keys && myMap.keys[39]) {myVehicle.moveAngle = -1; }
                if (myMap.keys && myMap.keys[38]) {myVehicle.speed= 1; }
                if (myMap.keys && myMap.keys[40]) {myVehicle.speed= -1; }


                myVehicle2.moveAngle = 0;
                myVehicle2.speed = 0;
                if (myMap.keys && myMap.keys[65]) {myVehicle2.moveAngle = 1; }
                if (myMap.keys && myMap.keys[68]) {myVehicle2.moveAngle = -1; }
                if (myMap.keys && myMap.keys[87]) {myVehicle2.speed= -1; }
                if (myMap.keys && myMap.keys[83]) {myVehicle2.speed= 1; }


                myMap.clear();

                //myBackground.newPos();
                //myBackground.update();

                myObstacle.update();
                myObstacle2.update();

                myVehicle.newPos();
                myVehicle.update();

                myVehicle2.newPos();
                myVehicle2.update();

            }

        // if (myVehicle.crashWith(myObstacle)) {
        //     myMap.stop();
        // } else if (myVehicle.crashWith(myObstacle2)) {
        //     myMap.stop();
        // } else {
        //     myMap.clear();
        //     myObstacle.update();
        //     myVehicle.x += myVehicle.speedX;
        //     myVehicle.y += myVehicle.speedY;
        //     myVehicle.update();
        // }

        // if (myVehicle2.crashWith(myObstacle)) {
        //     myMap.stop();
        // } else if (myVehicle2.crashWith(myObstacle2)) {
        //     myMap.stop();
        // } else {
        //     myMap.clear();
        //     myObstacle.update();
        //     myVehicle2.x += myVehicle2.speedX;
        //     myVehicle2.y += myVehicle2.speedY;    
        //     myVehicle2.update();
        // }


    </script>

    <h3>Player 1 use "arrow keys" to control the vehicle.</h3>
    <h3>Player 2 use "wasd keys" to control the vehicle.</h3>

</body>
</html>