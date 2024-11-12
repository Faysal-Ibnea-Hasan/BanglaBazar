// ================================================================Custom Functions================================================================
function generateSlug() {

    // Get the name input value
    let name = document.getElementById("name").value;
    //console.log(name)

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