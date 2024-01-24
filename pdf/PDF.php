<?php 
    require_once("../lib/fpdf/fpdf.php");

    function PixelsToPoints(float $pixels): float {
        return $pixels * 0.749999999933854;
    }

    function PointsToPixels(float $points): float {
        return $points * 1.33333333345093;
    }

    $fpdf = new FPDF();

    $metadata = [];

    function SetX(float $x) {
        SetPosition($x, GetY());
    }

    function SetY(float $y) {
        SetPosition(GetX(), $y);
    }

    function SetPosition(float $x, float $y) {
        global $fpdf;
        $fpdf->SetXY(PixelsToPoints($x), PixelsToPoints($y));
    }
    
    function GetX() {
        global $fpdf;
        return PointsToPixels($fpdf->GetX());
    }

    function GetY() {
        global $fpdf;
        $y = $fpdf->GetY();
        //echo "get y: $y\n";
        return PointsToPixels($y);
    }

    function GetPosition() {
        return [ GetX(), GetY() ];
    }

    function SetFont(string $family, string $style, float $size) {
        global $fpdf, $metadata;

        $metadata["font"] = [ "family" => $family, "style" => $style, "size" => $size ];
        
        $size = PixelsToPoints($size);
        $fpdf->SetFont($family, $style, $size);
    }

    function SetFontStyle(string $style) {
        global $fpdf, $metadata;

        $font = &$metadata["font"];

        $font["style"] = $style;
        $fpdf->SetFont($font["family"], $style, PixelsToPoints($font["size"]));
    }

    function SetFontSize(float $size) {
        global $fpdf, $metadata;

        $fpdf->SetFontSize(PixelsToPoints($size));
        $metadata["font"]["size"] = $size;
    }

    function GetFont() {
        global $metadata;
        return $metadata["font"];
    }

    function GetFontSize() {
        global $metadata;
        return $metadata["font"]["size"];
    }

    function SetFillColor(int $red, int $green, int $blue) {
        global $fpdf, $metadata;

        $fpdf->SetFillColor($red, $green, $blue);
        $metadata["fillColor"] = [ "red" => $red, "green" => $green, "blue" => $blue ];
    }

    function GetFillColor() {
        global $metadata;
        return $metadata["fillColor"];
    }

    function SetDrawColor(int $red, int $green, int $blue) {
        global $fpdf, $metadata;

        $fpdf->SetDrawColor($red, $green, $blue);
        $metadata["drawColor"] = [ "red" => $red, "green" => $green, "blue" => $blue ];
    }

    function GetDrawColor() {
        global $metadata;
        return $metadata["drawColor"];
    }

    function SetTextColor(int $red, int $green, int $blue) {
        global $fpdf, $metadata;

        $fpdf->SetTextColor($red, $green, $blue);
        $metadata["textColor"] = [ "red" => $red, "green" => $green, "blue" => $blue ];
    }

    function GetTextColor() {
        global $metadata;
        return $metadata["textColor"];
    }

    function AddPage() {
        global $fpdf;
        $fpdf->AddPage();
    }

    function GetPageWidth() {
        global $fpdf;
        return PointsToPixels($fpdf->GetPageWidth());
    }

    function GetPageHeight() {
        global $fpdf;
        return PointsToPixels($fpdf->GetPageHeight());
    }

    function CalculateColumnsWidth($columnHeaders, $availableSpace) {
        global $fpdf;

        $widths = ["minimum" => [], "calculated" => [], "ratio" => []];

        $minimumSpace = 0;

        foreach($columnHeaders as $header) {
            $usedSpace = PointsToPixels($fpdf->GetStringWidth($header));
            $minimumSpace += $usedSpace;
            $widths["minimum"][] = $usedSpace;
        }

        foreach($widths["minimum"] as $minimum) {
            $ratio = $minimum / $minimumSpace;
            $widths["calculated"][] = $ratio * $availableSpace;
            $widths["ratio"][] = $ratio;
        }

        return $widths;
    }

    function CleanData($data) {
        if(is_array($data)) {
            $newArray = [];
            
            foreach($data as $d) {
                $newArray[] = CleanData($d);
            }

            return $newArray;
        } 
        //echo "converting: $data\n";
        return iconv("UTF-8", "ISO-8859-1", $data);
    }

    function PrintRow($data, $widths, $rowHeight, $align = "L", $border=0) {
        global $fpdf;

        $x = GetX();
        //echo "initial x: $x\n";
        $rowHeight = PixelsToPoints($rowHeight);

        if(!is_array($align)) {
            $align = array_fill(0, count($data), $align);
        }

        for($i = 0; $i < count($data); $i++) {

            //echo "x: $x\n";
            $text = $data[$i];
            $width = $widths["calculated"][$i];
            $cellAlign = $align[$i];
            //echo "calculated: $width\n";

            $fpdf->Cell(PixelsToPoints($width), $rowHeight, $text, $border, 0, $cellAlign, true);
            $x += $width;
            SetX($x);
            //echo "new x: " . GetX() . "\n";
        }
        //var_dump(GetPosition());
    }

    function PrintTable($headers, $data, $tableWidth, $rowHeight, $dataRowsStyle="L") {
        
        $headers = CleanData($headers);
        $data = CleanData($data);

        $columnData = CalculateColumnsWidth($headers, $tableWidth);
        
        $x0 = GetX();

        PrintRow($headers, $columnData, $rowHeight, "C", 1);
        SetPosition($x0, GetY() + $rowHeight);

        for($i = 0; $i < count($data); $i++) {
            $row = $data[$i];

            PrintRow($row, $columnData, $rowHeight, $dataRowsStyle, 1);
            SetPosition($x0, GetY() + $rowHeight);
        }
    }

    function DrawLine(float $xo, float $yo, float $xd, float $yd) {
        global $fpdf;

        $xo = PixelsToPoints($xo);
        $yo = PixelsToPoints($yo);
        $xd = PixelsToPoints($xd);
        $yd = PixelsToPoints($yd);

        //echo "drawing line from ($xo, $yo) to ($xd, $yd)\n";

        $fpdf->Line($xo, $yo, $xd, $yd);
    }

    function SetLineWidth(int $width) {
        global $fpdf;

        $fpdf->SetLineWidth($width);
    }

    function Output(string $destination = "", string $name = "", bool $utf8 = true) {
        global $fpdf;
        $fpdf->Output($destination, $name, $utf8);
    }

    function GetFPDF() {
        global $fpdf;

        return $fpdf;
    }

    $fpdf->SetMargins(0, 0, 0);

    SetFont("Arial", "", 12);
    SetTextColor(0, 0, 0);

    SetFillColor(0xFF, 0xFF, 0xFF);
    SetDrawColor(0, 0, 0);
?>