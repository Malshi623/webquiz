// $('.gamearea').click(function () {
//     $('#appleCut').each(function () {
//       this.play()
//     })
//     $('#woodHit').each(function () {
//       this.play()
//       this.pause()
//     })
//     $('#bonusPoint').each(function () {
//       this.play()
//       this.pause()
//     })
//   })

var __extends = this.__extends || function(d, b) {
    for (var p in b)
        if (b.hasOwnProperty(p)) d[p] = b[p];

    function __() { this.constructor = d; }
    __.prototype = b.prototype;
    d.prototype = new __();
};
// the game itself
var game;
// global game options
var gameOptions = {
    // target rotation speed, in degrees per frame
    rotationSpeed: 3,
    // knife throwing duration, in milliseconds
    throwSpeed: 150,
    // minimum angle between two knives
    minAngle: 15,
    // max rotation speed variation, in degrees per frame
    rotationVariation: 1,
    // interval before next rotation speed variation, in milliseconds
    changeTime: 999999999,
    // maximum rotation speed, in degrees per frame
    maxRotationSpeed: 1
};
var knifeGameImage = './images/main_knife_disabled.png';

function updateGame(currentValue, disabledKnife) {
    game.scene.scenes[0].currentRotationSpeed = currentValue
    game.scene.scenes[0].newRotationSpeed = currentValue
        // game.scene.scenes[0].load.image("knife", "./images/knife.png");
        // game.scene.scenes[0].add
        // game.load.image("knife", "./images/knife.png")
        //knifeGameImage = newKnifeImg
    console.log(disabledKnife)
    if (disabledKnife === true) {
        game.scene.scenes[0].enbleKnife.destroy()
        game.scene.scenes[0].knife = game.scene.scenes[0].add.sprite(game.config.width / 2, game.config.height / 5 * 4.3, "knife");
    }

    console.log(game.scene.scenes[0].add)
    console.log(game.scene.scenes[0])
        // game.scene.scenes[0].scene.start("PlayGame");
}

function restartgame() {
    game.scene.scenes[0].scene.start("PlayGame");
}
// once the window loads...
function loadKnifeGame() {
    // game configuration object
    var gameConfig = {
        // render type
        type: Phaser.CANVAS,
        // tag ID where canvas render
        parent: "gamearea",
        // game width, in pixels
        width: 750,
        // game height, in pixels
        height: 1550,
        // game background color
        backgroundColor: 'rgba(255,110,110,0)',
        // "render.transparent": true,
        // scenes used by the game
        scene: [playGame]
    };
    // game constructor
    game = new Phaser.Game(gameConfig);
    // pure javascript to give focus to the page/frame and scale the game
    window.focus();
    resize();
    window.addEventListener("resize", resize, false);
};


