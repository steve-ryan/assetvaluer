<?php
require ("./../includes/company-check.php");
?>
<div class="card">
    <div class="card-header text-black h-100 no-radius text-center"> Reports</div>

    <div class="card-body">
        <form action="" method="" id="reportForm" name="reportForm">
            <table id="table-direct" class="table table-sm">
                <thead  class="table-success">
                    <tr>
                        <th scope="col">Reg No</th>
                        <th scope="col">Model</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Type</th>
                        <th scope="col">Y.O.M</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Chassis No</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Accident Cond'</th>
                        <th scope="col">Download Report'</th>
                    </tr>
                </thead>
                <tbody id="report-table">


                </tbody>
            </table>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $.ajax({
        url: "./../api/report-client.php",
        type: "POST",
        cache: false,
        success: function(dataResult) {
            $('#report-table').html(dataResult);
        }
    });

});
</script>
