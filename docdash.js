document.getElementById("update-profile-button").addEventListener("click", function () {
    // Add logic to open a profile update form
    // You can use a modal or a separate page for this
    alert("Update Profile button clicked");
});

// Sample data (you would fetch this data from your server)
const patientReports = ["Patient Report 1 - [Date]", "Patient Report 2 - [Date]"];
const appointments = ["Appointment 1 - [Date and Time]", "Appointment 2 - [Date and Time]"];

function displayPatientReports() {
    const patientReportsList = document.getElementById("patient-reports-list");
    patientReportsList.innerHTML = "";

    patientReports.forEach(report => {
        const listItem = document.createElement("li");
        listItem.textContent = report;
        patientReportsList.appendChild(listItem);
    });
}

function displayAppointments() {
    const appointmentsList = document.getElementById("appointments-list");
    appointmentsList.innerHTML = "";

    appointments.forEach(appointment => {
        const listItem = document.createElement("li");
        listItem.textContent = appointment;
        appointmentsList.appendChild(listItem);
    });
}

displayPatientReports();
displayAppointments();
