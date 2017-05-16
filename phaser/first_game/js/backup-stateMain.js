var StateMain = {

        //  SET UP LIBRARY OF THE IMAGE, SOUND, ETC
        preload: function() {

            game.load.image('sky', 'assets/sky.png');
            game.load.image('ground', 'assets/platform.png');
            game.load.image('inv_wall', 'assets/invisible_wall.png');
            game.load.image('star', 'assets/star.png');
            game.load.spritesheet('dude', 'assets/dude.png', 32, 48);
            game.load.spritesheet('baddie', 'assets/dude.png', 32, 48);
        },

        //  CREATE OBJECTS TO BE USED DURING THE GAME
        create: function() {

            //  We're going to be using physics, so enable the Arcade Physics system
            game.physics.startSystem(Phaser.Physics.ARCADE);

            //  A simple background for our game
            game.add.sprite(0, 0, 'sky');

            //  The platforms group contains the ground and the 2 ledges we can jump on
            platforms = game.add.group();

            //  The walls group contains the invisible walls that only affects enemies
            walls = game.add.group();

            //  We will enable physics for any object that is created in this group
            platforms.enableBody = true;

            //   Here we create the ground.
            var ground = platforms.create(0, game.world.height - 64, 'ground');

            //  Scale it to fit the width of the game (the original sprite is 400x32 in size)
            ground.scale.setTo(2, 2);

            //  This stops it from falling away when you jump on it
            ground.body.immovable = true;

            //  Now let's create two ledges
            var ledge = platforms.create(400, 400, 'ground');
            ledge.body.immovable = true;

            ledge = platforms.create(-150, 250, 'ground');
            ledge.body.immovable = true;

            //  Let's create two invisible walls to block our enemy from falling off the ledge
            var wall = walls.create(385, 358, 'inv_wall');
            wall.body.immovable = true;
            wall.visible = true;

            wall = walls.create(250, 208, 'inv_wall');
            wall.body.immovable = true;
            wall.visible = true;

            //  The player and its settings
            player = game.add.sprite(32, game.world.height - 150, 'dude');

            //  We need to enable physics on the player
            game.physics.arcade.enable(player);

            //  Our players two animations, walking left and right.
            player.animations.add('left', [0, 1, 2, 3], 10, true);
            player.animations.add('right', [5, 6, 7, 8], 10, true);

            //  Player physics properties. Give the little guy a slight bounce.
            player.body.bounce.y = 0.2;
            player.body.gravity.y = 600;
            player.body.collideWorldBounds = true;

            //  The enemy and its settings
            enemy = game.add.sprite(750, game.world.height - 250, 'baddie');

            //  We need to enable physics on the enemy
            game.physics.arcade.enable(enemy);

            //  Our enemys two animations, walking left and right.
            enemy.animations.add('left', [0, 1, 2, 3], 10, true);
            enemy.animations.add('right', [5, 6, 7, 8], 10, true);

            //  enemy physics properties. Our foe also gets a little bounce in his step.
            enemy.body.bounce.y = 0.2;
            enemy.body.gravity.y = 600;
            enemy.body.collideWorldBounds = true;

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
            scoreText = game.add.text(16, 16, 'score: 0', { fontSize: '32px', fill: '#000' });

            //  Our controls.
            cursors = game.input.keyboard.createCursorKeys();
        },

        //  CONSTANTLY RUNNING LOOP
        update: function() {

            //  Collide the player, enemies and the stars with the platforms
            game.physics.arcade.collide(player, platforms);
            game.physics.arcade.collide(enemy, platforms);
            game.physics.arcade.collide(player, enemy);
            game.physics.arcade.collide(stars, platforms);

            //  Collide enemies with the walls and make them turn around
            game.physics.arcade.collide(enemy, walls, collideWall, null, this);

            //  Checks to see if the player overlaps with any of the stars, if he does call the collectStar function
            game.physics.arcade.overlap(player, stars, collectStar, null, this);

            //  Reset the players velocity (movement)
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
        }

        function collectStar(player, star) {

            // Removes the star from the screen
            star.kill();

            //  Add and update the score
            score += 10;
            scoreText.text = 'Score: ' + score;
        }

        function collideWall(enemy, walls) {

            //  Makes enemy walk in oposite direction
            if enemy.body.velocity.x = -70; {
                enemy.body.velocity.x = 70;
                enemy.animations.play('right');
            } else if enemy.body.velocity.x = 70; {
                enemy.body.velocity.x = -70;
                enemy.animations.play('right');
            }
