function mostrarNotificacion(mensaje) {
    const notification = document.getElementById('notification');
    notification.textContent = mensaje;
    notification.style.display = 'block';

    // Ocultar la notificación después de 3 segundos
    setTimeout(() => {
        notification.style.display = 'none';
    }, 3000);
}
