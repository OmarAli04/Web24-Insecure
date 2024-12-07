var inactivityTimeout;
var inactivityDuration = 30 * 1000; 

function resetInactivityTimer() {
    clearTimeout(inactivityTimeout);
    inactivityTimeout = setTimeout(logout, inactivityDuration);
}

document.addEventListener("mousemove", resetInactivityTimer);
document.addEventListener("keypress", resetInactivityTimer);

function logout() {
    alert("Session timed out. Logging out.");
    window.location.href = "login.php"; 
}
