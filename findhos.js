document.getElementById("hospital-search-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting

    const location = document.getElementById("location").value;
    const services = document.getElementById("services").value;

    // You can perform a search for hospitals using the provided location and services
    // Replace this with your logic for fetching hospital data (e.g., an API call)

    // Sample search results (you would fetch this data from your server)
    const searchResults = [
        "Hospital A - Location A - Services Offered A",
        "Hospital B - Location B - Services Offered B",
        // Add more hospital entries as needed
    ];

    const resultsList = document.getElementById("results-list");
    resultsList.innerHTML = ""; // Clear previous results

    searchResults.forEach(result => {
        const listItem = document.createElement("li");
        listItem.textContent = result;
        resultsList.appendChild(listItem);
    });
});
