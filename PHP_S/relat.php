<?php
    require_once("conexao.php");
    require_once("../pdf/PDF.php");

    $sql = "SELECT * FROM sala ;";

    $salas = [];

    $result = $conn->query($sql);

    while($p = $result->fetch_assoc()) {
        $salas[] = $p;
    }

    $sala = array_map(function($sala) {

        return [
            $sala["Num_Sala"],
            $sala["dsc"],
        ];

    }, $salas);

    $headers = [ "Número da Sala", " Descrição "];

    AddPage();

    $tableWidth = GetPageWidth() * 0.85;
    $padding = (GetPageWidth() - $tableWidth) / 2;

    SetDrawColor(0, 0, 0);
    SetFillColor(255, 255, 255);

    SetFontSize(12);
    SetPosition(0, 0);
    PrintRow([ date("d/m/Y H:i:s") ], [ "calculated" => [GetPageWidth() - 10] ], 12, "R");

    SetPosition(0, 15);
    SetFontSize(24);
    SetFontStyle("B");

    PrintRow([ "Lista de Salas "], [ "calculated" => [GetPageWidth()] ], GetFontSize(), "C");

    GetFPDF()->Image(__DIR__ . "/../Imagens/c.png", $padding, 5, 30, 30, "PNG"); 

    SetFontSize(12);
    SetFontStyle("");

    SetPosition($padding, 50);

    PrintTable($headers, $salas, $tableWidth, 10, ["C", "C"]);

    SetDrawColor(255, 0, 0);
    
    SetLineWidth(0.2);
    DrawLine(5, 0, 5, GetPageHeight());

    SetLineWidth(2);
    DrawLine(0, 0, 0, GetPageHeight());

    Output();
?>