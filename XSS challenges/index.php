<?php
// index.php - Trang chọn độ khó
$levels = [
    'easy'   => ['label' => 'Easy',   'desc' => 'Reflected XSS'],
    'medium' => ['label' => 'Medium', 'desc' => 'Reflected XSS, maybe filter some characters.'],
    'hard'   => ['label' => 'Hard',   'desc' => 'XSS enhanced, can you bypass the filter?'],
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>XSS CTF Challenge</title>
    <style>
        body {
            font-family: -apple-system, sans-serif;
            max-width: 700px;
            margin: 60px auto;
            padding: 0 20px;
            background: #0f172a;
            color: #e2e8f0;
        }
        h1 { color: #38bdf8; }
        .levels { display: grid; gap: 16px; margin-top: 30px; }
        .level-card {
            display: block;
            padding: 20px;
            background: #1e293b;
            border-radius: 10px;
            text-decoration: none;
            color: inherit;
            border: 1px solid #334155;
            transition: border-color 0.15s;
        }
        .level-card:hover { border-color: #38bdf8; }
        .level-card h2 { margin: 0 0 6px 0; }
        .level-card p { margin: 0; color: #94a3b8; font-size: 0.95em; }
        .easy h2 { color: #4ade80; }
        .medium h2 { color: #facc15; }
        .hard h2 { color: #f87171; }
    </style>
</head>
<body>
    <h1>XSS CTF Challenge</h1>
    <p>Chọn độ khó bên dưới để bắt đầu.</p>

    <div class="levels">
        <?php foreach ($levels as $key => $info): ?>
            <a class="level-card <?= $key ?>" href="<?= $key ?>/">
                <h2><?= htmlspecialchars($info['label']) ?></h2>
                <p><?= htmlspecialchars($info['desc']) ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</body>
</html>