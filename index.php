<?php
include 'vendor/autoload.php';
use App\Controllers\DB;
use App\Controllers\BookingInfoController;
$viewInfo = (new BookingInfoController())->view();
?>
<html lang="eng">
<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<tbody>
<div class="container">
    <div class="row">
        <form class="row g-3" autocomplete="off" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">User Name</label>
                 <?=$viewInfo['vehicleList']?>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Vehicle Name</label>
                <?=$viewInfo['userList']?>
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Slot Type</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Select option</option>
                    <option value="1">Half Day</option>
                    <option value="2">Full Day</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Booking Date</label>
                <input type="date" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Book</button>
            </div>
        </form>
    </div>
</div>
</tbody>
</html>

