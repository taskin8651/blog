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

// 1️⃣ Fix unfinished merge
run('git merge --abort');

// 2️⃣ Reset & clean (force fresh state)
run('git reset --hard HEAD');
run('git clean -fd');

// 3️⃣ Pull latest code (safe merge)
run('git pull origin main --no-rebase');

// 4️⃣ Install/update dependencies (if needed)
run('composer install --no-dev --optimize-autoloader');

// 5️⃣ Laravel optimize
run('php artisan migrate --force');
run('php artisan config:cache');
run('php artisan route:cache');
run('php artisan view:cache');

// 6️⃣ Clear cache (extra safety)
run('php artisan cache:clear');

// =======================
// ✅ DONE
// =======================
echo "✅ Deployment Completed Successfully";

echo "</pre>";