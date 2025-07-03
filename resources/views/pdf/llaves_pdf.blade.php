<h1>Lista de llaves</h1>
<p>Williams Rodrigo</p>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 10px;
    }
    p {
        text-align: left;
        margin-bottom: 30px;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #C3E6BE;
        padding: 12px;
        text-align: center;
    }
    th {
        background-color: #D4EDDA;
        color: #155724;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #F8F9FA;
    }
    tr:hover {
        background-color: #E2F0E4;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Disponible</th>
            <th>Estado</th>
            <th>Orden</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($llaves as $llave)
            <tr>
                <td>{{ $llave->codigo }}</td>
                <td>{{ $llave->disponible }}</td>
                <td>{{ $llave->estado }}</td>
                <td>{{ $llave->orden }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
