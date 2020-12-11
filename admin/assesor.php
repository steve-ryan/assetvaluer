<div class="card">
    <div class="card-header text-black h-100 no-radius text-center"> Manage Assessors</div>

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
            <tbody id="assesor-table">


            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
            $.ajax({
                url: "./../api/view-assessor.php",
                type: "POST",
                cache: false,
                success: function(dataResult) {
                    $('#assesor-table').html(dataResult);
                }
            });

            // deleting assessor

            $(document).on("click", ".delete", function() {
                var $ele = $(this).parent().parent();
                $.ajax({
                    url: "./../api/delete-assessor.php",
                    type: "POST",
                    cache: false,
                    data: {
                        assessor_id: $(this).attr("data-id")
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
function active_inactive_assessor(val, assessor_id) {
    $.ajax({
        type: 'POST',
        url: './../api/assessors_status.php',
        data: {
            val: val,
            assessor_id: assessor_id
        },
        success: function(result) {
            // console.log(result);
            if (result == 1) {
                $('#sts' + assessor_id).html('Active').css('color', 'green');

            } else {
                $('#sts' + assessor_id).html('Inactive').css('color', 'red');
            }
        }
    });
}
</script>