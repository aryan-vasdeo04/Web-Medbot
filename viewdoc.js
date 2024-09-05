document.addEventListener("DOMContentLoaded", function () {
    // Sample doctor data (you would fetch this data from your server)
    const doctorsData = [
        { name: "Dr. Smith", specialty: "Cardiology", qualifications: "MD, PhD" },
        { name: "Dr. Johnson", specialty: "Pediatrics", qualifications: "MD" },
        { name: "Dr. Brown", specialty: "Dermatology", qualifications: "MD, PhD" },
        { name: "Dr. Wilson", specialty: "Orthopedics", qualifications: "MD" },
        // Add more doctor objects as needed
    ];

    const doctorsList = document.getElementById("doctors-list");

    doctorsData.forEach(doctor => {
        const listItem = document.createElement("li");
        listItem.textContent = `Name: ${doctor.name}, Specialty: ${doctor.specialty}, Qualifications: ${doctor.qualifications}`;
        doctorsList.appendChild(listItem);
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const doctorsData = [
        { name: "Dr. Smith", specialty: "Cardiology", qualifications: "MD, PhD" },
        { name: "Dr. Johnson", specialty: "Pediatrics", qualifications: "MD" },
        { name: "Dr. Brown", specialty: "Dermatology", qualifications: "MD, PhD" },
        { name: "Dr. Wilson", specialty: "Orthopedics", qualifications: "MD" },
        // Add more doctor objects as needed
    ];

    const doctorsList = document.getElementById("doctors-list");
    const bookingForm = document.querySelector(".booking-form");

    doctorsData.forEach(doctor => {
        const listItem = document.createElement("li");
        const bookButton = document.createElement("button");

        // Set a custom data attribute to store the doctor's name
        bookButton.setAttribute("data-doctor-name", doctor.name);

        bookButton.textContent = `Book Appointment`;
        listItem.textContent = `Name: ${doctor.name}, Specialty: ${doctor.specialty}, Qualifications: ${doctor.qualifications}`;

        // Add a click event listener to show the booking form when the button is clicked
        bookButton.addEventListener("click", function () {
            const doctorName = this.getAttribute("data-doctor-name");
            showBookingForm(doctorName);
        });

        listItem.appendChild(bookButton);
        doctorsList.appendChild(listItem);
    });

    function showBookingForm(doctorName) {
        // Display the booking form and set the doctor's name in the form
        bookingForm.style.display = "block";
        const patientNameInput = document.getElementById("patient-name");
        patientNameInput.value = "";
        patientNameInput.focus();
        const doctorNameLabel = document.createElement("label");
        doctorNameLabel.textContent = `Doctor: ${doctorName}`;
        bookingForm.insertBefore(doctorNameLabel, patientNameInput);
    }
});
