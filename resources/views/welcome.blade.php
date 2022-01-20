<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
            shrink-to-fit=no">
    <meta name="description" content="Ejemplo de impresión de ticket de venta con JavaScript puro">
    <meta name="author" content="Parzibyte">
    <title>Imprimir ticket de venta desde JavaScript usando plugin</title>
    <!-- Cargar el CSS de Boostrap-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <main role="main" class="container-fluid">
        <div class="row p-4">
            <!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
            <div class="col-12 col-lg-6">
                <h2>Ajustes de impresora</h2>
                <strong>Nombre de impresora seleccionada: </strong>
                <p id="impresoraSeleccionada"></p>
                <div class="form-group">
                    <select class="form-control" id="listaDeImpresoras"></select>
                </div>
                <button class="btn btn-primary btn-sm" id="btnRefrescarLista">Refrescar lista</button>
                <button class="btn btn-primary btn-sm" id="btnEstablecerImpresora">Establecer como predeterminada</button>
                <h2>Ticket de prueba</h2>
                <p>Utiliza el siguiente botón para imprimir un recibo de prueba en la impresora predeterminada:</p>
                <button class="btn btn-primary" id="btnImprimir">Imprimir ticket</button>
                <a href="print://prueba/" class="btn btn-success" target="_blank">Imprimir Con laravel</a>

            </div>
            <div class="col-12 col-lg-6">
                <h2>Log</h2>
                <button class="btn btn-warning btn-sm" id="btnLimpiarLog">Limpiar log</button>
                <pre id="estado"></pre>
            </div>
        </div>
    </main>
    <script src="{{asset('assets/js/Impresora.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>

