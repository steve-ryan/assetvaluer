<?php
require("./../includes/admin-check.php");
?>
<div class="card">
    <div class="card-header text-black h-100 no-radius text-center"> Manage Company/Insurance</div>

    <div class="card-body">
        <table class="table table-sm">
            <thead class="table-success">
                <tr>

                    <th scope="col">#ID</th>
                    <th scope="col">name</th>
                    <th scope="col">email address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Change status</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="company-table">


            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
            $.ajax({
                url: "./../api/view-company.php",
                type: "POST",
                cache: false,
                success: function(dataResult) {
                    $('#company-table').html(dataResult);
                }
            });

            // deleting company

            $(document).on("click", ".delete", function() {
                var $ele = $(this).parent().parent();
                $.ajax({
                    url: "./../api/delete-company.php",
                    type: "POST",
                    cache: false,
                    data: {
                        company_id: $(this).attr("data-id")
                    },
                    success: function(dataResult) {
                        console.log("success");
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            $ele.fadeOut().remove();
                            location.reload();
                        }
                    }
                });

            });

            });
</script>

<script>
function active_inactive_company(val, company_id) {
    $.ajax({
        type: 'POST',
        url: './../api/company_status.php',
        data: {
            val: val,
            company_id: company_id
        },
        success: function(result) {
            // console.log(result);
            if (result == 1) {
                $('#sts' + company_id).html('Active').css('color', 'green');

            } else {
                $('#sts' + company_id).html('Inactive').css('color', 'red');
            }
        }
    });
}
</script>