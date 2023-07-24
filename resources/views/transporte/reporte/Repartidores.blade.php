<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Repartidores registrados para Delivery</title>
    <style>
        /* Estilos CSS para el reporte */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Fijar el ancho de las columnas */
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            word-wrap: break-word; /* Romper palabras largas para ajustar contenido */
            font-size: 10px; /* Tamaño de letra más pequeño */
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        /* Ajustar el ancho de las celdas de Dirección y Correo */
        td:nth-child(4), td:nth-child(5) {
            width: 15%; /* Puedes ajustar el valor según tus necesidades */
        }
    </style>
</head>
<body>
    <h1>Reporte de Repartidores - Delivery</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Sueldo</th>
                <th>Vehiculo</th>
                <th>Placa del vehiculo</th>
                <!-- Agrega aquí las columnas que desees mostrar en el reporte -->
            </tr>
        </thead>
        <tbody>
            <!-- Suponemos que los datos provienen de una base de datos y están almacenados en $repartidorT -->
            @foreach ($repartidorT as $repartidor)
                <tr>
                    <td>{{ $repartidor->idRepartidor }}</td>
                    <td>{{ $repartidor->dni }}</td>
                    <td>{{ $repartidor->nombres }}</td>
                    <td>{{ $repartidor->direccion }}</td>
                    <td>{{ $repartidor->email }}</td>
                    <td>{{ $repartidor->telefono }}</td>
                    <td>{{ $repartidor->sueldo }}</td>
                    <td>{{ $repartidor->vehiculo }}</td>
                    <td>{{ $repartidor->placa }}</td>
                    <!-- Agrega aquí las celdas correspondientes a las columnas que desees mostrar en el reporte -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
