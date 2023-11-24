<section class="container py-3" id="countdownTimer">
    <?php
    $now = new DateTime();
    $purpose = get_field('timer');
    $date = new DateTime($purpose);
    ?>
    <div class="d-flex justify-content-center gap-lg-4 gap-1 align-items-center flex-wrap">
        <div>
            <h6 class="text-dark fs-3 mb-lg-0">فروش
                <span class="text-primary">شگفت انگیز</span>
            </h6>
        </div>
        <?php
        echo '
            <div class="d-flex justify-content-center gap-2 align-items-center text-center text-white">
                <div id="hours" class="timer_box rounded py-2 bg-primary lh-1">
                    <div class="fw-bolder p-1 fs-2">' . $now->format('H') . '</div>ساعت
                </div>
                <span class="text-dark fs-3">:</span>
                <div id="days" class="timer_box rounded py-2 bg-primary lh-1">
                    <div class="fw-bolder p-1 fs-2">' . $now->format('d') . '</div>روز
                </div>
            </div>
        ';
        ?>
    </div>
</section>
<?php
//                <div id="seconds" class="timer_box rounded py-2 bg-primary lh-1">
//                    <div class="fw-bolder p-1 fs-2">' . $now->format('s') . '</div>ثانیه
//                </div>
//                <span class="text-dark fs-3">:</span>
//                <div id="minutes" class="timer_box rounded py-2 bg-primary lh-1">
//                    <div class="fw-bolder p-1 fs-2">' . $now->format('i') . '</div>دقیقه
//                </div>
//<script>
//    // Define the timer function
//    function updateTimer() {
//        // Retrieve the deadline timestamp in the user's local time zone
/*        var deadline = new Date("<?php echo $purpose; ?>").getTime();*/
//        // Calculate the time zone offset in minutes
//        var timezoneOffset = new Date().toLocaleDateString('fa-IR');
//        // Calculate the remaining time
//        var now = new Date().getTime();
//        var remaining = deadline - now;
//
//        let countdownSection = document.getElementById('countdownTimer');
//        if (remaining > 0) {
//            countdownSection.classList.add('d-none');
//        }
//        // Calculate the days, hours, minutes, and seconds remaining
//        var days = Math.floor(remaining / (1000 * 60 * 60 * 24));
//        var hours = Math.floor((remaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//        var minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
//        var seconds = Math.floor((remaining % (1000 * 60)) / 1000);
//
//        // Update the timer HTML elements
//        document.getElementById("days").innerHTML = '<div class="fw-bolder p-1 fs-2">' + days + '</div>روز';
//        document.getElementById("hours").innerHTML = '<div class="fw-bolder p-1 fs-2">' + hours + '</div>ساعت';
//        document.getElementById("minutes").innerHTML = '<div class="fw-bolder p-1 fs-2">' + minutes + '</div>دقیقه';
//        document.getElementById("seconds").innerHTML = '<div class="fw-bolder p-1 fs-2">' + seconds + '</div>ثانیه';
//    }
//
//    // Call the timer function every second
//    setInterval(updateTimer, 1000);
//</script>
?>

