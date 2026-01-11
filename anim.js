document.addEventListener('DOMContentLoaded', function() {
    const texto = document.getElementById('textoHackeado');
    
    if (!texto) {
        console.error('Elemento textoHackeado no encontrado');
        return;
    }
    
    texto.style.position = 'relative';
    texto.style.display = 'inline-block';
    texto.style.overflow = 'visible';
    
    let isMoving = false;
    let moveTimeout;
    
    // Colores inspirados en cmatrix (verdes neón)
    const coloresMatrix = [
        '#00FF00', // Verde brillante
        '#00DD00', // Verde medio
        '#00BB00', // Verde oscuro
        '#00FF41', // Verde lima
        '#39FF14', // Verde eléctrico
        '#0FFF50', // Verde neón
    ];
    
    // Crear contenedor para las partículas
    const container = document.createElement('div');
    container.style.position = 'absolute';
    container.style.top = '-50px';
    container.style.left = '0';
    container.style.width = '100%';
    container.style.height = '100%';
    container.style.pointerEvents = 'none';
    container.style.overflow = 'visible';
    texto.appendChild(container);
    
    // Función para crear lluvia de píxeles
    function crearParticulasLluvia() {
        const rect = texto.getBoundingClientRect();
        const numeroParticulas = isMoving ? 8 : 4;
        
        for (let i = 0; i < numeroParticulas; i++) {
            const particula = document.createElement('div');
            particula.style.position = 'absolute';
            particula.style.width = '4px';
            particula.style.height = '4px';
            particula.style.borderRadius = '50%';
            particula.style.backgroundColor = coloresMatrix[Math.floor(Math.random() * coloresMatrix.length)];
            particula.style.boxShadow = `0 0 8px ${coloresMatrix[Math.floor(Math.random() * coloresMatrix.length)]}, inset 0 0 5px rgba(255,255,255,0.5)`;
            
            // Posición aleatoria en la parte superior
            const posX = Math.random() * rect.width;
            particula.style.left = posX + 'px';
            particula.style.top = '-30px';
            particula.style.opacity = '1';
            particula.style.zIndex = '1';
            
            // Velocidad aleatoria
            const velocidad = 2 + Math.random() * 4;
            const desviacion = (Math.random() - 0.5) * 15;
            const rotacion = Math.random() * 360;
            
            container.appendChild(particula);
            
            // Animar la caída
            let posY = -30;
            const animarCaida = () => {
                posY += velocidad;
                particula.style.transform = `translateY(${posY}px) translateX(${Math.sin(posY / 20) * desviacion}px) rotate(${rotacion + posY * 2}deg)`;
                particula.style.opacity = Math.max(0, 1 - (posY / (rect.height + 100)));
                
                if (posY < rect.height + 100) {
                    requestAnimationFrame(animarCaida);
                } else {
                    particula.remove();
                }
            };
            
            animarCaida();
        }
    }
    
    // Genera lluvia continuamente
    const intervalLluvia = setInterval(crearParticulasLluvia, 100);
    
    // Detectar movimiento del mouse
    texto.addEventListener('mouseenter', () => {
        isMoving = true;
        clearTimeout(moveTimeout);
    });
    
    texto.addEventListener('mousemove', () => {
        isMoving = true;
        clearTimeout(moveTimeout);
        
        moveTimeout = setTimeout(() => {
            isMoving = false;
        }, 300);
    });
    
    texto.addEventListener('mouseleave', () => {
        isMoving = false;
    });
    
    // Efecto de brillo cuando el mouse está sobre el texto
    texto.addEventListener('mouseenter', () => {
        const letras = texto.querySelectorAll('span');
        letras.forEach(letra => {
            letra.style.textShadow = `0 0 20px ${coloresMatrix[Math.floor(Math.random() * coloresMatrix.length)]}, 0 0 40px ${coloresMatrix[Math.floor(Math.random() * coloresMatrix.length)]}`;
            letra.style.color = coloresMatrix[0];
        });
    });
    
    texto.addEventListener('mouseleave', () => {
        const letras = texto.querySelectorAll('span');
        letras.forEach(letra => {
            letra.style.textShadow = 'none';
            letra.style.color = '';
        });
    });
    
    // Mostrar el texto original con estilos
    texto.innerHTML = '';
    const pixeladoDiv = document.createElement('div');
    pixeladoDiv.style.display = 'inline-block';
    pixeladoDiv.style.position = 'relative';
    
    const originalText = 'Stack';
    for (let i = 0; i < originalText.length; i++) {
        const span = document.createElement('span');
        span.innerText = originalText[i];
        span.style.display = 'inline-block';
        span.style.position = 'relative';
        span.style.transition = 'all 0.3s ease';
        pixeladoDiv.appendChild(span);
    }
    
    texto.appendChild(pixeladoDiv);
});