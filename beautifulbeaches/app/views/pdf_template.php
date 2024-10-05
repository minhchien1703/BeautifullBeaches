<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        h1, th, td { text-align: center; }
        .section { margin-bottom: 20px; }
        .section h2 { border-bottom: 1px solid #000; }

    </style>
</head>
<body>
    <h1>Beach Details</h1>
    <div class="section">
        <h2>Name</h2>
        <p><?= $beach['name'] ?></p>
    </div>
    <div class="section">
        <h2>Country</h2>
        <p><?= $beach['country_name'] ?></p>
    </div>
    <div class="section">
        <h2>Description</h2>
        <p><?= $beach['description'] ?></p>
    </div>
    <div class="section">
        <h2>Traits</h2>
        <?php foreach ($traits as $trait): ?>
            <p><strong><?= $trait['trait_name'] ?>:</strong> <?= $trait['trait_description'] ?></p>
        <?php endforeach; ?>
    </div>
    <div class="section">
        <h2>More Info</h2>
        <?php foreach ($infos as $info): ?>
            <p><strong><?= $info['more_info_name'] ?>:</strong> <?= $info['more_info_content'] ?></p>
        <?php endforeach; ?>
    </div>
    <div class="section">
        <h2>Weather</h2>
        <table style="width:100%">
        <thead>
            <tr>
                <th style="width:20%"></th>
                <th style="width:20%">AVG. HIGH</th>
                <th style="width:30%">AVG. LOW</th>
                <th style="width:30%">RAINY DAYS</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($weathers as $weather): ?>
            <tr>
                <td><?= $weather['month_name'] ?></td>
                <td><?= $weather['avg_high'] ?>°C</td>
                <td><?= $weather['avg_low'] ?>°C</td>
                <td><?= $weather['rainy_days'] ?></td>
            </tr>;
        <?php endforeach; ?>
        </tbody>
    </div>
    <div class="section">
        <h2>Flights</h2>
        <table style="width:100%">
        <thead>
            <tr>
                <th style="width:20%">FROM</th>
                <th style="width:20%">TO</th>
                <th style="width:30%">DEPARTURE TIME</th>
                <th style="width:30%">ARRIVAL TIME</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($flights as $flight): ?>
            <tr>
                <td><?= $flight["from"] ?></td>
                <td><?= $flight["to"] ?></td>
                <td><?= $flight["depart_date"] ?></td>
                <td><?= $flight["arrive_date"] ?></td>
                </tr>;
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</body>
</html>
