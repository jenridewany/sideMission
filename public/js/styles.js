const toggleBtn = document.getElementById('toggleBtn');
const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('minimized');
    content.classList.toggle('minimized');
});


function showLogoutPopup() {
    document.getElementById("logoutPopup").style.display = "block";
}

function hideLogoutPopup() {
    document.getElementById("logoutPopup").style.display = "none";
}

function logout() {
    window.location.href = "sign-out"; 
}