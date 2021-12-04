<?php

require('vendor/autoload.php');

use Codenixsv\CoinGeckoApi\CoinGeckoClient;

$client = new CoinGeckoClient();
$data = $client->coins()->getMarkets('usd');
$global_data = $client->globals()->getGlobal();

$total_market = number_format($global_data["data"]["total_market_cap"]["usd"]);
$volume = number_format($global_data["data"]["total_volume"]["usd"]);
$btc_dominance = number_format($global_data["data"]["market_cap_percentage"]["btc"], 2, ".", ",");
$change = number_format($global_data["data"]["market_cap_change_percentage_24h_usd"], 2, ".", ",");

foreach ($data as $ch) {
  $changes[] = number_format($ch["price_change_percentage_24h"], 2, ".", ",");
  $names[] = $ch["symbol"];
  $images[] = $ch["image"];
  $prices[] = $ch["current_price"];
}

$combined = array_map(null, $changes, $names, $images, $prices);
asort($combined);

$high = array_slice($combined, -5);
$low = array_slice($combined, 0, 5);

function pills()
{
  global $high;
  global $low;

  foreach ($high as $h) {
    echo '
          <span class="small text-success font-weight-bold text-uppercase"><i class="fas fa-caret-up text-success"></i>
          ' . $h[0] . '% <span class="text-dark">' . $h[1] . '</span>
      </span>';
  }
  foreach ($low as $l) {
    echo '
          <span class="small text-danger font-weight-bold text-uppercase"><i class="fas fa-caret-down text-danger"></i>
          ' . $l[0] . '% <span class="text-dark">' . $l[1] . '</span>
      </span>';
  }
}

function getTable()
{
  global $data;
  $counter = 1;
  foreach ($data as $line) {
    echo '<tr>
        <th>' . $counter . '</td>
        <td>' . '<img class="mr-2" style="width: 25px" src="' . $line["image"] . '"/>' . " " . $line["name"] . " " .
      '<span class="small font-weight-bold  text-uppercase">' . $line["symbol"] . '</span></td>
        <td>$' . number_format($line["current_price"], 3, ".", ",") . '</td>
        <td>';
    if (substr(strval($line["price_change_percentage_24h"]), 0, 1) == "-") {
      echo '<i class="fas fa-caret-down text-danger"></i><span class="text-danger font-weight-normal">' . number_format($line["price_change_percentage_24h"], 2, ".", ",") . '%</span></td>';
    } else {
      echo '<i class="fas fa-caret-up text-success"></i><span class="text-success font-weight-normal">' . number_format($line["price_change_percentage_24h"], 2, ".", ",") . '%</span></td>';
    }
    echo '<td>$' . number_format($line["total_volume"]) . '</td>
                  <td>$' . number_format($line["market_cap"]) . '</td>
              </tr>';
    $counter++;
  }
}


