document.getElementById("appointment-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const date = document.getElementById("date").value;
    const time = document.getElementById("time").value;
    const doctor = document.getElementById("doctor").value;

    // You can perform actions like sending the appointment data to your server here
    // Example: Send data using fetch or XMLHttpRequest

    // Display a confirmation message (You can customize this)
    alert(`Appointment booked for ${name} on ${date} at ${time} with ${doctor}`);
});
