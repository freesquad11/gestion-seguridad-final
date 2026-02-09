document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    
    if(form) {
        form.addEventListener("submit", function(event) {
            let cedula = document.querySelector("input[name='cedula']").value;
            let sueldo = document.querySelector("input[name='sueldo']").value;
            let cargo = document.querySelector("select[name='cargo']").value;

            // 1. Validar que la cédula tenga 10 dígitos
            if(cedula.length !== 10 || isNaN(cedula)) {
                alert("Error: La cédula debe tener exactamente 10 números.");
                event.preventDefault(); // Detiene el envío del formulario
                return;
            }

            // 2. Validar que el sueldo sea positivo
            if(sueldo <= 0) {
                alert("Error: El sueldo debe ser mayor a 0.");
                event.preventDefault();
                return;
            }

            // 3. Validar que se haya seleccionado un cargo
            if(cargo === "") {
                alert("Por favor seleccione un cargo válido.");
                event.preventDefault();
                return;
            }
        });
    }
});