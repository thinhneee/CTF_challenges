<?php
$flag = getenv('FLAG_MEDIUM') ?? '';

setrawcookie('secret', $flag, [
    'expires'  => time() + 3600,
    'path'     => '/',
    'httponly' => false,
    'samesite' => 'Lax',
]);

$name = $_GET['name'] ?? '';
$blockedTags = [
    'a', 'abbr', 'acronym', 'address', 'animate', 'animatemotion',
    'animatetransform', 'applet', 'area', 'article', 'aside', 'audio',
    'b', 'base', 'bdi', 'bdo', 'big', 'blink', 'blockquote', 'body', 'br',
    'button', 'canvas', 'caption', 'center', 'cite', 'code', 'col',
    'colgroup', 'command', 'content', 'data', 'datalist', 'dd', 'del',
    'details', 'dfn', 'dialog', 'dir', 'div', 'dl', 'dt', 'element', 'em',
    'embed', 'fieldset', 'fencedframe', 'figcaption', 'figure', 'font', 'footer', 'form',
    'frame', 'frameset', 'h1', 'head', 'header', 'hgroup', 'hr', 'html',
    'i', 'iframe', 'image', 'img', 'input', 'ins', 'kbd', 'keygen', 'label',
    'legend', 'li', 'link', 'listing', 'main', 'map', 'mark', 'marquee',
    'menu', 'menuitem', 'meta', 'meter', 'model', 'multicol', 'nav', 'nextid', 'nobr',
    'noembed', 'noframes', 'noscript', 'object', 'ol', 'optgroup', 'option',
    'output', 'p', 'param', 'picture', 'plaintext', 'pre', 'progress', 'q',
    'rb', 'rp', 'rt', 'rtc', 'ruby', 's', 'samp', 'script', 'section',
    'select', 'set', 'shadow', 'slot', 'small', 'source', 'spacer', 'span',
    'strike', 'strong', 'style', 'sub', 'summary', 'sup', 'svg', 'table',
    'tbody', 'td', 'template', 'textarea', 'tfoot', 'th', 'thead', 'time',
    'title', 'tr', 'track', 'tt', 'u', 'ul', 'var', 'video', 'wbr', 'xmp', 'xss',
    'basefont', 'bgsound', 'comment', 'dialog', 'dir', 'isindex', 'keygen',
    'menu', 'multicol', 'noembed', 'spacer', 'acronym', 'command', 'content',
    'font-face', 'font-face-format', 'font-face-name', 'font-face-src',
    'font-face-uri', 'hgroup', 'image', 'math', 'maction', 'maligngroup',
    'malignmark', 'menclose', 'merror', 'mfenced', 'mfrac', 'mglyph', 'mi',
    'mlabeledtr', 'mmultiscripts', 'mn', 'mo', 'mover', 'mpadded', 'mphantom',
    'mroot', 'mrow', 'ms', 'mspace', 'msqrt', 'mstyle', 'msub', 'msup',
    'msubsup', 'mtable', 'mtd', 'mtext', 'mtr', 'munder', 'munderover',
    'annotation', 'annotation-xml', 'mprescripts', 'semantics', 'unknown',
    'slot', 'template', 'portal', 'search', 'selectedcontent'
];
$blockedPatterns = [];
foreach ($blockedTags as $tag) {
    $name = preg_replace('/<' . preg_quote($tag, '/') . '\b[^>]*>/i', '', $name);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>XSS Challenge - Medium</title>
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
    <h1>XSS Challenge - Medium</h1>
    <p>I blocked almost all tags!! Can you bypass this?</p>

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