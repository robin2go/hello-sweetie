<?php
/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
Plugin Name: Hello Dolly
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.6
Author URI: http://ma.tt/
*/
/*
Plugin Name: Hello Sweetie (Hello Dolly Variant)
Description: This is my personal variant I call Hello Sweetie. When activated you will randomly see witty one liners and references from <cite>Doctor Who</cite> in the upper right of your admin screen on every page. I've bumped up the font size and weight, and changed the color to Tardis Blue, of course. Note that I've only overwritten the original plugin content; I have _not_ changed the actual title or working code because that would require more effort and patience than I actually have. Yes, I'm that lazy.
Variant Author: Robin Smail
Version: 1.2
Author URI: http://github.com/robin2go/
*/

function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "Hello, Sweetie
Wibbly wobbly timey wimey ...stuff
Don't blink. Blink and you're dead.
Fantastic!
Allons-y!
Geronimo!
Every life is a pile of good things and bad things.
The bad things don't always spoil the good things and make them unimportant.
Hello, Sweetie!
We're all stories in the end. Just make it a good one.
Bowties are cool.
Are you my mummy?
It's bigger on the inside.
The name you choose, it's like, a promise you make.
Trust me, I'm the Doctor.
Bad wolf. I take the words. I scatter them in time and space.
Count the shadows.
Come along, Pond.
I am and always will be the optimist. The hoper of far-flung hopes. The dreamer of improbable dreams.
Pain and loss, they define us as much as happiness or love.
Whether it's a world or a relationship everything has its time. And everything ends.
For some people small, beautiful events are what life is all about.
It's a fez. I wear a fez now.
You and me. Time and space. You watch us run!
I've never met anyone who wasn't important.
Demons run when a good man goes to war.
Anybody remotely interesting is mad, in some way or another.
Must be a hell of a scary crack in your wall.
I am a madman with a box.
Don't give up. Not ever. Not for one single day.
Be safe, if you can be. But always be amazing.
You're Scottish. Fry something!
Beans are evil. Bad, bad beans.
Fish sticks and custard.
I am being extremely clever up here and there's no one to stand around and look impressed.
He'll be fine. He's a Time Lord.
I'm going to need..a pot of coffee, twelve jammy dodgers and a fez. 
She's my carer. She cares so I don't have to.
I'm looking for a blonde in a Union Jack. A specific one, mind you. I didn't just wake up this morning with a craving.
And now no one's ever heard of you. Didn't you used to be somebody?
SUT UP I'm making deductions it's very exciting.
He prefers to be called Stormageddon dark lord of all.
I speak baby.
These are my top operatives: the Legs, the Nose, and Mrs. Robinson.
I hate you. — No, you don't.
Do you think I care so little that betraying me would make a difference?
And sometimes very rarely impossible things just happen and we call them miracles.
Trust me, just nod when he stops for breath.
Nice to meet you, Rose, run for your life!
I never know why. I only know who.
I see keep out signs as suggestions rather than actual orders. Like dry clean only.
Run, you clever boy... and remember.
Just this once, everybody lives.
Always take a banana to a party, Rose.
Who looks at a screwdriver and thinks ooh this could be a little more sonic?
I hate being wrong in public.
Gallifrey falls no more. 
Be brave.
You're the only mystery worth solving.
I know — dinosaurs! On a spaceship!
Good men don't need rules.
I am making sense. You just aren't keeping up.
I'm burning up a sun just to say goodbye.
Spoilers";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph
function dolly_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 18px;
		font-weight: bold;
		color: #003B6F;
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );

?>
