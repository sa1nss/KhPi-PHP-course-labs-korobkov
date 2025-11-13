<?php
header("Content-Type: text/css");
header("Cache-Control: public, max-age=86400");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 86400) . " GMT");

echo "
body { font-family: Arial; background: #f4f4f4; padding: 20px; }
h1 { color: #2a4d8f; }
a { font-size: 18px; display: block; margin: 10px 0; }
";
