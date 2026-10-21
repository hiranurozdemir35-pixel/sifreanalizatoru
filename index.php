<?php
$uzunlukUygun = false;
$buyukHarfVar = false;
$kucukHarfVar = false;
$rakamVar = false;
$ozelKarakterVar = false;
$puan = 0;
$durum = '';
$progressClass = '';
$formGonderildi = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formGonderildi = true;
    $sifre = $_POST['sifre'] ?? '';

    $uzunlukUygun = strlen($sifre) >= 8;
    $buyukHarfVar = (bool) preg_match('/[A-Z]/', $sifre);
    $kucukHarfVar = (bool) preg_match('/[a-z]/', $sifre);
    $rakamVar = (bool) preg_match('/[0-9]/', $sifre);
    $ozelKarakterVar = (bool) preg_match('/[^A-Za-z0-9]/', $sifre);

    if ($uzunlukUygun) $puan += 20;
    if ($buyukHarfVar) $puan += 20;
    if ($kucukHarfVar) $puan += 20;
    if ($rakamVar) $puan += 20;
    if ($ozelKarakterVar) $puan += 20;

    if ($puan <= 40) {
        $durum = 'Zayıf';
        $progressClass = 'bg-danger';
    } elseif ($puan <= 80) {
        $durum = 'Orta';
        $progressClass = 'bg-warning';
    } else {
        $durum = 'Güçlü';
        $progressClass = 'bg-success';
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Analizi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg border-0" style="max-width: 420px; width: 100%;">
            <div class="card-body p-4 p-md-5">
                <h1 class="card-title h3 text-center mb-4">Şifre Analizi</h1>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="sifre" class="form-label">Şifre</label>
                        <input type="password" class="form-control form-control-lg" id="sifre" name="sifre" placeholder="Şifrenizi girin" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Analiz Et</button>
                </form>

                <?php if ($formGonderildi): ?>
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-semibold">Güç: <?= htmlspecialchars($durum) ?></span>
                        <span class="fw-semibold"><?= $puan ?> / 100</span>
                    </div>
                    <div class="progress" role="progressbar" aria-valuenow="<?= $puan ?>" aria-valuemin="0" aria-valuemax="100" style="height: 1.25rem;">
                        <div class="progress-bar <?= $progressClass ?>" style="width: <?= $puan ?>%;"><?= $puan ?>%</div>
                    </div>
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            En az 8 karakter
                            <span><?= $uzunlukUygun ? '✅' : '❌' ?></span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            En az bir büyük harf
                            <span><?= $buyukHarfVar ? '✅' : '❌' ?></span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            En az bir küçük harf
                            <span><?= $kucukHarfVar ? '✅' : '❌' ?></span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            En az bir rakam
                            <span><?= $rakamVar ? '✅' : '❌' ?></span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            En az bir özel karakter
                            <span><?= $ozelKarakterVar ? '✅' : '❌' ?></span>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