// PlayGame scene
var playGame = (function(_super) {
    __extends(playGame, _super);
    // constructor
    function playGame() {
        _super.call(this, "PlayGame");
    }
    // method to be executed when the scene preloads
    playGame.prototype.preload = function() {
        // alert('hi')
        // loading assets
        // console.log(this.load.image())
        this.load.image("target", "./images/target.png");
        this.load.image("enableKnife", './images/main_knife_disabled.png');
        this.load.image("balloonBurst", './images/small_balloon.png');
        this.load.image("knife", './images/knife.png');
        // this.load.image("enableKnife", './images/knife.png');
        this.load.spritesheet("apple", "./images/apple.png", {
            frameWidth: 75,
            frameHeight: 96
        });
    };
    // method to be executed once the scene has been created
    playGame.prototype.create = function() {
        // at the beginning of the game, both current rotation speed and new rotation speed are set to default rotation speed
        this.currentRotationSpeed = 0;
        this.newRotationSpeed = 0;
        // can the player throw a knife? Yes, at the beginning of the game
        this.canThrow = true;
        // group to store all rotating knives
        this.knifeGroup = this.add.group();
        // adding the knife
        this.enbleKnife = this.add.sprite(game.config.width / 2, game.config.height / 5 * 4.3, "enableKnife");
        // this.knife = this.add.sprite(game.config.width / 2, game.config.height / 5 * 4.3, "knife");
        // adding the target
        this.target = this.add.sprite(game.config.width / 2, 400, "target");
        // moving the target to front
        this.target.depth = 1;
        // starting apple angle
        var appleAngle = Phaser.Math.Between(0, 360);
        // determing apple angle in radians
        var radians = Phaser.Math.DegToRad(appleAngle - 90);
        // adding balloon burst
        // this.balloonBurst = this.add.sprite(this.target.x + (this.target.width / 2) * Math.cos(radians), this.target.y + (this.target.width / 2) * Math.sin(radians), "balloonBurst");
        // // setting balloonBurst's anchor point to bottom center
        // this.balloonBurst.setOrigin(0.5, 0.85);
        // // setting balloonBurst sprite angle
        // this.balloonBurst.angle = appleAngle;
        // // saving balloonBurst start angle
        // this.balloonBurst.startAngle = appleAngle;
        // // balloonBurst depth is the same as target depth
        // this.balloonBurst.depth = 1;
        // // has the balloonBurst been hit?
        // this.balloonBurst.hit = false;
        // adding the apple
        this.apple = this.add.sprite(this.target.x + (this.target.width / 2) * Math.cos(radians), this.target.y + (this.target.width / 2) * Math.sin(radians), "apple");
        // setting apple's anchor point to bottom center
        this.apple.setOrigin(0.5, 0.85);
        // setting apple sprite angle
        this.apple.angle = appleAngle;
        // saving apple start angle
        this.apple.startAngle = appleAngle;
        // apple depth is the same as target depth
        this.apple.depth = 1;
        // has the apple been hit?
        this.apple.hit = false;
        // waiting for player input to throw a knife
        this.input.on("pointerdown", this.throwKnife, this);
        // this is how we create a looped timer event
        var timedEvent = this.time.addEvent({
            delay: gameOptions.changeTime,
            callback: this.changeSpeed,
            callbackScope: this,
            loop: true
        });
        // console.clear();
        // if (!disabledKnife) {
        // $('.game-alert').fadeIn();
        // }
    };

    // method to change the rotation speed of the target
    playGame.prototype.changeSpeed = function() {
        // ternary operator to choose from +1 and -1
        var sign = Phaser.Math.Between(0, 1) == 0 ? -1 : 1;
        // random number between -gameOptions.rotationVariation and gameOptions.rotationVariation
        var variation = Phaser.Math.FloatBetween(-gameOptions.rotationVariation, gameOptions.rotationVariation);
        // new rotation speed
        this.newRotationSpeed = (this.currentRotationSpeed + variation) * sign;
        // setting new rotation speed limits
        this.newRotationSpeed = Phaser.Math.Clamp(this.newRotationSpeed, -gameOptions.maxRotationSpeed, gameOptions.maxRotationSpeed);
    };
    // method to throw a knife
    playGame.prototype.throwKnife = function() {
        var self = this;
        // $('#appleCut').each(function () {
        //     this.play()
        //     this.pause()
        //   })
        //   $('#woodHit').each(function () {
        //     this.play()
        //     this.pause()
        //   })
        //   $('#bonusPoint').each(function () {
        //     this.play()
        //     this.pause()
        //   })
        // can the player throw?
        // $('#appleCut').click()
        $('#appleCut').each(function() {
            this.play()
        })
        if (this.canThrow) {
            // player can't throw anymore
            this.canThrow = false;
            // tween to throw the knife
            this.tweens.add({
                // adding the knife to tween targets
                targets: [this.knife],
                // y destination
                y: this.target.y + this.target.width / 2,
                // tween duration
                duration: gameOptions.throwSpeed,
                // callback scope
                callbackScope: this,
                // function to be executed once the tween has been completed
                onComplete: function(tween) {

                    // at the moment, this is a legal hit
                    var legalHit = true;
                    // getting an array with all rotating knives
                    var children = this.knifeGroup.getChildren();
                    for (var i = 0; i < children.length; i++) {
                        // is the knife too close to the i-th knife?
                        if (Math.abs(Phaser.Math.Angle.ShortestBetween(this.target.angle, children[i].impactAngle)) < gameOptions.minAngle) {
                            // this is not a legal hit
                            legalHit = false;
                            break;
                        }
                    }
                    // is this a legal hit?
                    // $('audio.active').prop('volume', 0.15);
                    if (legalHit) {
                        // alert("legal yes")
                        // restartgame()
                        $('.disabledpointer').css('pointer-events', 'none')
                        $('.moveto-next-ques').attr('disabled', true)
                            // $('audio.active').prop('volume', 1);
                            // if ($(window).width() < 900) {
                            //     setTimeout(function () {
                            //         nextAnswer()
                            //         $('.game-based-temp').css('right', '0')
                            //         $('.gamezone').css('left', '100%')
                            //     }, 1000);
                            // } else {
                            //     setTimeout(function () {
                            //         nextAnswer()
                            //     }, 1000);
                            // }
                            // is the knife close enough to the apple? And the appls is still to be hit?
                        if (Math.abs(Phaser.Math.Angle.ShortestBetween(this.target.angle, 180 - this.apple.startAngle)) < gameOptions.minAngle && !this.apple.hit) {
                            // alert("apple hit yes")
                            $('#balloonHit').click()
                            if ($(window).width() < 900) {
                                setTimeout(function() {
                                    nextAnswer()
                                    $('.game-based-temp').css('right', '0')
                                    $('.gamezone').css('left', '100%')
                                }, 3000);
                            } else {
                                setTimeout(function() {
                                    nextAnswer()
                                }, 3000);
                            }
                            // $('#appleCut').click()
                            bonusPoints = bonusPoints + 5
                            setTimeout(function() {
                                $(".game_bonus").fadeIn()
                                $('#bonusPoint').click()
                            }, 500);
                            setTimeout(function() {
                                knife.destroy();
                            }, 3000);
                            // apple has been hit
                            // this.apple.hit = true;
                            // change apple frame to show one slice
                            // this.apple.setFrame(1);  
                            // add the other apple slice in the same apple posiiton
                            var slice = this.add.sprite(this.apple.x, this.apple.y, "apple", 1);
                            var slice2 = this.add.sprite(this.apple.x, this.apple.y, "apple", 2);
                            // same angle too.
                            slice.angle = this.apple.angle;
                            slice2.angle = this.apple.angle;
                            // and same origin
                            slice.setOrigin(0.5, 1);
                            slice2.setOrigin(0.5, 1);
                            this.apple.visible = false;
                            // tween to make apple slices fall down
                            this.tweens.add({
                                // adding the knife to tween targets
                                targets: [slice, slice2],
                                // y destination
                                y: game.config.height + this.apple.height,
                                // x destination
                                x: {
                                    // running a function to get different x ends for each slice according to frame number
                                    getEnd: function(target, key, value) {
                                        return Phaser.Math.Between(0, game.config.width / 2) + (game.config.width / 2 * (target.frame.name - 1));
                                    }
                                },
                                // rotation destination, in radians
                                angle: 45,
                                // tween duration
                                duration: gameOptions.throwSpeed * 6,
                                // callback scope
                                callbackScope: this,
                                // function to be executed once the tween has been completed
                                // onComplete: function (tween) {
                                //     console.log('tween',tween)
                                //     // var children = this.knifeGroup.getChildren();

                                // }
                            });
                            setTimeout(function() {
                                var appleAngle = 0;
                                game.scene.scenes[0].target.angle = 0;
                                var tryNextPosi = false;
                                if (tryNextPosi) {
                                    appleAngle = appleAngle + 30;
                                }
                                game.scene.scenes[0].apple.startAngle = game.scene.scenes[0].apple.angle = appleAngle;
                                game.scene.scenes[0].apple.hit = false;
                                game.scene.scenes[0].apple.visible = true;
                            }, 3000)
                        } else {
                            if ($(window).width() < 900) {
                                setTimeout(function() {
                                    nextAnswer()
                                    $('.game-based-temp').css('right', '0')
                                    $('.gamezone').css('left', '100%')
                                }, 1000);
                            } else {
                                setTimeout(function() {
                                    nextAnswer()
                                }, 1000);
                            }
                            setTimeout(function() {
                                knife.destroy();
                            }, 1000);
                        }
                        // $('#woodHit').click()
                        // player can now throw again
                        this.canThrow = true;
                        // this.add.sprite(game.config.width / 2, game.config.height / 5 * 4.3, "enableKnife");
                        // adding the rotating knife in the same place of the knife just landed on target
                        var knife = this.add.sprite(this.knife.x, this.knife.y, "knife");
                        // impactAngle property saves the target angle when the knife hits the target
                        knife.impactAngle = this.target.angle;
                        // gameOptions.circleAngleSlotArray.push(knife.impactAngle);
                        // adding the rotating knife to knifeGroup group
                        this.knifeGroup.add(knife);
                        // bringing back the knife to its starting position
                        this.knife.destroy();
                        this.enbleKnife = this.add.sprite(game.config.width / 2, game.config.height / 5 * 4.3, "enableKnife");
                        // setTimeout(function () {
                        //     // $('.gamearea canvas').remove()
                        //     disabledKnife = false
                        //     restartgame()
                        // }, 1000)
                    } else {
                        // alert("legal not")
                        // tween to make the knife fall down
                        this.tweens.add({
                            // adding the knife to tween targets
                            targets: [this.knife],
                            // y destination
                            y: game.config.height + this.knife.height,
                            // rotation destination, in radians
                            rotation: 5,
                            // tween duration
                            duration: gameOptions.throwSpeed * 4,
                            // callback scope
                            callbackScope: this,
                            // function to be executed once the tween has been completed
                            onComplete: function(tween) {
                                // restart the game
                                // this.scene.start("PlayGame")
                                // bringing back the knife to its starting position
                                this.knife.rotation = 0;
                                this.knife.y = game.config.height / 5 * 4;
                                this.canThrow = true;
                                this.currentRotationSpeed = this.newRotationSpeed = 2;
                            }
                        });
                    }
                    // setTimeout(function () {
                    //     updateGame(0,false)
                    // }, 3000);
                }
            });
        }
    };
    // method to be executed at each frame. Please notice the arguments.
    playGame.prototype.update = function(time, delta) {
        // alert()
        // rotating the target
        this.target.angle += this.currentRotationSpeed;
        // getting an array with all rotating knives
        var children = this.knifeGroup.getChildren();
        for (var i = 0; i < children.length; i++) {
            // rotating the knife
            children[i].angle += this.currentRotationSpeed;
            // turning knife angle in radians
            var radians = Phaser.Math.DegToRad(children[i].angle + 90);
            // trigonometry to make the knife rotate around target center
            children[i].x = this.target.x + (this.target.width / 2) * Math.cos(radians);
            children[i].y = this.target.y + (this.target.width / 2) * Math.sin(radians);
        }
        // if the apple has not been hit...
        if (!this.apple.hit) {
            // adjusting apple rotation
            this.apple.angle += this.currentRotationSpeed;
            // turning apple angle in radians
            var radians = Phaser.Math.DegToRad(this.apple.angle - 90);
            // adjusting apple position
            this.apple.x = this.target.x + (this.target.width / 2) * Math.cos(radians);
            this.apple.y = this.target.y + (this.target.width / 2) * Math.sin(radians);
        }
        // this.balloonBurst.angle += this.currentRotationSpeed;
        // // turning apple angle in radians
        // var radians = Phaser.Math.DegToRad(this.balloonBurst.angle - 90);
        // // adjusting apple position
        // this.balloonBurst.x = this.target.x + (this.target.width / 2) * Math.cos(radians);
        // this.balloonBurst.y = this.target.y + (this.target.width / 2) * Math.sin(radians);
        // adjusting current rotation speed using linear interpolation
        this.currentRotationSpeed = Phaser.Math.Linear(this.currentRotationSpeed, this.newRotationSpeed, delta / 1000);
    };
    return playGame;
})(Phaser.Scene);
// pure javascript to scale the game
function resize() {
    var canvas = document.querySelector("canvas");
    if ($(window).width() <= 960 && window.innerHeight < window.innerWidth) {
        var windowWidth = window.innerHeight;
        var windowHeight = window.innerWidth;
    } else {
        var windowWidth = window.innerWidth;
        var windowHeight = window.innerHeight;
    }
    var windowRatio = windowWidth / windowHeight;
    var gameRatio = game.config.width / game.config.height;
    if (windowRatio < gameRatio) {
        canvas.style.width = windowWidth + "px";
        canvas.style.height = (windowWidth / gameRatio) + "px";
    } else {
        canvas.style.width = (windowHeight * gameRatio) + "px";
        canvas.style.height = windowHeight + "px";
    }
}