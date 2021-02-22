<!DOCTYPE html>
<html>
 <head>
  <title>PHP Challenge-- type juggling pro</title>
 </head>
 <body>
    <H1> Can The Tortoise Beat The Hare? </H1>
    <img src="tortoisehare.jpg" alt="hmmm">
    <br>
    <?php
      $racetrack = json_decode($_GET['racetrack'], false, 2);
      if ($racetrack === NULL ) {
        echo "Consider giving me a valid JSON";
        return;
      } 
      if (count(get_object_vars($racetrack)) !== 2) {
        echo "Not a regulated circular racetrack";
        return;
      }
      $tortoise = $racetrack->{NULL};
      $hare = $racetrack->{NULL};
      for($i = 0; $i < 100; $i++) { //100 loops around the track
        $tortoise = $racetrack->{$tortoise};
        $hare = $racetrack->{$racetrack->{$hare}};
      }
      if($tortoise != NULL && $hare == NULL) {
        echo "Success! Tortoise wins! Flag is flag{@r0und_AnD_ar0und_deY_G0}";
      } else {
        echo "Hare wins!";
      }
    ?>
 </body>
</html>