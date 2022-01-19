const RUTA_API = "http://localhost:8000"
const $estado = document.querySelector("#estado"),
$listaDeImpresoras = document.querySelector("#listaDeImpresoras"),
$btnLimpiarLog = document.querySelector("#btnLimpiarLog"),
$btnRefrescarLista = document.querySelector("#btnRefrescarLista"),
$btnEstablecerImpresora = document.querySelector("#btnEstablecerImpresora"),
$texto = document.querySelector("#texto"),
$impresoraSeleccionada = document.querySelector("#impresoraSeleccionada"),
$btnImprimir = document.querySelector("#btnImprimir");

const loguear = texto => $estado.textContent += (new Date()).toLocaleString() + " " + texto + "\n";
const limpiarLog = () => $estado.textContent = "";

$btnLimpiarLog.addEventListener("click", limpiarLog);

const limpiarLista = () => {
    for (let i = $listaDeImpresoras.options.length; i >= 0; i--) {
        $listaDeImpresoras.remove(i);
    }
};


const obtenerListaDeImpresoras = () => {
    loguear("Cargando lista...");
    Impresora.getImpresoras()
        .then(listaDeImpresoras => {
            refrescarNombreDeImpresoraSeleccionada();
            loguear("Lista cargada");
            limpiarLista();
            listaDeImpresoras.forEach(nombreImpresora => {
                const option = document.createElement('option');
                option.value = option.text = nombreImpresora;
                $listaDeImpresoras.appendChild(option);
            })
        });
}

const establecerImpresoraComoPredeterminada = nombreImpresora => {
    loguear("Estableciendo impresora...");
    Impresora.setImpresora(nombreImpresora)
        .then(respuesta => {
            refrescarNombreDeImpresoraSeleccionada();
            if (respuesta) {
                loguear(`Impresora ${nombreImpresora} establecida correctamente`);
            } else {
                loguear(`No se pudo establecer la impresora con el nombre ${nombreImpresora}`);
            }
        });
};

const refrescarNombreDeImpresoraSeleccionada = () => {
    Impresora.getImpresora()
        .then(nombreImpresora => {
            $impresoraSeleccionada.textContent = nombreImpresora;
        });
}


$btnRefrescarLista.addEventListener("click", obtenerListaDeImpresoras);
$btnEstablecerImpresora.addEventListener("click", () => {
    const indice = $listaDeImpresoras.selectedIndex;
    if (indice === -1) return loguear("No hay ninguna impresora seleccionada")
    const opcionSeleccionada = $listaDeImpresoras.options[indice];
    establecerImpresoraComoPredeterminada(opcionSeleccionada.value);
});

$btnImprimir.addEventListener("click", () => {
    let impresora = new Impresora(RUTA_API);
    impresora.setFontSize(1, 1);
    impresora.setEmphasize(0);
    impresora.setAlign("center");
    impresora.write("COOTRANSHUILA LTDA\n");
    impresora.write("NIT: 891.100.299-7 TEL: 018000933737\n");
    impresora.write("Av. 26 No. DIR: 4-82, Neiva - Huila\n");
    impresora.write("------------------------------------\n");
    impresora.setAlign("right");
    impresora.write("Pasajero: **************\n");
    impresora.write("Cédula: ****** Tel: ********\n");
    impresora.write("Origen: BOGOTA Destino: AIPE\n");
    impresora.write("Tiquete: ******** Puesto: **\n");
    impresora.write("Categoria: ******** Vehículo: ******\n");
    impresora.write("Salida: ******** Hora: **:**\n");
    impresora.setAlign("center");
    impresora.write("Valor Pago: $ ******\n");
    impresora.setAlign("right");
    impresora.write("Valor. Total: ***** Valor. Desc: **\n");
    impresora.write("Clase Tarifa: ***********\n");
    impresora.write("Medio Pago: Efectivo\n");
    impresora.write("------------------------------------\n");
    impresora.setAlign("center");
    impresora.write("***Gracias por su compra***");
    impresora.cut();
    impresora.cutPartial(); // Pongo este y también cut porque en ocasiones no funciona con cut, solo con cutPartial
    impresora.end()
        .then(valor => {
            loguear("Al imprimir: " + valor);
        })
});

// En el init, obtenemos la lista
obtenerListaDeImpresoras();
// Y también la impresora seleccionada
refrescarNombreDeImpresoraSeleccionada();
