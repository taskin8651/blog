<?php

// =======================
// 🔒 SECURITY KEY
// =======================
$secretKey = 'mysecret123';

if (!isset($_GET['key']) || $_GET['key'] !== $secretKey) {
    http_response_code(403);
    die('❌ Access Denied');
}

// =======================
// 📁 PROJECT PATH
// =======================
$projectRoot = '/home/smartuni/public_html/onroadmedia.in';

chdir($projectRoot);

// =======================
// ⚙️ HELPER FUNCTION
// =======================
function run($cmd) {
    echo "➡️ $cmd\n";
    $output = shell_exec($cmd . ' 2>&1');
    echo $output . "\n";
}

// =======================
// 🚀 DEPLOY START
// =======================
echo "<pre>";

// ✅ Set Git identity (safe for server)
run('git config user.name "taskin"');
run('git config user.email "mdsayebalam10@gmail.com"');

// ✅ Fetch latest changes from GitHub
run('git fetch origin');

// ✅ Safe pull (team friendly, no data loss)
run('git pull origin main --no-rebase --no-edit');

// ✅ Composer install (auto detect)
$composer = trim(shell_exec('which composer'));

if ($composer) {
    run("$composer install --no-dev --optimize-autoloader");
} else {
    echo "⚠️ Composer not found, skipping...\n";
}

// ✅ Laravel optimize
run('php artisan migrate --force');
run('php artisan config:cache');
run('php artisan route:cache');
run('php artisan view:cache');
run('php artisan cache:clear');

// =======================
// ✅ DONE
// =======================
echo "✅ Deployment Completed Successfully 🚀";

echo "</pre>";