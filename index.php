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
						<input type="number" min="1" max="9" value= <?php  echo isset($_POST["range"])? $_POST["range"] : 1  ?>  id="range" name="range" />
					</label>

					<label for ="dice">Which kind ?
						<select name="dice" id="dice" required>
							<option value=4>d4</option>
							<option value=6>d6</option>
							<option value=8>d8</option>
							<option value=10>d10</option>
							<option value=12>d12</option>
							<option value=20>d20</option>
						</select>
					</label>
				</div>
				<input type="submit" value="Roll" />
			</form>
			<article>
				You roll <?php echo $_POST["range"]; ?>  	d<?php echo $_POST["dice"]; ?>
				and obtain...  <h3> <?php  HandfulOfDice($_POST["range"], $_POST["dice"]); ?>  ! </h3>		
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
	$total=array();
	for ($i=0; $i <$n ; $i++) { 
		$die = new Dice($type);
		array_push( $total, $die->rolledDice());
	}
	echo( array_sum($total));
}

?>

<style>
	article{
		margin-top: 0;
		padding:  1rem;
	}
</style>