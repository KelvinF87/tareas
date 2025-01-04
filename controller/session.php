<?php
session_start();
// echo isset($_SESSION["sNombre"]) && isset($_SESSION["sTipo"]) ? "El nombre y tipo están configurados." : "No se encontraron los valores de sNombre o sTipo.";

if (!isset($_SESSION["sNombre"]) && !isset($_SESSION["sTipo"])) {
    echo "<script>window.location.href = 'index.html';</script>";

} else {
    echo "entrar";
}
