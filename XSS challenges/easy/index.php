<?php
$flag = getenv('FLAG') ?? '';

setrawcookie('secret', $flag, [
    'expires'  => time() + 3600,
    'path'     => '/',
    'httponly' => false,
    'samesite' => 'Lax',
]);

$name = $_GET['name'] ?? '';
$name = preg_replace('/<script.*?>/i', '[FILTERED]', $name);

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>XSS Challenge - Easy</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 60px auto; padding: 0 20px; }
        input { padding: 8px; width: 250px; }
        button { padding: 8px 16px; }
        .greeting { margin-top: 20px; padding: 15px; background: #f0f0f0; border-radius: 6px; }
        a.back { display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>
    <a class="back" href="../">&larr; Về trang chọn level</a>
    <h1>XSS Challenge - Easy</h1>
    <p>Can you "alert" the flag???</p>
    <!-- Hint: Can you steal the cookie? -->
    <form method="GET">
        <input type="text" name="name" placeholder="Nhập tên..." value="<?= $name ?>">
        <button type="submit">Gửi</button>
    </form>

    <?php $displayName = $name === '' ? 'guest' : $name; ?>
        <div class="greeting">
                Xin chào, <?= $displayName ?>!
        </div>

</body>
</html>