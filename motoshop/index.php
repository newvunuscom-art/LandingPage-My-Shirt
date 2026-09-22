<?php
require_once __DIR__ . '/config.php';
start_session();
$user = $_SESSION['user'] ?? null;
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WORAPHAT MOTO COLLECTION — เสื้อผ้าที่สะท้อนตัวตนของคุณ">
    <title>WORAPHAT — MOTO COLLECTION</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top nav-glass">
    <div class="container">
        <a class="navbar-brand brand-mark" href="#top">WORAPHAT<span>.</span></a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <i class="bi bi-list text-white fs-2"></i>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mx-auto gap-lg-4">
                <li class="nav-item"><a class="nav-link" href="#collection">Collection</a></li>
                <li class="nav-item"><a class="nav-link" href="#story">Our story</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <?php if ($user): ?>
                <div class="d-flex align-items-center gap-3">
                    <span class="small text-white-50">สวัสดี, <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></span>
                    <a class="btn btn-outline-light btn-sm rounded-pill px-3" href="logout.php">ออกจากระบบ</a>
                </div>
            <?php else: ?>
                <button class="btn btn-light btn-sm rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#authModal" data-auth-tab="login">เข้าสู่ระบบ</button>
            <?php endif; ?>
        </div>
    </div>
</nav>

<main id="top">
    <section id="heroCarousel" class="hero hero-slider carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5800" data-bs-pause="hover" aria-label="WORAPHAT collections">
        <div class="carousel-indicators slider-dots">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active slider-dot" aria-current="true" aria-label="แบนเนอร์ที่ 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" class="slider-dot" aria-label="แบนเนอร์ที่ 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" class="slider-dot" aria-label="แบนเนอร์ที่ 3"></button>
        </div>
        <div class="carousel-inner hero-slides">
            <article class="carousel-item active hero-slide">
                <img class="hero-image" src="banner/banner1.png" alt="Woraphat collection banner 1">
                <div class="slide-wash"></div>
                <div class="container slide-content"><p class="eyebrow">01 / REAL REVIEWS</p><h1>ใส่แล้วใหญ่ขึ้น<br><em>จริงครับ</em></h1><p>ความมั่นใจเริ่มต้นจากเสื้อผ้าที่เป็นตัวคุณ</p><a class="btn btn-accent btn-lg rounded-pill px-4" href="#collection">ดูคอลเลกชัน <i class="bi bi-arrow-up-right ms-2"></i></a></div>
            </article>
            <article class="carousel-item hero-slide">
                <img class="hero-image" src="banner/banner2.png" alt="Woraphat collection banner 2">
                <div class="slide-wash"></div>
                <div class="container slide-content"><p class="eyebrow">02 / WORAPHAT MOTO</p><h1>ใส่แล้ว<br><em>เท่ไม่กลัวใคร</em></h1><p>พลังของคนที่เลือกเส้นทางของตัวเอง</p><a class="btn btn-accent btn-lg rounded-pill px-4" href="#collection">ค้นพบสไตล์ <i class="bi bi-arrow-up-right ms-2"></i></a></div>
            </article>
            <article class="carousel-item hero-slide">
                <img class="hero-image" src="banner/banner3.png" alt="Woraphat collection banner 3">
                <div class="slide-wash"></div>
                <div class="container slide-content"><p class="eyebrow">03 / M-XL COLLECTION</p><h1>ใส่แล้ว<br><em>ว้าวมาใหญ่</em></h1><p>ดีไซน์ที่ให้คุณขยับได้เต็มที่ และโดดเด่นได้เต็มตัว</p><a class="btn btn-accent btn-lg rounded-pill px-4" href="#story">รู้จักเรา <i class="bi bi-arrow-up-right ms-2"></i></a></div>
            </article>
        </div>
        <div class="slider-controls container">
            <button class="slider-arrow" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Previous banner"><i class="bi bi-arrow-left"></i></button>
            <span class="slider-count"><strong>01</strong> / 03</span>
            <button class="slider-arrow" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Next banner"><i class="bi bi-arrow-right"></i></button>
        </div>
        <div class="slider-progress"><span></span></div>
        <a class="scroll-cue" href="#collection"><span></span> SCROLL TO EXPLORE</a>
    </section>

    <section id="collection" class="section-space collection-section">
        <div class="container">
            <div class="section-heading d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3">
                <div><p class="eyebrow">THE LATEST DROP</p><h2>Made to be <em>noticed.</em></h2></div>
                <p class="text-muted mw-copy mb-0">คอลเลกชันที่ออกแบบมาเพื่อวันที่คุณอยากโดดเด่น โดยไม่ต้องพยายามเหมือนใคร</p>
            </div>
            <div class="row g-4 mt-4 collection-grid">
                <div class="col-md-4 product-card-wrap reveal-on-scroll"><article class="product-card product-card-lime"><img class="card-image" src="banner/collection1.png" alt="Woraphat Signature collection"><span class="card-index">01</span><div class="product-info"><span>SIGNATURE</span><h3>เริ่มจาก<br>ความเป็นคุณ</h3><i class="bi bi-arrow-up-right"></i></div></article></div>
                <div class="col-md-4 product-card-wrap reveal-on-scroll"><article class="product-card product-card-dark featured"><img class="card-image" src="banner/collection2.png" alt="Woraphat M-XL collection"><span class="card-index">02</span><div class="product-info"><span>M-XL / OVERSIZED</span><h3>ขยับได้เต็มที่<br>โดดเด่นได้เต็มตัว</h3><i class="bi bi-arrow-up-right"></i></div></article></div>
                <div class="col-md-4 product-card-wrap reveal-on-scroll"><article class="product-card product-card-outline"><img class="card-image" src="banner/collection3.png" alt="Woraphat Essential collection"><span class="card-index">03</span><div class="product-info"><span>ESSENTIAL</span><h3>ใส่แล้ว<br>ไม่กลัวใคร</h3><i class="bi bi-arrow-up-right"></i></div></article></div>
            </div>
        </div>
    </section>

    <section id="story" class="story-section section-space">
        <div class="story-lines"></div>
        <div class="container"><div class="row align-items-center g-5">
            <div class="col-lg-5 reveal-on-scroll"><p class="eyebrow">OUR PHILOSOPHY</p><h2>ไม่ต้องดังที่สุด<br>แค่ <em>ชัดเจนที่สุด</em></h2><p class="story-copy mt-4">พื้นที่ของคนที่ไม่รอให้ใครนิยาม เราเชื่อว่าเสื้อผ้าที่ดีไม่ควรเปลี่ยนคุณ แต่ควรขยายเสียงของตัวตนที่มีอยู่แล้ว</p>
            <a href="https://motocollection.freedev.app/" class="contact-btn" target="_blank" rel="noopener noreferrer" aria-label="เปิดเว็บไซต์ Moto Collection">
                เริ่มบทสนทนา
            <i class="bi bi-arrow-right ms-2"></i></a></div>
            <div class="col-lg-6 offset-lg-1 reveal-on-scroll"><div class="story-manifesto"><img class="story-image-layer" src="banner/out story.png" alt="Woraphat story"><div class="manifesto-top"><span>W / 001</span><span>EST. 2024</span></div><div class="manifesto-word">BE<br><em>YOU</em></div><div class="manifesto-bottom"><span>NO RULES</span><span>JUST MOVEMENT <i class="bi bi-arrow-up-right"></i></span></div></div></div>
        </div></div>
    </section>

    <section id="contact" class="cta-section section-space"><div class="container"><div class="cta-box reveal-on-scroll"><div class="cta-circle"></div><p class="eyebrow">STAY IN THE LOOP</p><h2>พร้อมออกไปเป็น<br><em>ตัวเองหรือยัง?</em></h2><p class="cta-copy">เข้าร่วมกับคนที่เลือกเดินในจังหวะของตัวเอง รับข่าวสารคอลเลกชันใหม่ก่อนใคร</p><button class="btn btn-dark rounded-pill px-4 mt-3" data-bs-toggle="modal" data-bs-target="#authModal" data-auth-tab="register">สมัครสมาชิก <i class="bi bi-arrow-up-right ms-2"></i></button><div class="cta-marquee" aria-hidden="true">WORAPHAT / MOVE DIFFERENT / WORAPHAT / MOVE DIFFERENT /</div></div></div></section>
