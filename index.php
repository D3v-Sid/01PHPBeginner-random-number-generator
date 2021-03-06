<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" href="./favicon.png">
		<link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css" />
		<link rel="stylesheet" href="css/pico.min.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ShimilSAbraham/Cube.CSS@45d9c3f/cube.css">

		<title>Virtual Dice</title>
	</head>
	<body>
		<main class="container">
			<h1>Virtual Dice</h1>
			<form  method="post">
				<div class="grid">
					<label for="range">
						How many dice ?
						<input type="number" min="1" max="9" value= <?php  echo isset($_POST["range"])? $_POST["range"] : 1  ?>  id="range" name="range" />
					</label>

					<label for ="dice">Which kind ?
						<select name="dice" id="dice" required>
							<option value=4>d4</option>
							<option value=6 selected>d6</option>
							<option value=8>d8</option>
							<option value=10>d10</option>
							<option value=12>d12</option>
							<option value=20>d20</option>
						</select>
					</label>
				</div>
				<input type="submit" value="Roll"  class="button"/>
			</form>
			<article>
				You roll <?php echo $_POST["range"]; ?> d<?php echo $_POST["dice"]; ?>
and obtain...  <h1> <?php  $total = HandfulOfDice($_POST["range"], $_POST["dice"]);   echo array_sum($total); ?>  ! </h1>
				<ul>
					<?php
						foreach ($total as $value) {
							echo "		
							<div class='cube'>
								<div class='front blue-l f-fly'></div>
								<div class='side blue-d s-fly'></div>
								<div class='top blue t-fly' >  <span> $value  </span> </div>
							</div>";
						}
					?>


				</ul>
				
				
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
	return $total;
}

?>

<style>
	.button{
  		background-color: #1a75ff !important;
	}
	.button:hover{
		background-color:#80b3ff !important;

	}

	h1{
		max-height: 1rem;
	}

	.container{
		height: 100vh !important;
	}

	article{
		margin-top: 0;
		padding:  1rem;
	}
	ul{
		display: flex;
		flex-direction: row;
		gap:1rem;
		flex-wrap: wrap;
	}
	li{
		list-style: none !important;
		border: 1px solid black;
		border-radius: 10%;
		padding: 1.5rem 2rem;
		background: white;

	}

	.top{
		text-align: center;
	}

	span{
		display: block;
		font-size: 3rem;
		color: white;
		text-align: center;
		transform: rotate(180deg);
	}


</style>