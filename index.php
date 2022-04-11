<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css" />
		<link rel="stylesheet" href="css/pico.min.css" />
		<title>Virtual Dice</title>
	</head>
	<body>
		<main class="container">
			<h1>Virtual Dice</h1>
			<h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, dolores!</h5>
			<form  method="post">
				<div class="grid">
					<label for="range">
						How many dice ?
						<input type="range" min="0" max="9" value="1" id="range" name="range" />
					</label>
					<select name="dice" id="dice" required>
						<option value="" selected >  
							<?php isset( $_POST["dice"]) ?  
								 $_POST["dice"] :
								"Which kind of die ?" ;
							?>  
						</option>
						<option value=4>d4</option>
						<option value=6>d6</option>
						<option value=8>d8</option>
						<option value=10>d10</option>
						<option value=12>d12</option>
						<option value=20>d20</option>
					</select>
				</div>
				<input type="submit" value="Roll" />
			</form>
			<article>
				You roll <?php echo $_POST["range"]; ?>  	d<?php echo $_POST["dice"]; ?>
				and obtain <?php  HandfulOfDice($_POST["range"], $_POST["dice"]) ?> 
				
			
			</article>
		</main>
	</body>
</html>

<?php 
class Dice{
	private int $type;
	public int $value = 1;
    
	public function __construct($type)
	{
		$this->type = $type;
		$this->value = rand(1,$type);
	}

	public function rolledDice(){
		return (int) ($this->value);
	}

}

function HandfulOfDice(int $n, int $type) {
	$total=0;
	for ($i=0; $i <$n ; $i++) { 
		$die = new Dice($type);
		$total += $die->rolledDice();
	
	}
	echo( $total);
}

?>