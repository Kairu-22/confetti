tsParticles.load({
    id: "tsparticles",
    options: {
      tsParticles.load("tsparticles", {
        "fullScreen": {
          "zIndex": 1
        },
        "emitters": [
          {
            "position": {
              "x": 0,
              "y": 30
            },
            "rate": {
              "quantity": 5,
              "delay": 0.15
            },
            "particles": {
              "move": {
                "direction": "top-right",
                "outModes": {
                  "top": "none",
                  "left": "none",
                  "default": "destroy"
                }
              }
            }
          },
          {
            "position": {
              "x": 100,
              "y": 30
            },
            "rate": {
              "quantity": 5,
              "delay": 0.15
            },
            "particles": {
              "move": {
                "direction": "top-left",
                "outModes": {
                  "top": "none",
                  "right": "none",
                  "default": "destroy"
                }
              }
            }
          }
        ],
        "particles": {
          "color": {
            "value": [
              "#ffffff",
              "#FF0000"
            ]
          },
          "move": {
            "decay": 0.05,
            "direction": "top",
            "enable": true,
            "gravity": {
              "enable": true
            },
            "outModes": {
              "top": "none",
              "default": "destroy"
            },
            "speed": {
              "min": 10,
              "max": 50
            }
          },
          "number": {
            "value": 0
          },
          "opacity": {
            "value": 1
          },
          "rotate": {
            "value": {
              "min": 0,
              "max": 360
            },
            "direction": "random",
            "animation": {
              "enable": true,
              "speed": 30
            }
          },
          "tilt": {
            "direction": "random",
            "enable": true,
            "value": {
              "min": 0,
              "max": 360
            },
            "animation": {
              "enable": true,
              "speed": 30
            }
          },
          "size": {
            "value": {
              "min": 0,
              "max": 2
            },
            "animation": {
              "enable": true,
              "startValue": "min",
              "count": 1,
              "speed": 16,
              "sync": true
            }
          },
          "roll": {
            "darken": {
              "enable": true,
              "value": 25
            },
            "enable": true,
            "speed": {
              "min": 5,
              "max": 15
            }
          },
          "wobble": {
            "distance": 30,
            "enable": true,
            "speed": {
              "min": -7,
              "max": 7
            }
          },
          "shape": {
            "type": [
              "circle",
              "square"
            ],
            "options": {}
          }
        }
      });
    },
});

//or

// Important! If the index is not in range 0...<array.length, the index will be ignored.

// after initialization this can be used.

/* tsParticles.setOnClickHandler(@callback); */

/* this will be fired from all particles loaded */

// tsParticles.setOnClickHandler((event, particles) => {
//     /* custom on click handler */
// });

// // now you can control the animations too, it's possible to pause and resume the animations
// // these methods don't change the config so you're safe with all your configurations
// // domItem(0) returns the first tsParticles instance loaded in the dom
// const particles = tsParticles.domItem(0);

// // play will start the animations, if the move is not enabled it won't enable it, it just updates the frame
// particles.play();

// // pause will stop the animations
// particles.pause();