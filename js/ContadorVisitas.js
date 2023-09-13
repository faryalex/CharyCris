  // Función para obtener la fecha actual en formato YYYY-MM-DD
  function getCurrentDate() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0'); // Agrega un 0 si el mes es < 10
    const day = String(now.getDate()).padStart(2, '0'); // Agrega un 0 si el día es < 10
    return `${year}-${month}-${day}`;
}

// Función para verificar si la fecha actual es diferente a la fecha almacenada en localStorage
function isNewDay() {
    const currentDate = getCurrentDate();
    const storedDate = localStorage.getItem('lastVisitDate');
    return currentDate !== storedDate;
}

// Función para incrementar el contador y mostrarlo en la página
function incrementVisitCount() {
    // Verificar si es un nuevo día
    if (isNewDay()) {
        // Establecer la fecha actual en localStorage
        const currentDate = getCurrentDate();
        localStorage.setItem('lastVisitDate', currentDate);

        // Reiniciar el contador
        localStorage.setItem('dailyVisitCount', '1');
    } else {
        // Obtener el contador diario actual y convertirlo a número
        let dailyCount = parseInt(localStorage.getItem('dailyVisitCount')) || 0;

        // Incrementar el contador diario
        dailyCount++;

        // Guardar el contador diario actualizado en localStorage
        localStorage.setItem('dailyVisitCount', dailyCount.toString());
    }

    // Mostrar el contador en la página
    const visitsCountElement = document.getElementById('visits-count');
    visitsCountElement.textContent = localStorage.getItem('dailyVisitCount');
}

// Llamar a la función para incrementar el contador al cargar la página
window.onload = incrementVisitCount;