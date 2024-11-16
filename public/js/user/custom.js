$(function () {
    $(".delete").on("click", function () {
        var id = $(this).data("id");
        $.ajax({
            url: $(this).data("url"),
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function (response) {
                if (response.status) {
                    location.reload();
                }
            },
        });
    });
    $("#userDetails").on("show.bs.modal", function (e) {
        let button = $(e.relatedTarget);
        var id = button.data("id");
        $.ajax({
            url: button.data("url"),
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function (response) {
                if (response.status) {
                    // Insert the returned HTML into the results div
                    $("#userDetails .modal-body").html(response.html);
                }
            },
        });
    });
    $("#userUpdate").on("show.bs.modal", function (e) {
        let button = $(e.relatedTarget);
        var id = button.data("id");
        $.ajax({
            url: button.data("url"),
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function (response) {
                if (response.status) {
                    $("#userUpdate .modal-body").html(response.html);
                }
            },
        });
    });
});
