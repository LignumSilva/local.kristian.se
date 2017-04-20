 var game;
 window.onload = function()
 {
 	if (screen.width>1500) 
 	{
 		//DESKTOP
 		game=new Phaser.Game(480,640,Phaser.AUTO,"ph_game");
 	}
 	else
 	{
 		//PHONE OR TABLET
 		game=new Phaser.Game(window.innerWidth,window.innerHeight,Phaser.AUTO,"ph_game");
 	}
 	game.state.add("StateMain",StateMain);
 	game.state.start("StateMain");
 }