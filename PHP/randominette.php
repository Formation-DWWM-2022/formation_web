<?php

$randomTime = function (DateTime $start, DateTime $end, $resolution = 1) {

    if ($resolution instanceof DateInterval) {
        $interval   = $resolution;
        $resolution = ($interval->m * 2.62974e6 + $interval->d) * 86400 + $interval->h * 60 + $interval->s;
    }

    $startValue = floor($start->getTimestamp() / $resolution);
    $endValue   = ceil($end->getTimestamp() / $resolution);
    $random     = mt_rand($startValue, $endValue) * $resolution;

    return new DateTime('@' . $random);
};

if (!empty($_POST)) {
    $start    = Datetime::createFromFormat("Y-m-d\TH:i", $_POST['date-start']);
    $end      = Datetime::createFromFormat("Y-m-d\TH:i", $_POST['date-end']);
    $random = $randomTime($start, $end, 60);
}

$app = ['Julien', 'Laurent', 'Theo', 'Davy', 'Xavier', 'Mathieu', 'Frederic', 'Nithachan', 'Sulyman', 'Tom', 'Martial', 'Prosper'];
?>

<?php var_dump($app) ?>

<form method="post">
    <input type="datetime-local" name="date-start" value="<?php isset($_POST['date-start']) ? $_POST['date-start'] : '' ?>">
    <input type="datetime-local" name="date-end" value="<?php isset($_POST['date-start']) ? $_POST['date-end'] : '' ?>">
    <input type="submit">
</form>

<h3><?= $random->format('Y-m-d H:i'); ?></h3>
<h3><?= $app[random_int(0, 11)] ?></h3>