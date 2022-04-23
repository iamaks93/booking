<?php
include 'vendor/autoload.php';
use App\Controllers\BookingInfoController;
$list = (new BookingInfoController())->list()['bookings'];
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Booking List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="./assests/css/index.css" rel="stylesheet"/>
</head>
<tbody>
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Vehicle</th>
                <th scope="col">Booking Type</th>
                <th scope="col">Booking Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (empty($list)) {

                echo "<tr><td colspan='5'><center><b>No record available</b></center></td></tr>";

            } else {
                foreach ($list as $single) {

                    ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $single['u_name'] ?></td>
                        <td><?= $single['vi_name'] ?></td>
                        <td><?= $single['slot_type'] ?></td>
                        <td><?= $single['booking_date'] ?></td>
                    </tr>
                    <?php

                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</tbody>
<script>
    $(function () {
        $('#btn_bi_book').on('click', function (e) {
            e.preventDefault();
            if (validateForm()) {
                $('#frm_booking_info').submit();
            }
        });

        function validateForm() {
            let focusOn = null;
            $('#frm_booking_info .error').html('');
            let user = $('#ddlb_users');
            let vehicle = $('#ddlb_vehicle');
            let slotType = $('#ddlb_slot_type');
            let date = $('#txt_date');
            if ($.trim(user.val()) === '') {
                $('.error_user').html('Please select user.');
                focusOn = user;
            }
            if ($.trim(vehicle.val()) === '') {
                $('.error_vehicle').html('Please select vehicle.');
                if (!focusOn) {
                    focusOn = vehicle;
                }
            }
            if ($.trim(slotType.val()) === '') {
                $('.error_slot').html('Please select slot type.');
                if (!focusOn) {
                    focusOn = slotType;
                }
            }
            if ($.trim(date.val()) === '') {
                $('.error_date').html('Please select date.');
                if (!focusOn) {
                    focusOn = date;
                }
            }
            if (focusOn) {
                $(focusOn).focus();
                return false;
            }
            return true;
        }
    });
</script>
</html>

