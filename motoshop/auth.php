<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';
header('Content-Type: application/json; charset=utf-8');
start_session();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verify_csrf($_POST['csrf_token'] ?? null)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'คำขอไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง']);
    exit;
}

$action = $_POST['action'] ?? '';
$email = filter_var(trim((string) ($_POST['email'] ?? '')), FILTER_VALIDATE_EMAIL);
$password = (string) ($_POST['password'] ?? '');

try {
    if ($action === 'register') {
        $name = trim((string) ($_POST['name'] ?? ''));
        if (!$email || $name === '' || mb_strlen($name) > 80 || strlen($password) < 8) {
            throw new RuntimeException('กรุณากรอกข้อมูลให้ครบ และรหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร');
        }
        $check = db()->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $check->execute([$email]);
        if ($check->fetch()) {
            throw new RuntimeException('อีเมลนี้มีบัญชีอยู่แล้ว');
        }
        $stmt = db()->prepare('INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
        $_SESSION['user'] = ['id' => (int) db()->lastInsertId(), 'name' => $name, 'email' => $email];
        echo json_encode(['success' => true, 'message' => 'สมัครสมาชิกสำเร็จ']);
        exit;
    }

    if ($action === 'login') {
        if (!$email || strlen($password) < 8) {
            throw new RuntimeException('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        }
        $stmt = db()->prepare('SELECT id, name, email, password_hash FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $account = $stmt->fetch();
        if (!$account || !password_verify($password, $account['password_hash'])) {
            throw new RuntimeException('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        }
        session_regenerate_id(true);
        $_SESSION['user'] = ['id' => (int) $account['id'], 'name' => $account['name'], 'email' => $account['email']];
        echo json_encode(['success' => true, 'message' => 'เข้าสู่ระบบสำเร็จ']);
        exit;
    }
    throw new RuntimeException('ไม่พบการทำงานที่ร้องขอ');
} catch (RuntimeException $e) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'ระบบยังไม่พร้อมใช้งาน กรุณาตรวจสอบการตั้งค่าฐานข้อมูล']);
}
