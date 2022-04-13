<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>

<body>

    <button type="button" class="cycle_transaction_btn" unit="MHA PM-829" idsatu="230" iddua="250">View Rit 1</button>

    <button type="button" class="cycle_transaction_btn" unit="MHA PM-830" idsatu="250" iddua="270">View Rit 2</button>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).on('click', '.cycle_transaction_btn', function() {
        var unit = $(this).attr("unit");
        var idsatu = $(this).attr("idsatu");
        var iddua = $(this).attr("iddua");
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Isi_geofence/ajax_CyleTransaction",
            data: {
                unit: unit,
                idsatu: idsatu,
                iddua: iddua
            },
            success: function(result) {
                if (result) {
                    $('#myModal .modal-content').html(result);
                    $('#myModal').modal("show");
                }
            }
        });
    });
</script>

</html>