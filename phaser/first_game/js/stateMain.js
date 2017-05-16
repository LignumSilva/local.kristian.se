var StateMain = {

        //  PRELOADING A LIBRARY OF THE IMAGES, SOUNDS, ETC
        preload: function() {

            game.load.image('sky', 'assets/sky.png');
            game.load.image('ground', 'assets/platform.png');
            game.load.image('wall', 'assets/invisible_wall.png');
            game.load.image('star', 'assets/star.png');
            game.load.spritesheet('hearts', 'assets/hearts.png', 30, 30);
            game.load.spritesheet('dude', 'assets/dude.png', 32, 48);
            game.load.spritesheet('baddie', 'assets/dude.png', 32, 48);
        },

        //  CREATING THE OBJECTS TO BE USED DURING THE GAME
        create: function() {

            //  Enabling the Arcade Physics system
            game.physics.startSystem(Phaser.Physics.ARCADE);

            //  A simple background
            game.add.sprite(0, 0, 'sky');

            //  The platforms group contains the ground and the 2 ledges
            platforms = game.add.group();

            //  We will enable physics for any object that is created in this group
            platforms.enableBody = true;

            //   Here we create the ground.
            var ground = platforms.create(0, game.world.height - 64, 'ground');

            //  Scale it to fit the width of the game (original sprite is 400x32 in size)
            ground.scale.setTo(2, 2);

            //  This stops it from falling away when you jump on it
            ground.body.immovable = true;

            //  Now let's create two ledges and make them immovable as well
            var ledge = platforms.create(400, 400, 'ground');
            ledge.body.immovable = true;

            ledge = platforms.create(-150, 250, 'ground');
            ledge.body.immovable = true;

            //  The walls group contains the invisible walls
            walls = game.add.group();

            //  We will enable physics for any object that is created in this group
            walls.enableBody = true;

            //  Let's create two invisible walls to block our enemy from falling off the ledge
            var wall = walls.create(385, 358, 'wall');
            wall.body.immovable = true;
            wall.visible = true;

            wall = walls.create(250, 208, 'wall');
            wall.body.immovable = true;
            wall.visible = true;

            /*PLAYER*/

            //  player and it's settings
            player = game.add.sprite(32, game.world.height - 150, 'dude');

            //  We need to enable physics on player
            game.physics.arcade.enable(player);

            //  player animations, walking left and right
            player.animations.add('left', [0, 1, 2, 3], 10, true);
            player.animations.add('right', [5, 6, 7, 8], 10, true);

            //  player physics properties, give the little guy a slight bounce
            player.body.bounce.y = 0.2;
            player.body.gravity.y = 600;
            player.body.collideWorldBounds = true;

            /*ENEMIES*/

            //  Adding a group for our enemies
            enemies = game.add.group();

            //  We will enable physics for any object that is created in this group
            enemies.enableBody = true;

            //  Adding the enemy and it's settings
            var enemy1 = enemies.create(750, game.world.height - 250, 'baddie');

            //  We need to enable physics on the enemy
            game.physics.arcade.enable(enemy1);

            //  Enemy animations, walking left and right
            enemy1.animations.add('left', [0, 1, 2, 3], 10, true);
            enemy1.animations.add('right', [5, 6, 7, 8], 10, true);

            //  Enemy physics properties. Our enemy also gets a little bounce in his step
            enemy1.body.bounce.y = 0.2;
            enemy1.body.gravity.y = 600;
            enemy1.body.collideWorldBounds = true;

            //  Set enemy starting direction, speed and animation
            enemy1.body.velocity.x = -70;
            enemy1.animations.play('left');

            //  Adding another enemy and it's settings
            var enemy2 = enemies.create(10, game.world.height - 400, 'baddie');

            //  We need to enable physics on the enemy
            game.physics.arcade.enable(enemy2);

            enemy2.enableBody = true;

            //  Enemy animations, walking left and right
            enemy2.animations.add('left', [0, 1, 2, 3], 10, true);
            enemy2.animations.add('right', [5, 6, 7, 8], 10, true);

            //  Enemy physics properties. Our enemy also gets a little bounce in his step
            enemy2.body.bounce.y = 0.2;
            enemy2.body.gravity.y = 600;
            enemy2.body.collideWorldBounds = true;

            //  Set enemy starting direction, speed and animation
            enemy2.body.velocity.x = 70;
            enemy2.animations.play('right');

            /*STARS*/

            //  Finally some stars to collect
            stars = game.add.group();

            //  We will enable physics for any star that is created in this group
            stars.enableBody = true;

            //  Here we'll create 12 of them evenly spaced apart
            for (var i = 0; i < 12; i++) {
                //  Create a star inside of the 'stars' group
                var star = stars.create(i * 70, 0, 'star');

                //  Let gravity do its thing
                star.body.gravity.y = 300;

                //  This just gives each star a slightly random bounce value
                star.body.bounce.y = 0.7 + Math.random() * 0.2;
            }

            //  The score
            scoreText = game.add.text(650, 16, 'score: 0', { fontSize: '32px', fill: '#000' });

            /*HEARTS*/

            //  Adding hearts to represent player health
            hearts = game.add.sprite(16, 16, 'hearts');

            //  Animations for our hearts sprite
            hearts.animations.add('one', [0], 0, false);
            hearts.animations.add('two', [0, 1], 0, false);
            hearts.animations.add('three', [0, 1, 2], 0, false);

            /*CONTROLS*/

            //  Our controls.
            cursors = game.input.keyboard.createCursorKeys();
        },

        //  UPDATING ON A RUNNING LOOP, CHECKING FOR CHANGES AND ACTING ACCORDINGLY
        update: function() {

            //  Collide the player, enemy and the stars with the platforms group
            game.physics.arcade.collide(player, platforms);
            game.physics.arcade.collide(enemies, platforms);
            game.physics.arcade.collide(stars, platforms);

            //  Checks if the enemy collide with the walls, if so, call the enemiesCollide function
            game.physics.arcade.collide(enemies, walls, enemiesCollide, null, this);

            //  Checks to see if the player overlaps with an enemy, if so, call the playerAttacked function
            game.physics.arcade.collide(player, enemies, playerAttacked);

            //  Checks to see if the player overlaps with any of the stars, if so, call the collectStar function
            game.physics.arcade.overlap(player, stars, collectStar, null, this);

            //  Setting our starting amount of hearts
            hearts.animations.play('two');

            //  PLAYER MOVEMENT
            //  Reset player velocity (movement)
            player.body.velocity.x = 0;

            if (cursors.left.isDown) {
                //  Move to the left
                player.body.velocity.x = -150;

                player.animations.play('left');
            } else if (cursors.right.isDown) {
                //  Move to the right
                player.body.velocity.x = 150;

                player.animations.play('right');
            } else {
                //  Stand still
                player.animations.stop();

                player.frame = 4;
            }
            //  Allow the player to jump if they are touching the ground
            if (cursors.up.isDown && player.body.touching.down) {
                player.body.velocity.y = -450;
            }

        //  Function for what will happen when enemies collide with walls
        function enemiesCollide(enemies, walls) {
                enemies.scale.x *= -1;

            }

        //  Function to decide what happens when player overlaps with an enemy
        function playerAttacked() {
            hearts.animations.play('one');
            }

        //  Function to decide what happens when player and stars overlap
        function collectStar(player, star) {
                //  Removes the star from the screen
                star.kill();
                //  Add and update the score
                score += 10;
                scoreText.text = 'Score: ' + score;
        }
    }
}
