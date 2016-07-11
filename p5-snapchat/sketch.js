var snapSketch = function( p ) {

	var containerWidth, containerHeight;
	var baseImg;
	var gridSize = 19;
	var circleSize;
	var velocityLimit = 3;

	p.setup = function() {
		containerWidth = document.getElementById( 'snap-sizer' ).offsetWidth; // get sizer element sizes
		containerHeight = document.getElementById( 'snap-sizer' ).offsetHeight;
		p.createCanvas(containerWidth, containerHeight); // create canvas to match sizer element size
		circleSize = p.width/35;
		baseImg = p.loadImage('snapcode.png');  // Load the image
		corners = p.loadImage('corners.png');  // Load the image

		system = new ParticleSystem(); // Create particle system
		system.addParticles(); // add particles to system
	};

	p.draw = function() {
		p.clear();
		p.image(baseImg, 0, 0, p.width, p.height); // Display base snapchat image
		system.bounce(); // Check if particles need to bounce off each other
		system.run(); // Run particle system
		p.image(corners, 0, 0, p.width, p.height); // Display base snapchat image
	};

	//////////////////////////////////////////////// Particle class

	var Particle = function(position) {
		this.gridPosition = position.copy();
		this.originalPos = p.createVector(p.width/gridSize*this.gridPosition.x,  p.width/gridSize*this.gridPosition.y);
		this.realPos = p.createVector(p.width/gridSize*this.gridPosition.x,  p.width/gridSize*this.gridPosition.y);
		this.velocity = p.createVector(0,0);
	};

	Particle.prototype.run = function() {
		this.update();
		this.display();
	};

	// Method to update
	Particle.prototype.update = function() {
		var mouseVector = p.createVector(p.mouseX, p.mouseY);
		if ( p5.Vector.dist(this.realPos, mouseVector) < p.width/5 && mouseVector.mag() != 0){
			this.velocity = p5.Vector.sub(this.realPos, mouseVector);
			this.velocity.limit(velocityLimit);
		}

		if ( this.realPos.x < 0 ) {
			this.realPos.x = p.width;
		} else if (this.realPos.x > p.width ) {
			this.realPos.x = 0;
		}else if ( this.realPos.y < 0 ) {
			this.realPos.y = p.height;
		} else if (this.realPos.y > p.height ) {
			this.realPos.y = 0;
		}

		if ( mouseVector.x < 0 || mouseVector.x > p.width || mouseVector.y < 0 || mouseVector.y > p.height ) {
			this.realPos = p5.Vector.lerp(this.realPos, this.originalPos, 0.05);
			this.velocity.set(0,0);
		} else {
			this.realPos.add( this.velocity );
		}

	};

	// Method to display
	Particle.prototype.display = function() {
		p.noStroke();
		p.fill(34);
		p.ellipse(this.realPos.x, this.realPos.y, circleSize, circleSize);
	};

	//////////////////////////////////////////////// Particle System Class

	var ParticleSystem = function() {
		this.particles = [];
		this.positions = [];
		this.snapcodeCoords();
	};

	// Method to add Snapcode coordinates
	ParticleSystem.prototype.snapcodeCoords = function() {
		this.positions.push(p.createVector(6,1));
		this.positions.push(p.createVector(7,1));
		this.positions.push(p.createVector(9,1));
		this.positions.push(p.createVector(11,1));
		this.positions.push(p.createVector(12,1));
		this.positions.push(p.createVector(15,1));

		this.positions.push(p.createVector(2,2));
		this.positions.push(p.createVector(3,2));
		this.positions.push(p.createVector(5,2));
		this.positions.push(p.createVector(6,2));
		this.positions.push(p.createVector(7,2));
		this.positions.push(p.createVector(8,2));
		this.positions.push(p.createVector(9,2));
		this.positions.push(p.createVector(12,2));
		this.positions.push(p.createVector(14,2));
		this.positions.push(p.createVector(15,2));

		this.positions.push(p.createVector(13,3));
		this.positions.push(p.createVector(15,3));

		this.positions.push(p.createVector(1,4));
		this.positions.push(p.createVector(2,4));
		this.positions.push(p.createVector(14,4));
		this.positions.push(p.createVector(16,4));
		this.positions.push(p.createVector(17,4));
		this.positions.push(p.createVector(18,4));

		this.positions.push(p.createVector(1,5));
		this.positions.push(p.createVector(2,5));

		this.positions.push(p.createVector(4,5));
		this.positions.push(p.createVector(5,5));
		this.positions.push(p.createVector(15,5));
		this.positions.push(p.createVector(17,5));

		this.positions.push(p.createVector(3,6));
		this.positions.push(p.createVector(16,6));
		this.positions.push(p.createVector(18,6));

		this.positions.push(p.createVector(1,7));
		this.positions.push(p.createVector(14,7));
		this.positions.push(p.createVector(15,7));
		this.positions.push(p.createVector(17,7));
		this.positions.push(p.createVector(18,7));

		this.positions.push(p.createVector(17,8));

		this.positions.push(p.createVector(1,9));
		this.positions.push(p.createVector(2,9));
		this.positions.push(p.createVector(3,9));
		this.positions.push(p.createVector(18,9));

		this.positions.push(p.createVector(4,10));
		this.positions.push(p.createVector(15,10));
		this.positions.push(p.createVector(18,10));

		this.positions.push(p.createVector(2,11));
		this.positions.push(p.createVector(4,11));
		this.positions.push(p.createVector(17,11));
		this.positions.push(p.createVector(18,11));

		this.positions.push(p.createVector(1,12));
		this.positions.push(p.createVector(3,12));
		this.positions.push(p.createVector(17,12));

		this.positions.push(p.createVector(2,13));
		this.positions.push(p.createVector(18,13));

		this.positions.push(p.createVector(1,14));
		this.positions.push(p.createVector(18,14));

		this.positions.push(p.createVector(1,15));
		this.positions.push(p.createVector(2,15));
		this.positions.push(p.createVector(15,15));

		this.positions.push(p.createVector(2,16));
		this.positions.push(p.createVector(5,16));
		this.positions.push(p.createVector(6,16));
		this.positions.push(p.createVector(7,16));
		this.positions.push(p.createVector(12,16));
		this.positions.push(p.createVector(15,16));
		this.positions.push(p.createVector(17,16));

		this.positions.push(p.createVector(2,17));
		this.positions.push(p.createVector(3,17));
		this.positions.push(p.createVector(5,17));
		this.positions.push(p.createVector(6,17));
		this.positions.push(p.createVector(9,17));
		this.positions.push(p.createVector(13,17));
		this.positions.push(p.createVector(14,17));

		this.positions.push(p.createVector(6,18));
		this.positions.push(p.createVector(9,18));
		this.positions.push(p.createVector(10,18));
		this.positions.push(p.createVector(12,18));
		this.positions.push(p.createVector(13,18));
		this.positions.push(p.createVector(14,18));
		this.positions.push(p.createVector(15,18));
	};

	// Method to add particles
	ParticleSystem.prototype.addParticles = function() {
		for (var i = this.positions.length-1; i >= 0; i--) {
			this.particles.push(new Particle(this.positions[i]));
		}
	};

	// Method to bounce particles off eachother
	ParticleSystem.prototype.bounce = function() {
		for (var i = this.particles.length-1; i >= 0; i--) {

			var particleOne = this.particles[i];

			for (var j = this.particles.length-1; j >= 0; j--) {

				var particleTwo = this.particles[j];

				if ( p5.Vector.dist(particleOne.realPos, particleTwo.realPos) < circleSize ) {

					if ( i != j ){
						particleOne.velocity = p5.Vector.sub(particleOne.realPos, particleTwo.realPos);
						particleOne.velocity.limit(velocityLimit);
					}
				}
			}
		}
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

		for (var i = system.particles.length-1; i >= 0; i--) {
			var particle = system.particles[i];
			particle.originalPos.set(p.width/gridSize*particle.gridPosition.x, p.width/gridSize*particle.gridPosition.y);
			particle.realPos.set(p.width/gridSize*particle.gridPosition.x, p.width/gridSize*particle.gridPosition.y);
		}

		p.resizeCanvas(containerWidth, containerHeight);
		circleSize = p.width/35;
	};

};

var snapP5 = new p5(snapSketch, 'snap-container');
