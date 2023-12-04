document.addEventListener("DOMContentLoaded", function () {
    const apartmentFilter = document.getElementById("apartmentFilter");
    const tableRows = document.querySelectorAll(".table tbody tr");

    apartmentFilter.addEventListener("change", function () {
        const selectedStatus = apartmentFilter.value;

        tableRows.forEach(function (row) {
            const rowStatus = row
                .querySelector(".remit-apartment")
                .textContent.trim(); // Get the apartment text
            if (selectedStatus === "All" || selectedStatus === rowStatus) {
                row.style.display = ""; // Show the row
            } else {
                row.style.display = "none"; // Hide the row
            }
        });
    });
});
