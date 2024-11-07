const predefinedUsername = "admin";
const predefinedPassword = "password";
let attempts = 3;

document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const message = document.getElementById("message");

    if (username === predefinedUsername && password === predefinedPassword) {
        message.style.color = "green";
        message.textContent = "Welcome!";
    } else {
        attempts--;
        if (attempts > 0) {
            message.style.color = "red";
            message.textContent = `Incorrect username or password. You have ${attempts} attempts left.`;
        } else {
            message.style.color = "red";
            message.textContent = "Too many failed attempts. The application will now end.";
            document.getElementById("loginForm").style.display = "none";
        }
    }
});
