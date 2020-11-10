$(document).ready(function () {

    $.ajaxSetup({
        headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    insert_form();
    view_data();
    edit_data();
    delete_data();
    interval_load();
});

function interval_load() {
    setInterval(function () {
        $("#msg").removeClass().html('').slideOut("slow");
        $("#insert-form-msg").removeClass().html('').slideOut("slow");
    }, 5000);
}

function insert_form() {
    $(document).on('click', '#add-data', function (e) {
        e.preventDefault();
        var title = $('#title').val();
        var description = $("#disc").val();
        var times = $("#times").val();

        $.ajax({
            url: "/add",
            type: "post",
            data: { title: title, description: description, times: times },
            success: function (data) {
                if (data) {
                    if (data) {
                        $("#insert-form-msg").removeClass("alert alert-danger").html(" ");
                        $("#title-error").removeClass("text-danger").html(" ");
                        $("#desc-error").removeClass("text-danger").html(" ");
                        $("#time-error").removeClass("text-danger").html(" ");
                    }
                    $("#show-data").prepend('<tr><td width="10%">' + data[0].times + '</td><td class="text-bold">' + data[0].title + '</td> <td width="21%"><button type = "submit" class= "btn btn-info view-btn" id="' + data[0].id + '" data-toggle="modal" data-target="#view" >view</button > <button type="submit" class="btn btn-success edit-btn" id="' + data[0].id + '" data-toggle="modal" data-target="#Edit"> Edit </button> <button type="button" class="btn btn-danger delete-btn" id="' + data[0].id + '"> Delete </button> </td ></tr>');
                    $("#AddForm").trigger("reset");
                    $("#msg").addClass("alert alert-success text-center").html("Task Succssfully Added in The Table!").slideDown();
                    $("#insert-form-msg").addClass("alert alert-success").html("Task Successfully Created !!").slideDown();
                }
            },
            error: function (error) {
                $("#insert-form-msg").addClass("alert alert-danger").html(error.responseJSON.message).slideDown();
                $("#title-error").addClass("text-danger").html(error.responseJSON.errors.title);
                $("#desc-error").addClass("text-danger").html(error.responseJSON.errors.description);
                $("#time-error").addClass("text-danger").html(error.responseJSON.errors.times);
            }
        });
    });
}

function view_data() {
    $(document).on('click', '.view-btn', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "show/" + id,
            method: "GET",
            success: function (data) {
                $("#timeData").html(data.times);
                $("#titleData").html(data.title);
                $("#desData").html(data.description);
            }
        });
    });
}

function edit_data() {
    $(document).on('click', ".edit-btn", function () {
        var id = $(this).attr("id");
        var el = $(this);
        $.ajax({
            url: "edit/" + id,
            method: "GET",
            success: function (data) {
                $(".edit-data-save").attr("id", data.id);
                $("#edit-title").val(data.title);
                $("#edit-times").val(data.times);
                $("#edit-desc").val(data.description);
                el.parents('tr').attr('id', "myid" + id);
            }
        });
    });

    $(document).on("click", ".edit-data-save", function (e) {
        e.preventDefault();
        var id = $(this).attr("id");
        var title = $('#edit-title').val();
        var times = $('#edit-times').val();
        var description = $('#edit-desc').val();

        $.ajax({
            url: "edit/" + id,
            type: "POST",
            data: { title: title, times: times, description: description },
            success: function (data) {
                if (data) {
                    $("#Edit").modal('hide');
                    $(".edit-form").trigger("reset");
                    $("#msg").removeClass().html(" ");
                    $("#msg").addClass("alert alert-success text-center").html("Task Successfully Updated!").slideDown();
                    $("tr#myid" + id + " td.updated-time").text(data.times);
                    $("tr#myid" + id + " td.updated-title").text(data.title)
                }
            },
            error: function (error) {
                $('#edit-msg').addClass('alert alert-danger').html('Something Wents wrong!');
                $('#edit-title-error').addClass("text-danger").html(error.responseJSON.errors.title);
                $('#edit-title-error').addClass("text-danger").html(error.responseJSON.errors.times);
                $('#edit-title-error').addClass("text-danger").html(error.responseJSON.errors.description);
            }
        });
    });

}

function delete_data() {
    $(document).on('click', '.delete-btn', function (e) {
        if (confirm("Are You Sure")) {
            var id = $(this).attr('id');
            var el = $(this);
            $.ajax({
                url: "task/" + id,
                type: "get",
                success: function (data) {
                    $('#msg').removeClass().html(' ');
                    $('#msg').addClass('alert alert-danger text-center').html('Task Successfully Deleted !!').slideDown();
                    el.closest('tr').slideUp('slow');
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

    });
}
