<?php

namespace App\Http\Controllers\Impresora;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class ImprimirTicket extends Controller
{
    public function imprimir(){
        $nombreImpresora = 'POS'; // impresora a usar
        $connector = new WindowsPrintConnector($nombreImpresora);
        $impresora = new Printer($connector);

        // informacion del ticket
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setTextSize(2,2);
        $impresora->text("COOTRANSHUILA LTDA\n\n");
        $impresora->setTextSize(1,1);
        $impresora->text("NIT: 891.100.299-7 TEL: 018000933737\n");
        $impresora->text("Av. 26 No. DIR: 4-82, Neiva - Huila\n");
        $impresora->setJustification(Printer::JUSTIFY_LEFT);
        $impresora->text("-----------------------------------------------------\n");
        $impresora->text("Pasajero: **************\n");
        $impresora->text("Cédula: ****** Tel: ********\n");
        $impresora->text("Origen: BOGOTA\n");
        $impresora->text("Destino: AIPE\n");
        $impresora->text("Tiquete: ******** Puesto: **\n");
        $impresora->text("Categoria: ******** Vehículo: ******\n");
        $impresora->text("Salida: ******** Hora: **:**\n\n");
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->text("Valor Pago: $ ******\n\n");
        $impresora->setJustification(Printer::JUSTIFY_LEFT);
        $impresora->text("Valor. Total: ***** Valor. Desc: **\n");
        $impresora->text("Clase Tarifa: ***********\n");
        $impresora->text("Medio Pago: Efectivo\n");
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->text("***Gracias por su compra***");

        // codigo de barras
        // $impresora->selectPrintMode();
        // $impresora->setBarcodeHeight(80);
        // $impresora->barcode('ticket', Printer::BARCODE_CODE39);
        $impresora->feed(2); // saltos de linea
        $impresora->cut();
        $impresora->close();
    }
}
