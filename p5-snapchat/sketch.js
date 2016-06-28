var snapSketch = function( p ) {

	var x = 100;
	var y = 100;
	var containerWidth, containerHeight;
	var baseImg;
	var gridSize = 18;

	p.setup = function() {
		containerWidth = document.getElementById( 'snap-sizer' ).offsetWidth; // get sizer element sizes
		containerHeight = document.getElementById( 'snap-sizer' ).offsetHeight;
		p.createCanvas(containerWidth, containerHeight); // create canvas to match sizer element size
		baseImg = p.loadImage('snapcode.png');  // Load the image

		system = new ParticleSystem(); // Create particle system

		for (var i = 0; i < 300; i++ ) {
			system.addParticle(); // add particles to system
		}
	};

	p.draw = function() {
		p.image(baseImg, 0, 0, p.width, p.height);
		system.run();
	};

	//////////////////////////////////////////////// Particle class

	var Particle = function() {
		this.position = p.createVector( p.random(gridSize), p.random(gridSize) );
	};

	Particle.prototype.run = function() {
		this.update();
		this.display();
	};

	// Method to update
	Particle.prototype.update = function() {
	};

	// Method to display
	Particle.prototype.display = function() {
		p.noStroke();
		p.fill(0);
		p.ellipse(p.width/gridSize*this.position.x, p.width/gridSize*this.position.y, 12, 12);
	};

	//////////////////////////////////////////////// Particle System Class

	var ParticleSystem = function() {
		this.particles = [];
	};

	// Method to add particles
	ParticleSystem.prototype.addParticle = function() {
		this.particles.push(new Particle());
	};

	// Method to run particles
	ParticleSystem.prototype.run = function() {
		for (var i = this.particles.length-1; i >= 0; i--) {
			var p = this.particles[i];
			p.run();
		}
	};

	//////////////////////////////////////////////// Resize Stuff

	p.windowResized = function() {
		containerWidth = document.getElementById( 'snap-sizer' ).offsetWidth;
		containerHeight = document.getElementById( 'snap-sizer' ).offsetHeight;
		p.resizeCanvas(containerWidth, containerHeight);
	};

};

var snapP5 = new p5(snapSketch, 'snap-container');
