<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Algemene opmaak */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .content {
            width: 20%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Opmaak voor kop */
        .kop {
            margin-bottom: 20px;
        }

        .kop h1 {
            color: #333;
        }

        /* Opmaak voor secties */
        .weg,
        .fiets,
        .scooter {
            margin-bottom: 30px;
        }

        .weg h2,
        .fiets h2,
        .scooter h2 {
            color: #444;
            margin-bottom: 10px;
        }

        /* Opmaak voor labels en input-velden */
        input[type="number"],
        input[type="radio"],
        select {
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="number"],
        select {
            display: block;
        }

        /* Opmaak voor de submitknop */
        .submitbutton {
            text-align: center;
        }

        #verstuur {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #verstuur:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="kop">
            <h1>Gegevens voor reisadvies</h1>
        </div>
        <hr>
        <form method="post" action="eindopdracht-resultaat-Justin.php">
            <div class="weg">
                <h2>De weg</h2>
                <br>
                <label for="km">Lengte (in KM):</label>
                <input required type="number" name="km" id="km">
                <br>
                <label for="file">Vertraging door file (in minuten):</label>
                <input required type="number" name="file" id="file">
            </div>
            <hr>
            <div class="fiets">
                <h2>Elektrische of normale fiets</h2>
                <br>
                <div>
                    <input type="radio" value="15" name="keuze" id="15">
                    <label for="15">Niet Elektrisch (fietssnelheid = 15km/u)</label>
                </div>
                <div>
                    <input type="radio" value="25" name="keuze" id="25">
                    <label for="25">Elektrisch (fietssnelheid = 25km/u)</label>
                </div>
                <br>
                <div>
                    <label for="bandenspanning">Bandenspanning (in %):</label>
                    <input required type="number" name="fietsbandenspanning" id="fietsbandenspanning">
                </div>
            </div>
            <hr>
            <div class="scooter">
                <h2>Snor- of bromfiets</h2>
                <label for="">Keuze:</label>
                <select required name="snorofbrom" id="snorofbrom">
                    <option value="25">25 KM/U (Snorfiets)</option>
                    <option value="45">45 KM/U (Bromfiets)</option>
                </select>
                <br>
                <label for="scooterbandenspanning">Bandenspanning (in %):</label>
                <input required type="number" name="scooterbandenspanning" id="scooterbandenspanning">
            </div>
            <hr>
            <div class="submitbutton">
                <input id="verstuur" type="submit" value="Geef Reisadvies">
            </div>
        </form>
    </div>
</body>

</html>