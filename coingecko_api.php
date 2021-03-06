<?php
require_once 'php/api_functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="author" content="Mišel Kaurin">
  <title>CoinCap</title>
  <link rel="icon" href="img/favicon-32x32.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/b-1.6.5/datatables.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>


  <div class="container" style="margin-top: 100px;">
    <div class="row mb-4 justify-content-between">
      <?php pills(); ?>
    </div>
    <div class="row mb-4">
      <div class="w-100 p-4 text-center">
        <h2 class="mb-3">Cryptocurrency Prices by Market Capitalization</h2>
        <p class="lead mb-3 text-black-50">
          The global crypto market cap increased
          <span class="text-success font-weight-bold"><?php echo $change; ?>%</span> the last
          day.
        </p>
        <p class="text-muted">powered by <span class="font-weight-bold text-default font-italic"><u>CoinGecko API</u></span></p>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card z-depth-2 h-100 py-2 bg-info">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="small font-weight-bold text-white text-uppercase mb-1">
                  Total Market Cap
                </div>
                <div class="h5 mb-0 font-weight-bold text-white">
                  $ <?php echo $total_market; ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card z-depth-2 h-100 py-2 bg-default">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="small font-weight-bold text-white text-uppercase mb-1">
                  24h Volume
                </div>
                <div class="h5 mb-0 font-weight-bold text-white">
                  $ <?php echo $volume; ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-coins fa-2x text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card z-depth-2 h-100 py-2 bg-warning">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="small font-weight-bold text-white text-uppercase mb-1">
                  BTC Dominance
                </div>
                <div class="h5 mb-0 font-weight-bold text-white">
                  <?php echo $btc_dominance; ?> %
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-chart-line fa-2x text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <h3 class="ml-2">Top 100 Cryptoassets</h3>
    </div>
    <div class="mb-4">
      <table class="table table-responsive-xl" id="myTable">
        <thead class="text-white stylish-color text-center">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">24h</th>
            <th scope="col">24h Volume</th>
            <th scope="col">Mkt Cap</th>
          </tr>
        </thead>
        <tbody>
          <?php getTable(); ?>
        </tbody>
      </table>
    </div>
  </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/b-1.6.5/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable({
      "pageLength": 20
    });
  });
</script>

</html>