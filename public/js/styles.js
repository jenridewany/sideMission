
function showLogoutPopup() {
    document.getElementById("logoutPopup").style.display = "block";
}

function hideLogoutPopup() {
    document.getElementById("logoutPopup").style.display = "none";
}

function logout() {
    window.location.href = "sign-out"; 
}