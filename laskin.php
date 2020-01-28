<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Bangers|Fira+Sans&display=swap" rel="stylesheet">

  <style> /* Määritellään sivun tyyli */
    body {
      background-color: #7f0af5;
      font-family: Fira Sans;
      padding-top: 10px;
    }

    h1 {
      color: darkblue; font-size: 40pt;
      padding-top: 20pt;
      padding-bottom: 20pt;
      font-family: Bangers;
      animation: blinkingText 0.3s infinite;
      opacity: 1;
    }

    @keyframes blinkingText{
      0%{     color: red;    }
      49%{    color: pink; }
      60%{    color: blue; }
      99%{    color: green;  }
      100%{   color: yellow;    }
    }

    .container {
      width: 450px;
      margin: auto;
      background-color: #e314d5;
      opacity: 0.7;
      text-align: center;
      padding-bottom: 10px;
      border: 2px hotpink solid;
    }

  </style>
  <title>Laskin</title>
</head>
<body>
  <div class="container">
    <h1>Tämä on laskin.</h1>

    <!-- Luodaan lomake laskimen olennaisille toiminnoille-->
    <form action="laskin.php" method="post">
      Syötä luku: <input type="text" name="luku1" value="<?php echo $_POST["luku1"];?>" style="background-color: #fc6ff5; border: 2px #63015e solid;"><br><br>

      <input type="radio" name="operator" value="add"> +
      <input type="radio" name="operator" value="subtract"> -
      <input type="radio" name="operator" value="multiply"> *
      <input type="radio" name="operator" value="divide"> /<br><br>

      Syötä toinen luku: <input type="text" name="luku2" value="<?php echo $_POST["luku2"];?>" style="background-color: #fc6ff5; border: 2px #63015e solid;"><br><br>
      <input type="submit" value="Go!" style="background-color: #fc6ff5; border: 2px #63015e solid;"><br><br>
    </form>
    <?

    // Tässä määritellään käyttäjän syöttämien arvojen perusteella
    // muuttujat helpompaa käsittelyä varten.
    $ope = $_POST['operator'];
    $num1 = $_POST['luku1'];
    $num2 = $_POST['luku2'];

    // Aluksi  tarkistetaan onko molempiin kenttiin syötetty jotain.
    if (($_POST["luku1"] == "") || ($_POST["luku2"] == "")) {
      echo "Syötä luku molempiin kenttiin. ";
    }
    // Tarkistetaan onko käyttäjä syöttänyt numeerisia arvoja.
    elseif ((is_numeric($num1) == false) || (is_numeric($num2) == false)) {
    echo 'Syötä vain numeerisia arvoja.';
    }
    // Tarkistetaan käyttäjän valitsema operaattori ja suoritetaan sen perusteella
    // laskutoimitus.
    elseif ($ope == "add"){
      echo ($num1). " + " . ($num2) . " = " . ($num1 + $num2);
      $tulos = ($num1 + $num2);
    }
    elseif ($ope == "subtract"){
      echo ($num1). " - " . ($num2) . " = " . ($num1 - $num2);
    }
    elseif ($ope == "multiply"){
      echo ($num1). " * " . ($num2) . " = " . ($num1 * $num2);
    }
    elseif ($ope == "divide"){
      echo ($num1). " / " . ($num2) . " = " . ($num1 / $num2);
    }
    // Tulostetaan mahdollisten virheiden pohjalta käyttäjälle ohjeet.
    elseif (E_ALL == true){
      echo "Syötäthän vain numeerisia arvoja. Muista myös valita laskutoimituksessa käytettävä operaattori.";
    }


    ?>


  </div>

</body>
</html>
