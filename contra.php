<?php

// Define la contraseña a hashear (puedes cambiarla a la contraseña que desees probar)
$contrasena = "admin";

// Hashea la contraseña usando password_hash
$con_hasheada = password_hash($contrasena, PASSWORD_DEFAULT, ['cost' => 12]);

// Imprime la contraseña hasheada
echo "Contraseña hasheada: " . $con_hasheada;
