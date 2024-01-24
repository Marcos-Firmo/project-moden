<?php
    require_once("conexao.php");
    require_once("../pdf/PDF.php");

    $sql = "SELECT * FROM patrimonio ;";

    $patrimonios = [];

    $result = $conn->query($sql);

    while($p = $result->fetch_assoc()) {
        $patrimonios[] = $p;
    }

    $patrimonios = array_map(function($patrimonio) {

        return [
            $patrimonio["Cod_Pat"],
            $patrimonio["rsg"],
            $patrimonio["Num_Sala"],
            $patrimonio["dsc"],
            $patrimonio["Tipo"],
            $patrimonio["sts"],
            date_format(date_create($patrimonio["Data_Tomb"]), "d/m/Y")
        ];

    }, $patrimonios);

    $headers = ["Cód. Patrimônio", "Registro", "Sala", "Descrição", "Tipo de Pat.", "     Status     ", "Data Tombo"];

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

    PrintRow([ "Lista de Patrimonios "], [ "calculated" => [GetPageWidth()] ], GetFontSize(), "C");

    GetFPDF()->Image(__DIR__ . "/../Imagens/c.png", $padding, 5, 30, 30, "PNG"); 

    SetFontSize(12);
    SetFontStyle("");

    SetPosition($padding, 50);

    PrintTable($headers, $patrimonios, $tableWidth, 10, ["C", "C", "C", "C", "C", "C", "C", "C"]);

    SetDrawColor(255, 0, 0);
    
    SetLineWidth(0.2);
    DrawLine(5, 0, 5, GetPageHeight());

    SetLineWidth(2);
    DrawLine(0, 0, 0, GetPageHeight());

    Output();
?>