$(function () {
    $(".search").on("keyup", function () {
        var keywords = $(this).val();
        //console.log("Searching for: " + keywords);

        if (keywords.trim() !== "") {
            $.ajax({
                url: $(this).data("url"),
                type: "GET",
                dataType: "JSON",
                data: {
                    search: keywords,
                },
                success: function (response) {
                    // Insert the returned HTML into the results div
                     $("#results").html(response.html);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                },
            });
        } else {
            window.location.href = $(this).data("url");
        }
    });
    $(".status").on("change", function () {
        var status = $(this).val();
            $.ajax({
                url: $("#search").data("url"),
                type: "GET",
                dataType: "JSON",
                data: {
                    status: status,
                },
                success: function (response) {
                    // Insert the returned HTML into the results div
                     $("#results").html(response.html);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                },
            });

    });
    $("#editCategory").on("show.bs.modal",function(e){
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
                    $("#editCategory .modal-body").html(response.html)
                }
            },
        });
    });
    $(".status-toggle").on("click", function () {
        var status = $(this).val();
        var id = $(this).data("id");
        console.log(status);
        $.ajax({
            url: $(this).data("url"),
            type: "POST",
            dataType: "json",
            data: {
                id: id,
                status: status,
            },
            success: function (response) {
                location.reload();
            }
        });
    });
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
});
// ================================================================Custom Functions================================================================
function generateSlug() {

    // Get the name input value
    let name = document.getElementById("name").value;
    console.log(name)

    // Convert to lowercase
    let slug = name.toLowerCase();

    // Replace spaces with hyphens
    slug = slug.replace(/\s+/g, "-");

    // Remove special characters
    slug = slug.replace(/[^a-z0-9-]/g, "");

    // Remove multiple consecutive hyphens
    slug = slug.replace(/-+/g, "-");

    // Remove leading and trailing hyphens
    slug = slug.replace(/^-+|-+$/g, "");

    // Set the slug value
    document.getElementById("slug").value = slug;
}

