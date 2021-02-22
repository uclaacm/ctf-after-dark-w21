<!DOCTYPE html>
<html>
 <head>
  <title>PHP Challenge-- type juggling pro</title>
 </head>
 <body>
    <H1> Can The Tortoise Beat The Hare? </H1>
    <img src="tortoisehare.jpg" alt="hmmm">
    <br>
    <p> Code here
      $racetrack = json_decode($_GET['racetrack'], false, 2);
      if ($racetrack === NULL ) {
        //NOPE
      } 
      if (count(get_object_vars($racetrack)) !== 2) {
        //NOPE
      }
      $tortoise = $racetrack->{NULL};
      $hare = $racetrack->{NULL};
      for($i = 0; $i < 100; $i++) { //100 loops around the track
        $tortoise = $racetrack->{$tortoise};
        $hare = $racetrack->{$racetrack->{$hare}};
      }
      if($tortoise != NULL && $hare == NULL) {
        //Nice!
      } else {
        //RIP
      }
    </p>
 </body>
</html>