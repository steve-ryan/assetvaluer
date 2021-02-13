<?php
require ("./../includes/company-check.php");
?>
<div class="card">
    <div class="card-header text-black h-100 no-radius text-center"> View Your Client</div>

    <div class="card-body">
        <table class="table table-sm">
            <thead class="table-success">
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">email address</th>
                    <th scope="col">Phone Number</th>
                    
                </tr>
            </thead>
            <tbody id="customer-table">


            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
            $.ajax({
                url: "./../api/company-client.php",
                type: "POST",
                cache: false,
                success: function(dataResult) {
                    $('#customer-table').html(dataResult);
                }
            });

            });
</script>

