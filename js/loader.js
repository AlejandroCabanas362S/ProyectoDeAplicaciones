document.addEventListener("DOMContentLoaded", () => {
    // Función para cargar el contenido
    const loadContent = (page) => {
        // Creamos una ruta absoluta para el fetch
        const path = `../${page}`;

        // Intentamos cargar el archivo
        fetch(path)
            .then(response => {
                if (!response.ok) throw new Error(`Página no encontrada: ${path}`);
                return response.text();
            })
            .then(data => {
                document.getElementById('content').innerHTML = data;
            })
            .catch(error => {
                console.error("Error cargando la página:", error);
                document.getElementById('content').innerHTML = `<p>Error al cargar el contenido: ${path}</p>`;
            });
    };

    // Cargar el contenido inicial (Inicio)
    const initialPage = window.location.hash.replace('#', '') || "Page/Index/inicio.html";
    loadContent(initialPage);

    // Escuchar cambios en el hash para cambiar el contenido
    window.addEventListener('hashchange', () => {
        const page = window.location.hash.replace('#', '');
        loadContent(page);
    });
});
