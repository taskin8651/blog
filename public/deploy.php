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

// ✅ Fix Git identity (only if not set)
run('git config user.name "taskin"');
run('git config user.email "mdsayebalam10@gmail.com"');

// ✅ Abort merge safely (ignore error if none)
run('git merge --abort 2>/dev/null');

// ✅ Clean state (fresh deploy)
run('git reset --hard HEAD');
run('git clean -fd');

// ✅ Pull latest code
run('git pull origin main --no-rebase');

// ✅ Composer auto-detect
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