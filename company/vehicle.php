<?php
require ("./../includes/company-check.php");
?>
<div class="card">
    <div class="card-header text-black h-100 no-radius text-center"> View Vehicles</div>

    <div class="card-body">
        <table class="table table-sm">
            <thead class="table-success">
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
                </tr>
            </thead>
            <tbody id="vehicle-table">


            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
            $.ajax({
                url: "./../api/vehicle-client.php",
                type: "POST",
                cache: false,
                success: function(dataResult) {
                    $('#vehicle-table').html(dataResult);
                }
            });

            });
</script>

