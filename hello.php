<!DOCTYPE HTML>
<html lang="eng">
	<head>
		<meta charset="UTF-8">
		<title>Getting Started in php</title>
	</head>
	
	<body>
		<?php
			echo '<h1>Hello World!</h1>' ;
			$body_temp = 98.6;
			echo "<p>Body temperature is $body_temp degrees Fahrenheit";
			$body_temp = 37.0 ;
			echo " ( $body_temp degrees Celcius ).</p>";
			
			$phrase = 'The truth is rarely pure' ;
			$author = 'Oscar Wilde' ;
			echo $phrase ;
			echo "<p>It is often said that <q>$phrase</q> </p>" ;
			$phrase = $phrase.' and never simple' ;
			echo "<p><q>$phrase</q> <cite>$author</cite></p>" ;
			
			$days = array( 'Monday','Tuesday','Wednesday');
			foreach($days as $value) {echo "&bull; $value" ;}
			$months = array('jan'=>'January', 'feb'=>'February','mar'=>'March');
			echo '<dl>';

			foreach($months as $key => $value)
			{echo "<dt>$key<dd>$value";}
			echo'</dl>';

			$cars = array('Dodge'=>'Viper','Chevrolet'=>'Camaro','Ford'=>'Mustang');
			echo '<dl><dt>Original Element Order:<dd>';
			foreach($cars as $key => $value)
			{echo '&bull; ',$key.' '.$value;}

			asort($cars);
			echo '<dt>Sorted Into Value Order<dd>';
			foreach($cars as $key => $value)
			{ echo '&bull;',$key.' '.$value;}
			
			ksort($cars);
			echo'<dt> Sorted Into Key Order :<dd> ';
			foreach($cars as $key => $value)
			{echo '&bull;',$key.''.$value;}
			echo '</dl>';


		?>
	</body>
</html>