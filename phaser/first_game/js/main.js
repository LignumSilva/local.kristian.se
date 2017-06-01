var game;
window.onload = function() {
    if (screen.width > 1500) {
        //DESKTOP
        game = new Phaser.Game(800, 600, Phaser.AUTO, "ph_game");
    } else {
        //PHONE OR TABLET
        game = new Phaser.Game(window.innerWidth, window.innerHeight, Phaser.AUTO, "ph_game");
    }

    game.state.add("StateMain", StateMain);
    game.state.start("StateMain");
	}

//  Adding variables for our functions etc.
var player;
var enemies;
var platforms;
var walls;
var cursors;
var stars;
var score = 0;
var scoreText;
var life;
var heart = 3;
var heartAmount;
