$(function () {
    $(".status-toggle").on("click", function () {
        var status = $(this).val();
        var id = $(this).data("id");
        var verification_status = $(this).val();
        var type = $(this).data("type");
        console.log(status, id,verification_status,type);
        $.ajax({
            url: $(this).data("url"),
            type: "POST",
            dataType: "json",
            data: {
                id: id,
                type: type,
                status: status,
                verification_status: verification_status
            },
            success: function (response) {
                location.reload();
            }
        });
    });
});