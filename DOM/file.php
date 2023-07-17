<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP with Ajax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    #er-message {
        background: #ADAEAD;
        color: #F70E0E;
        padding: 10px;
        margin: 10px;
        display: none;
        position: absolute;
        right: 15px;
        top: 15px;

    }

    #ok-message {
        background: #ADAEAD;
        color: #24991A;
        padding: 10px;
        margin: 10px;
        display: none;
        position: absolute;
        right: 15px;
        top: 15px;

    }

    #modal {
        background: rgba(0, 0, 0, 0.7);
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100%;
        display: none;
    }

    #modal-content {
        background: white;
        position: relative;
        width: 30%;
        top: 20%;
        left: calc(50% - 15%);
        padding: 15px;

    }
    </style>
</head>

<body>
    <br><br>
    <table class="table">
        <tr>
            <th style="text-align: center">PHP with ajax</th>
        </tr>
        <tr>
            <form id="addform">
                Name : <input type="text" id="fname"></input>
                <input type="submit" id="submit-button" value="save"></input>
            </form>
            <br><br>
        </tr>
    </table>

    <table class=" table table-striped center" id="table-data" style="width:60%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Operations</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Puru</td>
        </tr>

        <tr>
            <td>2</td>
            <td>pari</td>
        </tr>
    </table>
    <div id="ok-message"></div>
    <div id="er-message"></div>
    <!-- Modal -->
    <div id="modal">
        <!-- Modal content-->
        <div id="modal-content">

            <h4 class="modal-title">Update Form</h4>
            <table>
                <br><br>
            </table>
            <br>
            <button type='button' id='c-btn' class=' btn btn-danger pull-right mr-3'>close</button>
            <br><br>

        </div>
    </div>
</body>
<script>
$(document).ready(function() {
    // $("#load-data").on("click",loadtable);
    $("#submit-button").on("click", saving);
    $(document).on("click", ".del-btn", del_data); //to delete dynamic data we use selector this way
    $(document).on("click", ".edit-btn", edit_data);
    $("#c-btn").on("click", close);
    $(document).on("click", ".edit-save", update_data);
});

function loadtable() {
    $.ajax({
        url: "ajax_load.php",
        type: "POST",
        success: function(data) {
            $("#table-data").html(data);
        }
    })
}
loadtable();

function saving(e) {
    e.preventDefault();
    var fname = $("#fname").val();

    if (fname == "") {
        $("#er-message").html("All fields are required").slideDown(3000);
        $("#ok-message").slideUp();

    } else {

        $.ajax({
            url: "ajax-insert.php",
            type: "POST",
            data: {
                first_name: fname
            },
            success: function(data) {
                if (data == 1) {
                    loadtable();
                    $("#addform").trigger("reset"); //to reset the input field

                    $("#ok-message").html("Data inserted").slideDown();
                    $("#er-message").slideUp();
                } else {
                    $("#er-message").html("Cant save.").slideDown();
                    $("#ok-message").slideUp();
                }
            }

        })
    }
}


function del_data() {
    if (confirm("Do you really want to delete?")) {

        var eid = $(this).data("id");

        var element = this; //passing the specific del btn class

        $.ajax({
            url: "ajax-del.php",
            type: "POST",
            data: {
                id: eid
            },
            success: function(data) {
                if (data == 1) {
                    $(element).closest("tr").fadeOut(2000);
                } else {
                    $("#er-message").html("coudn't Delete").slideDown();
                    $("#ok-message").slideUp();
                }
            }
        })
    }
}

function edit_data() {
    var eid = $(this).data("id");
    var element = this;

    $("#modal").show();

    $.ajax({
        url: "ajax_edit.php",
        type: "POST",
        data: {
            id: eid
        },
        success: function(data) {
            $("#modal-content table").html(data);
        }
    })
}

function close() {
    $("#modal").hide();
}

function update_data() {
    var eid = $("#edit-id").val();
    var ename = $("#edit-fname").val();
    $.ajax({
        url: "ajax_update.php",
        type: "POST",
        data: {
            id: eid,
            name: ename
        },
        success: function(data) {
            if (data == 1) {
                $("#modal").hide();
                loadtable();
            } else {
                $("#er-message").html("coudn't Update").slideDown();
                $("#ok-message").slideUp();
            }

        }
    })
}
</script>

</html>
