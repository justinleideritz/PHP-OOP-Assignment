<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
                /* Algemene opmaak */
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .resultaat {
            width: 40%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        h2 {
            color: #444;
            margin-bottom: 10px;
        }

        /* Opmaak voor resultaten */
        .resultaat p {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="resultaat">
    <h1>Resultaat</h1>
    <h2>Informatie meegegeven</h2>
    <?php
class Reisadvies {
    private $lengte;
    private $file;
    private $fietsBandenspanning;
    private $snelheid;
    private $scooterBandenspanning;
    private $snorofbrom;

    public function __construct($lengte, $file, $bandenspanning, $keuze, $scooterbandenspanning, $snorofbrom) {
        $this->lengte = $lengte;
        $this->file = $file;
        $this->fietsBandenspanning = $bandenspanning / 100;
        $this->snelheid = isset($keuze) ? $keuze : "";
        $this->scooterBandenspanning = $scooterbandenspanning / 100;
        $this->snorofbrom = $snorofbrom;
    }

    public function calculateTravelTime() {
        $snelheidFiets = $this->fietsBandenspanning * $this->snelheid;
        $snelheidScooter = $this->scooterBandenspanning * $this->snelheid;

        $travelTimeScooter = round(($this->lengte / $snelheidScooter) * 60);
        $travelTimeFiets = round(($this->lengte / $snelheidFiets) * 60);

        return [
            'lengte' => $this->lengte,
            'file' => $this->file,
            'fietsBandenspanningResult' => $this->fietsBandenspanning * 100,
            'snelheid' => $this->snelheid,
            'scooterBandingspanningResult' => $this->scooterBandenspanning * 100,
            'snorofbrom' => $this->snorofbrom,
            'travelTimeScooter' => $travelTimeScooter,
            'travelTimeFiets' => $travelTimeFiets,
            'recommendation' => $snelheidFiets > $snelheidScooter ? "Fiets is beter" : "Snorfiets/Brommer is beter"
        ];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calculator = new Reisadvies(
        $_POST['km'],
        $_POST['file'],
        $_POST['fietsbandenspanning'],
        isset($_POST['keuze']) ? $_POST['keuze'] : "",
        $_POST['scooterbandenspanning'],
        $_POST['snorofbrom']
    );

    $result = $calculator->calculateTravelTime();

    echo "Aantal KM for de reis: " . $result['lengte'] . " KM <br>";
    echo "File:  " . $result['file'] . " minuten<br>";
    echo "<br>";
    echo "Fiets Bandenspanning: " . $result['fietsBandenspanningResult'] . "%<br>";
    echo "(15KM/u = fiets & 25KM/u = elektrische fiets): " . $result['snelheid'] . "KM/u<br>";
    echo "<br>";
    echo "Scooter bandenspanning: " . $result['scooterBandingspanningResult'] . "%<br>";
    echo "Snorfiets (25KM/u) of brommer (45KM/u): " . $result['snorofbrom'] . "KM/u<br>";

    echo "<br>";
    echo "Reistijd in minuten met scooter: " . $result['travelTimeScooter'] . " minuten<br>";
    echo "Reistijd in minuten met fiets: " . $result['travelTimeFiets'] . " minuten<br>";
    echo "<br>";
    echo "Reisadvies:<br>";
    echo "<strong>" .$result['recommendation'];
    echo "<br>";
    echo "<br>";
}

?>
</div>
    <a href="eindopdracht-formulier-Justin.php">Terug naar formulier</a>
</body>
</html>