<?php
include 'vendor/autoload.php';
use App\Controllers\DB;
use App\Controllers\BookingInfoController;
$type = $_GET['type'] ?? 'view';
$viewInfo = (new BookingInfoController())->view();
if(isset($_POST['ddlb_users'])) {
     $insert =  (new BookingInfoController())->store();
     $redirectURL = $_SERVER['PHP_SELF'].'?insert='.$insert;
     header("location: {$redirectURL}");
     exit;
}
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Make Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="<?=DOMAIN_URL?>assests/css/index.css" rel="stylesheet"/>
</head>
<tbody>
<div class="container">
    <div class="row">
        <form class="row g-3" autocomplete="off" method="post" id="frm_booking_info"
              action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">User Name</label>
                <?= $viewInfo['userList'] ?>
                <p class="error error_user"></p>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Vehicle Name</label>
                <?= $viewInfo['vehicleList'] ?>
                <p class="error error_vehicle"></p>
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Booking Type</label>
                <?= $viewInfo['slotType'] ?>
                <p class="error error_slot"></p>
            </div>
            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Booking Date</label>
                <input type="date" class="form-control" id="txt_date" name="txt_date">
                <p class="error error_date"></p>
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-primary" id="btn_bi_book" name="btn_bi_book" value="Book"/>
            </div>
        </form>
    </div>
</div>
</tbody>
<script src="<?=DOMAIN_URL?>assests/js/index.js"></script>
</html>

