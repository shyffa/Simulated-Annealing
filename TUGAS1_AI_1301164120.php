<?php
  function nilai ($x_1 , $x_2)
  {
    $fungsi = -abs(sin($x_1)*cos($x_2)*exp(abs(1-(sqrt(pow($x_1,2)+pow($x_2,2))/3.14))));
    return $fungsi;
  }

  $tempera = 1000000;
  $tempera_min = 0.00000000001;
  $alpha = 0.999;
  // mencari nilai random antara -10 sampai 10
  $x1 = lcg_value()*20-10;
  $x2 = lcg_value()*20-10;

  $old_cost = nilai($x_1,$x_2);
  $best_cost = $old_cost;

  while ($tempera > $tempera_min) {
    //mecari nilai random antara -2 sampai 2 dan ditambahkan nilai random sebelumnya
      $x_1_new = lcg_value()*4-2 + $x_1;
      $x_2_new = lcg_value()*4-2 + $x_2;

      if ($x_1_new > 10 ){
        $x_1_new = 10;
      }

      if ($x_2_new > 10) {
        $x_2_new = 10;
      }

      if ($x_1_new < -10) {
        $x_1_new = -10;
      }

      if ($x_2_new < -10) {
        $x_2_new = -10;
      }
        $new_cost = nilai($x_1_new,$x_2_new);
        if ($new_cost < $old_cost)
        {
            $old_cost = $new_cost;
            $best_cost = $new_cost;
            $x_1_best = $x_1_new;
            $x_2_best = $x_2_new;
        }else{
      		$delta1=($new_cost-$old_cost);
		      $delta2 = -1 * $delta1;
      		if (exp($delta2/$tempera) > rand(0,1)){
      			$old_cost = $new_cost;
            $x_1 = $x_1_new;
            $x_2 = $x_2_new;
      		}
        }
        $tempera = $tempera * $alpha;
  }
  echo "<br>"; echo "Cost paling minimum = ".$best_cost;
  echo "<br>"; echo "Nilai Variable X1 = ".$x_1_best;
  echo "<br>"; echo "Nilai Variable X2 = ".$x_2_best;
?>
