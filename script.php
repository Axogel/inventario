<?php

// Ruta al archivo autoload de Composer
require __DIR__.'/vendor/autoload.php';

// Inicializa la aplicación Laravel
$app = require_once __DIR__.'/bootstrap/app.php';

// Ejecuta el kernel de la aplicación
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Ejecuta los comandos directamente
$kernel->call('app:scraping');
$kernel->call('app:update-ves');
$kernel->call('verificar:productos_vencidos');
