<?php

use Slim\Http\Request;
use Slim\Http\Response;

$produk = [
    'primabot' => [
        'name' => 'primaBot',
        'slug' => 'primabot',
        'image' => '',
        'desc' => 'Perangkat alat elektronik yang dapat memberikan ukur curah hujan, tinggi muka air, yang dikirim ke pusat data setiap 5 menit.',
        'page' => 'primabot.html',
    ],
    'primabase' => [
        'name' => 'primaBase',
        'slug' => 'primabase',
        'image' => '',
        'desc' => 'Paket software yang berfungsi untuk menerima data periodik dari primaGateway dan fungsi manajemen data Hujan dan Tinggi Muka Air serta data pendukung.',
        'page' => 'primabase.html',
    ],
    'primagateway' => [
        'name' => 'primaGateway',
        'slug' => 'primagateway',
        'image' => '',
        'desc' => 'Penyimpanan data telemetri di Internet, anda tidak perlu menyediakan tenaga ahli bidang Internet dan Hosting.',
        'page' => '',
    ],
    'primaled' => [
        'name' => 'primaLED',
        'slug' => 'primaled',
        'image' => '',
        'desc' => 'LED untuk menampilkan informasi TMA, berikut fungsi alarm jika terjadi kenaikan ke tingkat Siaga.',
        'page' => '',
    ],
    'primacam' => [
        'name' => 'primaCam',
        'slug' => 'primacam',
        'image' => '',
        'desc' => 'Ada kalanya anda perlu merekam gambar pada titik lokasi kritis dari sungai atau obyek yang perlu direkam dalam bentuk gambar.',
        'page' => '',
    ],
    'primaconsole' => [
        'name' => 'primaConsole',
        'slug' => 'primaconsole',
        'image' => '',
        'desc' => 'Adalah alat bantu untuk mendiagnosa masalah yang terjadi pada Logger primaBot.',
        'page' => '',
    ],
    'primaweb' => [
        'name' => 'primaWeb',
        'slug' => 'primaweb',
        'image' => '',
        'desc' => 'Adalah alat bantu untuk mendiagnosa masalah yang terjadi pada Logger primaBot.',
        'page' => '',
    ],
];

$app->get('[/]', function (Request $request, Response $response, $args) use ($produk) {
    return $this->view->render($response, 'main/home.html', [
        'produk' => $produk,
    ]);
});

$app->redirect('/produk[/]', '/#produk');
$app->get('/produk/{slug}[/]', function (Request $request, Response $response, $args) use ($produk) {
    $slug = $args['slug'];
    if (!isset($produk[$slug])) {
        throw new \Slim\Exception\NotFoundException($request, $response);
    }
    $p = $produk[$slug];
    return $this->view->render($response, 'produk/'. $p['page']);
});

$app->get('/informasi[/]', function (Request $request, Response $response, $args) {
    return $this->view->render($response, 'main/informasi.html');
});