// Sample data (you would fetch this data from your server)
const usersData = [
    { id: 1, name: "User 1", email: "user1@example.com" },
    { id: 2, name: "User 2", email: "user2@example.com" },
    { id: 3, name: "User 3", email: "user3@example.com" },
];

const reportsData = [
    { name: "Report 1", date: "2023-01-15" },
    { name: "Report 2", date: "2023-02-20" },
    { name: "Report 3", date: "2023-03-10" },
];

// Function to add a doctor
function addDoctor() {
    const doctorName = document.getElementById("doctor-name").value;
    const specialty = document.getElementById("specialty").value;
    const qualifications = document.getElementById("qualifications").value;

    // Perform client-side validation (you can add more validation)
    if (!doctorName || !specialty || !qualifications) {
        alert("Please fill in all fields.");
        return;
    }

    // Simulate sending the data to the server (you'd replace this with actual server interaction)
    alert("Doctor added: " + doctorName);

    // Clear the form fields
    document.getElementById("add-doctor-form").reset();
}

// Function to add a hospital
function addHospital() {
    const hospitalName = document.getElementById("hospital-name").value;
    const location = document.getElementById("location").value;
    const servicesOffered = document.getElementById("services-offered").value;

    // Perform client-side validation (you can add more validation)
    if (!hospitalName || !location || !servicesOffered) {
        alert("Please fill in all fields.");
        return;
    }

    // Simulate sending the data to the server (you'd replace this with actual server interaction)
    alert("Hospital added: " + hospitalName);

    // Clear the form fields
    document.getElementById("add-hospital-form").reset();
}

// Function to populate the user list
function populateUserList() {
    const userList = document.querySelector("#user-list tbody");

    usersData.forEach(user => {
        const row = userList.insertRow();
        row.innerHTML = `<td>${user.id}</td><td>${user.name}</td><td>${user.email}</td>`;
    });
}

// Function to populate the report list
function populateReportsList() {
    const reportsList = document.querySelector("#reports-list tbody");

    reportsData.forEach(report => {
        const row = reportsList.insertRow();
        row.innerHTML = `<td>${report.name}</td><td>${report.date}</td>`;
    });
}

// Function to handle chatbot training data submission
function submitTrainingData(event) {
    event.preventDefault(); // Prevent the form from submitting

    const trainingData = document.getElementById("chatbot-training-data").value;

    // Perform client-side validation (you can add more validation)
    if (!trainingData) {
        alert("Please enter training data.");
        return;
    }

    // Simulate sending the training data to the chatbot (you'd replace this with actual chatbot training)
    alert("Training data submitted: " + trainingData);

    // Clear the form field
    document.getElementById("train-chatbot-form").reset();
}

// Add event listeners to form submissions
document.getElementById("add-doctor-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting as a traditional HTML form
    addDoctor();
});

document.getElementById("add-hospital-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting as a traditional HTML form
    addHospital();
});

document.getElementById("train-chatbot-form").addEventListener("submit", submitTrainingData);

// Call the functions to populate the user and report lists when the page loads
window.addEventListener("load", () => {
    populateUserList();
    populateReportsList();
});
