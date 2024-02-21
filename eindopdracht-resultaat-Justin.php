<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            margin-top: 100px;
            width: 350px;
            background-color: white;
            border-radius: 5px;
            padding: 20px 60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        p {
            color: #333;
        }
        a {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
        $aantalKilometers = $_POST['km'];
        $minutenAanFile = $_POST['file'];

        class Voertuig {
            public $snelheid;
            public $bandenspanning;

            public function __construct($bandenspanning, $snelheid) {
                $this->bandenspanning = $bandenspanning;
                $this->snelheid = $snelheid;
            }
        }

        $fiets = new Voertuig($_POST['fietsbandenspanning'], $_POST['keuze']);
        $scooter = new Voertuig($_POST['scooterbandenspanning'], $_POST['snorofbrom']);

        if ($fiets->snelheid == 15) {
            $typeFiets = "normale fiets";
        } elseif ($fiets->snelheid == 25) {
            $typeFiets = "elektrische fiets";
        }
        
        if ($scooter->snelheid == 25) {
            $typeScooter = "snorfiets";
        } elseif ($scooter->snelheid == 45) {
            $typeScooter = "bromfiets";
        }

        $restSnelheidFiets = ($fiets->bandenspanning / 100) * $fiets->snelheid;
        $restSnelheidScooter = ($scooter->bandenspanning / 100) * $scooter->snelheid;

        $reistijdFiets = ($aantalKilometers / $restSnelheidFiets) * 60;

        $aantalminutenScooter = ($aantalKilometers / $restSnelheidScooter) * 60;
        // Hieronder wordt de file word er nog bij opgeteld voor de scooter
        $reistijdScooter = $aantalminutenScooter + $minutenAanFile;
    ?>
        <div class='container'>
            <h1>Resultaat</h1>
    <?php
            echo "<hr>";
            echo "<p><strong>De reis</strong></p>";
            echo "<p>Reis: ".$aantalKilometers." KM<br>";
            echo "File: ".$minutenAanFile. " minuten</p>";
            echo "<hr>";
            echo "<p><strong>Elektrische of normale fiets</strong></p>";
            echo "<p>Keuze: ".ucfirst($typeFiets)."<br>";
            echo "Bandenspanning: ".$fiets->bandenspanning."% </p>";
            echo "<hr>";
            echo "<p><strong>Snor- of bromfiets</strong></p>";
            echo "<p>Keuze: ".ucfirst($typeScooter)."<br>";
            echo "Bandenspanning: ".$scooter->bandenspanning."% </p>";
            echo "<hr>";
            echo "<p><strong>Reistijden</strong></p>";
            echo "<p>Reistijd van de ".$typeScooter.": ".round($reistijdScooter)." minuten<br>";
            echo "Reistijd van de ".$typeFiets.": ".round($reistijdFiets)." minuten</p>";
            echo "<hr>";
            echo "<p><strong>Reisadvies</strong></p>";
            if ($reistijdScooter > $reistijdFiets) {
                echo "<p>De <strong>" .$typeFiets. "</strong> is sneller</p>";
            } else {
                echo "<p>De <strong>".$typeScooter. "</strong> is sneller</p>"; 
            }
            echo "<hr>";
    ?>
            <br>
            <a href="eindopdracht-formulier-Justin.php">Terug</a>
        </div>
</body>