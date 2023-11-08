$(document).ready(() => {
    // initialize jquery data table
    $('#employeeList').DataTable();

    // Define an array of query parameter names to remove
    const queriesToRemove = [
        "add", "update", "delete",
        "success",
        "duplicate", "addError", "updateError", "conflictError",
        "fname", "lname", "email", "phone", "jobTitle"
    ];

    // remove alert query parameters so users won't see it
    // Parse the current query parameters
    const url = window.location.href;
    const urlParts = url.split("?");
    if (urlParts.length > 1) {
        const queryString = urlParts[1];
        const params = queryString.split("&");
        const updatedParams = [];

        // Iterate through the parameters and only keep those not in the removal list
        for (let i = 0; i < params.length; i++) {
            const param = params[i].split("=");
            if (queriesToRemove.indexOf(param[0]) === -1) {
                updatedParams.push(params[i]);
            }
        }

        // Reconstruct the URL without the removed parameters
        const newURL = urlParts[0] + "?" + updatedParams.join("&");

        // Replace the URL
        history.replaceState(null, null, newURL);
    }
});