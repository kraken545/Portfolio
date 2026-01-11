document.addEventListener('DOMContentLoaded', function() {
    // Crear canvas para el efecto cmatrix
    const canvas = document.createElement('canvas');
    canvas.id = 'matrix-bg';
    canvas.style.position = 'fixed';
    canvas.style.top = '0';
    canvas.style.left = '0';
    canvas.style.width = '100%';
    canvas.style.height = '100%';
    canvas.style.zIndex = '-1';
    canvas.style.pointerEvents = 'none';
    
    document.body.insertBefore(canvas, document.body.firstChild);
    
    const ctx = canvas.getContext('2d');
    
    // Ajustar tamaño del canvas
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    
    // Caracteres griegos, antiguos y símbolos raros
    const caracteres = 'ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩαβγδεζηθικλμνξοπρστυφχψωϐϑϕϖϗϘϙϚϛϜϝϞϟϠϡϢϣϤϥϦϧϨϩϪϫϬϭϮϯ∑∏∐∑∫∬∭∮∯∰∱∲∲∴∵∶∷∸∹∺∻∼∽∾∿≀≁≂≃≄≅≆≇≈≉≊≋≌≍≎≏≐≑≒≓≔≕≖≗≘≙≚≛≜≝≞≟≠≡≢≣≤≥≦≧≨≩≪≫≬≭≮≯≰≱≲≳≴≵≶≷≸≹≺≻≼≽≾≿⊀⊁⊂⊃⊄⊅⊆⊇⊈⊉⊊⊋⊌⊍⊎⊏⊐⊑⊒⊓⊔⊕⊖⊗⊘⊙⊚⊛⊜⊝⊞⊟⊠⊡⊢⊣⊤⊥⊦⊧⊨⊩⊪⊫⊬⊭⊮⊯⊰⊱⊲⊳⊴⊵⊶⊷⊸⊹⊺⊻⊼⊽⊾⊿⋀⋁⋂⋃⋄⋅⋆⋇⋈⋉⋊⋋⋌⋍⋎⋏⋐⋑⋒⋓⋔⋕⋖⋗⋘⋙⋚⋛⋜⋝⋞⋟⋠⋡⋢⋣⋤⋥⋦⋧⋨⋩⋪⋫⋬⋭⋮⋯';
    const caracteresSimplos = caracteres;
    
    const columnWidth = 18;
    const rowHeight = 18;
    const columns = Math.ceil(canvas.width / columnWidth);
    const rows = Math.ceil(canvas.height / rowHeight);
    
    // Array de gotas (caracteres cayendo)
    let drops = [];
    for (let i = 0; i < columns; i++) {
        drops[i] = {
            y: Math.random() * rows,
            speed: 0.015 + Math.random() * 0.025,
            opacity: 1,
            char: '',
            brightness: Math.random(),
            updateFreq: Math.random() > 0.7 ? 1 : Math.floor(Math.random() * 5) + 2
        };
    }
    
    let frameCount = 0;
    
    function getRandomChar() {
        return caracteresSimplos[Math.floor(Math.random() * caracteresSimplos.length)];
    }
    
    function drawMatrix() {
        frameCount++;
        
        // Fondo con efecto de "barrido" sutil
        ctx.fillStyle = 'rgba(0, 0, 0, 0.06)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Limpiar efectos de sombra COMPLETAMENTE
        ctx.shadowBlur = 0;
        ctx.shadowColor = 'transparent';
        ctx.shadowOffsetX = 0;
        ctx.shadowOffsetY = 0;
        
        // Colores verdes hacker - más oscuros y menos brillantes
        const greens = ['#004400', '#005500', '#006600', '#007700', '#008800', '#009900', '#00AA00', '#003300', '#002200', '#001100', '#000F00', '#000E00'];
        
        for (let i = 0; i < drops.length; i++) {
            // Actualizar carácter periódicamente
            if (frameCount % drops[i].updateFreq === 0) {
                drops[i].char = getRandomChar();
            }
            
            const char = drops[i].char || getRandomChar();
            
            // Efecto de brillo variable - MUCHO MÁS SUTIL
            const brightness = 0.1 + Math.sin(frameCount * 0.02 + i) * 0.05;
            
            // Seleccionar color basado en brillo
            let colorIndex = Math.floor(brightness * (greens.length - 1));
            ctx.fillStyle = greens[Math.max(0, colorIndex)];
            
            // Opacidad MUCHO MÁS BAJA
            const alpha = Math.max(0.1, Math.min(0.5, drops[i].y / (rows * 0.6)));
            ctx.globalAlpha = alpha * 0.3;
            
            // Dibujar el carácter sin ningún efecto
            ctx.font = 'bold ' + rowHeight + 'px "Courier New", monospace';
            
            ctx.fillText(char, i * columnWidth, drops[i].y * rowHeight);
            
            // Resetear globalAlpha
            ctx.globalAlpha = 1.0;
            
            // Actualizar posición
            drops[i].y += drops[i].speed;
            drops[i].brightness = Math.sin(frameCount * 0.05 + i * 0.1);
            
            // Si la gota sale de pantalla, reiniciar desde arriba
            if (drops[i].y * rowHeight > canvas.height) {
                drops[i].y = -2;
                drops[i].speed = 0.015 + Math.random() * 0.025;
                drops[i].updateFreq = Math.random() > 0.7 ? 1 : Math.floor(Math.random() * 5) + 2;
            }
        }
    }
    
    // Animación continua
    function animate() {
        drawMatrix();
        requestAnimationFrame(animate);
    }
    
    animate();
});
