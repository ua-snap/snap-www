<?php

require 'src/ChartsFetcher.php';

header('Content type: application/json');
echo ChartsFetcher::fetchChart(
    $_GET['community'],
    $_GET['dataset'],
    $_GET['scenario'],
    $_GET['variability']
);

?>