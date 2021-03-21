</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('status')) { ?>
            alertify.set('notifier', 'position', 'top-center');
            alertify.success("<?= session()->getFlashdata('status') ?>");
            var duration = 10;
            var msg = alertify.message('Auto-dismiss in ' + duration + ' seconds.', 10, function() {
                clearInterval(interval);
            });
            var interval = setInterval(function() {
                msg.setContent("<?= session()->getFlashdata('status') ?>");
            }, 1000);
        <?php } ?>
    });
</script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('status')) { ?>
            swal({
                title: "Amount to be payed!",
                text: "<?= session()->getFlashdata('status') ?>",
                button: "Close",
            });
        <?php } ?>

    });
</script>
</body>

</html>