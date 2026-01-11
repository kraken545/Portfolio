 const texto = document.getElementById('textoHackeado');
        const originalText = texto.innerText;
        const pixeladoDiv = document.createElement('div');
        pixeladoDiv.className = 'pixelado';
        texto.innerHTML = ''; // Limpiar el contenido del div original

        // Crear "píxeles" del texto
        for (let i = 0; i < originalText.length; i++) {
            const span = document.createElement('span');
            span.innerText = originalText[i];
            span.style.position = 'relative';
            span.style.display = 'inline-block';

            // Crear píxeles para cada letra
            for (let j = 0; j < 10; j++) { // 10 píxeles por letra
                const pixel = document.createElement('div');
                pixel.className = 'pixel';
                pixel.style.left = `${Math.random() * 10 - 5}px`; // Desplazamiento aleatorio
                pixel.style.top = `${Math.random() * 10 - 5}px`; // Desplazamiento aleatorio
                pixel.style.opacity = '0'; // Comienza invisible
                span.appendChild(pixel);
            }

            pixeladoDiv.appendChild(span);
        }

        texto.appendChild(pixeladoDiv);

        // Función para romper los píxeles
        function romperPíxeles() {
            const píxeles = document.querySelectorAll('.pixel');
            píxeles.forEach(pixel => {
                pixel.style.opacity = '1'; // Hacer visibles los píxeles
                pixel.style.transform = `translate(${Math.random() * 20 - 10}px, ${Math.random() * 20 - 10}px)`; // Movimiento aleatorio
            });
            setTimeout(() => {
                píxeles.forEach(pixel => {
                    pixel.style.opacity = '0'; // Ocultar los píxeles después de un tiempo
                    pixel.style.transform = 'translate(0, 0)'; // Regresar a la posición original
                });
            }, 100); // Tiempo que los píxeles estarán visibles
        }

        // Llamar a la función de romper píxeles cada 2 segundos
        setInterval(romperPíxeles, 2000);