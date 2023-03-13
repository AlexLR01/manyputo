<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabla</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>id</th>
                <th>nombre</th>
                <th>abonado</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $i => $fila)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $fila['id'] }}</td>
                    <td><input type="text" name="datos[{{ $i }}][nombre]" value="{{ $fila['nombre'] }}"></td>
                    <td><input type="number" name="datos[{{ $i }}][abonado]" value="{{ $fila['abonado'] }}"></td>
<td>
<button onclick="editarFila(this)">Editar</button>
<button onclick="guardarFila(this)">Guardar</button>
<button onclick="borrarFila(this)">Borrar</button>
</td>
</tr>
@endforeach
</tbody>
</table>
<button onclick="agregarFila()">Agregar</button>
<button onclick="nuevoAbono()">Nuevo a Abonar</button>
<script>
    function editarFila(btn) {
        const fila = btn.parentNode.parentNode;
        fila.querySelectorAll('td input').forEach(input => {
            input.disabled = false;
        });
        btn.style.display = 'none';
        fila.querySelector('button:nth-of-type(2)').style.display = 'inline-block';
    }

    function guardarFila(btn) {
        const fila = btn.parentNode.parentNode;
        fila.querySelectorAll('td input').forEach(input => {
            input.disabled = true;
        });
        fila.querySelector('button:nth-of-type(1)').style.display = 'inline-block';
    }

    function borrarFila(btn) {
        const fila = btn.parentNode.parentNode;
        fila.remove();
    }

    function agregarFila() {
        const tabla = document.querySelector('table tbody');
        const nuevaFila = `
            <tr>
                <td>${tabla.children.length + 1}</td>
                <td><input type="text" name="datos[${tabla.children.length}][id]"></td>
                <td><input type="text" name="datos[${tabla.children.length}][nombre]"></td>
                <td><input type="number" name="datos[${tabla.children.length}][abonado]"></td>
                <td>
                    <button onclick="editarFila(this)">Editar</button>
                    <button onclick="guardarFila(this)">Guardar</button>
                    <button onclick="borrarFila(this)">Borrar</button>
                </td>
            </tr>
        `;
        tabla.insertAdjacentHTML('beforeend', nuevaFila);
    }

    function nuevoAbono() {
        const id = prompt ('Ingrese el id a cambiar')
        const abono = prompt('Ingrese el monto a agregar al abonado');
        if (abono !== null && !isNaN(id) ) {
            document.querySelectorAll('table tbody td:nth-of-type(4) input').forEach(input => {
                input.value = parseInt(input.value) + parseInt(abono);
            });
        }
    }
</script>
</body>
</html>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #ccc;
    }

    tr:nth-of-type(even) {
        background-color: #f2f2f2;
    }

    button {
        margin: 4px;
        padding: 8px;
        border-radius: 4px;
        border: none;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    button:hover {
        background-color: #3e8e41;
    }
</style>
