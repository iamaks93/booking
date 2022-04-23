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

    const insert = get_querystring_value_by_name('insert');
    if (insert) {
        if (insert == 1) {
            if (confirm('Booking added successfully. Do you want to add more?') == true) {
                window.location = 'index.php';
            } else {
                window.location = 'bookings.php';
            }
            return false;
        } else if (insert == 2) {
            alert('Selected vehicle already booked by someone else for this period. Please select another one.');
        } else {
            alert('Sorry, Failed to add booking information. Please try again!');
        }
        changeBrowserURlWithoutPageRefresh('index.php');
    }

    /**
     * Return querystring value from url
     * @param  name query string parameter
     * @param  url
     * @author Ankit
     * @return (String) Return value of query string if present
     *                  else if return null when parameter is not present
     *                  else blank when value is not set
     */
    function get_querystring_value_by_name(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    /**
     * Change browser url without page refreshing
     * @param url string full url
     * @author Akshay Mahajan
     * @return (bool) true/false
     */
    function changeBrowserURlWithoutPageRefresh(url) {

        if (url != undefined && url != "" && history.pushState) {
            window.history.pushState({ path: url }, '', url);
            return true;
        }
        return false;
    }
});