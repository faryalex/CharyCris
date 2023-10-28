
function getCurrentDate() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}

function isNewDay() {
    const currentDate = getCurrentDate();
    const storedDate = localStorage.getItem('lastVisitDate');
    return currentDate !== storedDate;
}

function incrementVisitCount() {
    if (isNewDay()) {
        const currentDate = getCurrentDate();
        localStorage.setItem('lastVisitDate', currentDate);
        localStorage.setItem('dailyVisitCount', '1');
    } else {
        let dailyCount = parseInt(localStorage.getItem('dailyVisitCount')) || 0;
        dailyCount++;
        localStorage.setItem('dailyVisitCount', dailyCount.toString());
    }
    const visitsCountElement = document.getElementById('visits-count');
    visitsCountElement.textContent = localStorage.getItem('dailyVisitCount');
}
window.onload = incrementVisitCount;