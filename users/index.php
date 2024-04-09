<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <style>
        body {
            background-color: black;
            color: greenyellow;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>
    <h1>Usuarios</h1>
    <hr>
    <button onclick="nuevoUsuario()">Nuevo Usuario</button>
    <hr>
    <div id="formulario" style="display: none;">
        <form action="new/" method="POST">
            <label>Username</label><br>
            <input id="inUsername" name="inUsername" type="text" placeholder="Ingrese nombre de usuario" value="abecerra"><br>
            <label>Nombre Completo</label><br>
            <input id="inNombre" name="inNombre" type="text" placeholder="Ingrese el nombre completo" value="Andrea Becerra"><br>
            <label>Rol</label><br>
            <select id="selRol" name="selRol">
                <option value="1">Owner</option>
                <option value="2">Operador</option>
            </select>
            <button type="button" onclick="nuevo()">Guardar Nuevo</button>
        </form>
    </div>
    <hr>
    <table id="tDatos" style="width: 100%; border: 1px solid greenyellow">
        <thead>
            <tr>
                <td>#</td>
                <td>Username</td>
                <td>Estado</td>
                <td>Acciones</td>
            </tr>
        </thead>
    </table>
    <hr>
    <div id="showInfoUsuario" style="display: block;">
        <h2>Info del Usuario</h2>
    </div>
    <hr>
</body>
<script>
    const listaUsuarios = [{
            id: 1,
            username: 'scabezas',
            nombre: "Sebastián Cabezas",
            rol: {
                id: 1,
                nombre: 'owner'
            },
            estado: true
        },
        {
            id: 2,
            username: 'cduque',
            nombre: "Carlos Duque",
            rol: {
                id: 2,
                nombre: 'operator'
            },
            estado: false
        },
    ];

    listar();

    function listar() {
        const tabla = document.getElementById('tDatos');
        tabla.innerHTML = '';
        const thead = document.createElement('thead');
        thead.innerHTML = `
        <tr>
            <td>#</td>
            <td>Nombre de Usuario</td>
            <td>Estado</td>
            <td>Acciones</td>
        </tr>
        `;

        const tbody = document.createElement('tbody');
        listaUsuarios.forEach(user => {
            const tr = document.createElement('tr');
            const id = document.createElement('td');
            id.innerText = user.id;
            const username = document.createElement('td');
            username.innerText = user.username;
            const estado = document.createElement('td');
            estado.innerText = user.estado == true ? 'Activado' : 'Desactivado';
            const acciones = document.createElement('td');
            acciones.innerHTML = `
            <button onclick="ver(${user.id})">Ver</button>
            <button onclick="editar(${user.id})">Editar</button>
            <button onclick="desactivar(${user.id})">Desactivar</button>
            <button onclick="activar(${user.id})">Activar</button>
            <button onclick="eliminar(${user.id})">Eliminar</button>
            `;
            tr.appendChild(id);
            tr.appendChild(username);
            tr.appendChild(estado);
            tr.appendChild(acciones);
            tbody.appendChild(tr);
        });
        tabla.appendChild(thead);
        tabla.appendChild(tbody);
    }

    function nuevoUsuario() {
        const formulario = document.getElementById('formulario');
        formulario.style.display = 'block';
    }

    function nuevo() {
        const inUsername = document.getElementById('inUsername');
        const inNombre = document.getElementById('inNombre');
        const selRol = document.getElementById('selRol').selectedOptions[0]; // selectedOptions es una lista de elementos seleccionados, seleccionamos el primero (ya que solo se puede seleccionar uno en un select);
        const id = listaUsuarios.length + 1;
        const nuevo = {
            id: id,
            username: inUsername.value,
            nombre: inNombre.value,
            rol: {
                id: selRol.value,
                nombre: selRol.innerText
            },
            estado: true

        };
        listaUsuarios.push(nuevo);
        listar();
    }

    function ver(_id) {
        //obtiene desde el endpoint los datos del usuario
        const usuario = listaUsuarios.find(u => u.id == _id);

        const div = document.getElementById('showInfoUsuario');
        div.innerHTML = '';
        const tabla = document.createElement('table');
        tabla.style.border = '1px solid green';

        const fila1 = document.createElement('tr');
        const encabezado1 = document.createElement('td');
        const dato1 = document.createElement('td');

        encabezado1.innerText = 'Identificador';
        dato1.innerText = usuario.id;
        dato1.style.backgroundColor = 'green';
        fila1.appendChild(encabezado1);
        fila1.appendChild(dato1);

        const fila2 = document.createElement('tr');
        const encabezado2 = document.createElement('td');
        const dato2 = document.createElement('td');

        encabezado2.innerText = 'Username';
        dato2.innerText = usuario.username;
        fila2.appendChild(encabezado2);
        fila2.appendChild(dato2);

        const fila3 = document.createElement('tr');
        const encabezado3 = document.createElement('td');
        const dato3 = document.createElement('td');

        encabezado3.innerText = 'Nombre Completo';
        dato3.innerText = usuario.nombre;
        dato3.style.backgroundColor = 'green';
        fila3.appendChild(encabezado3);
        fila3.appendChild(dato3);

        const fila4 = document.createElement('tr');
        fila4.innerHTML = `
        <td>Rol</td>
        <td>${usuario.rol.nombre}</td>
        `;

        const fila5 = document.createElement('tr');
        usuario.estado = usuario.estado == true ? 'Activado' : 'Desactivado';
        fila5.innerHTML = `
        <td>Estado</td>
        <td style="background-color: green">${usuario.estado}</td>
        `;

        tabla.appendChild(fila1);
        tabla.appendChild(fila2);
        tabla.appendChild(fila3);
        tabla.appendChild(fila4);
        tabla.appendChild(fila5);
        div.appendChild(tabla);

    }

    function desactivar(_id) {
        //obtiene desde el endpoint los datos del usuario
        const usuario = listaUsuarios.find(u => u.id == _id);
        usuario.estado = false;
        alert(`Descativado el usuario id ${_id}`);
        listar();
    }

    function activar(_id) {
        //obtiene desde el endpoint los datos del usuario
        const usuario = listaUsuarios.find(u => u.id == _id);
        usuario.estado = true;
        alert(`Activado el usuario id ${_id}`);
        listar();
    }

    function eliminar(_id) {
        //obtiene desde el endpoint los datos del usuario
        // Filtrar la lista para excluir el usuario con el ID proporcionado
        const nuevaListaUsuarios = listaUsuarios.filter(usuario => usuario.id !== _id);

        // Reasignar la lista filtrada a la lista original
        listaUsuarios.length = 0; // Vaciar la lista original
        Array.prototype.push.apply(listaUsuarios, nuevaListaUsuarios); // Agregar los elementos filtrados

        alert(`Eliminado el usuario id ${_id}`);
        listar();
    }
</script>

</html>