</main>
<footer class="py-4"><div class="container d-flex justify-content-between flex-wrap gap-2"><span class="brand-mark">WORAPHAT<span>.</span></span><small class="text-muted">© 2024 All rights reserved.</small><small class="text-muted">Designed for your next move.</small></div></footer>

<div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content auth-modal"><div class="modal-header border-0"><div><p class="eyebrow mb-1">WORAPHAT ACCOUNT</p><h3 id="authTitle">ยินดีต้อนรับกลับ</h3></div><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body pt-0"><div class="auth-tabs mb-4"><button class="active" data-tab="login">เข้าสู่ระบบ</button><button data-tab="register">สมัครสมาชิก</button></div><div id="authMessage" class="alert d-none"></div><form id="loginForm" class="auth-form"><input type="hidden" name="action" value="login"><input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>"><label>อีเมล<input type="email" name="email" required autocomplete="email"></label><label>รหัสผ่าน<input type="password" name="password" required minlength="8" autocomplete="current-password"></label><button class="btn btn-accent w-100 rounded-pill mt-2" type="submit">เข้าสู่ระบบ <i class="bi bi-arrow-right ms-2"></i></button></form><form id="registerForm" class="auth-form d-none"><input type="hidden" name="action" value="register"><input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>"><label>ชื่อที่แสดง<input type="text" name="name" required maxlength="80" autocomplete="name"></label><label>อีเมล<input type="email" name="email" required autocomplete="email"></label><label>รหัสผ่าน <small>(อย่างน้อย 8 ตัวอักษร)</small><input type="password" name="password" required minlength="8" autocomplete="new-password"></label><button class="btn btn-accent w-100 rounded-pill mt-2" type="submit">สร้างบัญชี <i class="bi bi-arrow-right ms-2"></i></button></form></div></div></div></div>

<div id="cookieBanner" class="cookie-banner"><div><strong>เราใช้คุกกี้เพื่อประสบการณ์ที่ดีขึ้น</strong><p class="mb-0 small text-white-50">คุกกี้ที่จำเป็นช่วยให้ระบบสมาชิกทำงานได้ คุณสามารถเลือกยอมรับได้</p></div><div class="d-flex gap-2 mt-3 mt-md-0"><button id="cookieReject" class="btn btn-sm btn-outline-light rounded-pill px-3">ไม่เป็นไร</button><button id="cookieAccept" class="btn btn-sm btn-light rounded-pill px-3">ยอมรับคุกกี้</button></div></div>
<script>window.AUTH_CSRF = <?= json_encode(csrf_token()) ?>;</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><script src="assets/js/app.js"></script>
</body></html>
