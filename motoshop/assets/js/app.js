document.addEventListener('DOMContentLoaded', () => {
  const carousel = document.getElementById('heroCarousel');
  const slideCount = document.querySelector('.slider-count strong');
  const progress = document.querySelector('.slider-progress span');
  if (carousel && slideCount && progress) {
    const updateCarouselMeta = (index) => {
      slideCount.textContent = String(index + 1).padStart(2, '0');
      progress.classList.remove('is-running');
      void progress.offsetWidth;
      progress.classList.add('is-running');
    };
    updateCarouselMeta(0);
    carousel.addEventListener('slid.bs.carousel', (event) => updateCarouselMeta(event.to));
  }

  const animatedSections = document.querySelectorAll('.reveal-on-scroll, .cta-box');
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries, sectionObserver) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          sectionObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.16 });
    animatedSections.forEach((section) => observer.observe(section));
  } else {
    animatedSections.forEach((section) => section.classList.add('is-visible'));
  }

  const cookieBanner = document.getElementById('cookieBanner');
  if (localStorage.getItem('cookieConsent')) cookieBanner.classList.add('hidden');
  document.getElementById('cookieAccept').addEventListener('click', () => { localStorage.setItem('cookieConsent', 'accepted'); cookieBanner.classList.add('hidden'); });
  document.getElementById('cookieReject').addEventListener('click', () => { localStorage.setItem('cookieConsent', 'rejected'); cookieBanner.classList.add('hidden'); });

  const title = document.getElementById('authTitle');
  const message = document.getElementById('authMessage');
  const tabs = document.querySelectorAll('[data-tab]');
  const setTab = (tab) => {
    document.getElementById('loginForm').classList.toggle('d-none', tab !== 'login');
    document.getElementById('registerForm').classList.toggle('d-none', tab !== 'register');
    title.textContent = tab === 'login' ? 'ยินดีต้อนรับกลับ' : 'สร้างบัญชีของคุณ';
    tabs.forEach((item) => item.classList.toggle('active', item.dataset.tab === tab));
    message.className = 'alert d-none';
  };
  tabs.forEach((tab) => tab.addEventListener('click', () => setTab(tab.dataset.tab)));
  document.querySelectorAll('[data-auth-tab]').forEach((button) => button.addEventListener('click', () => setTab(button.dataset.authTab)));

  document.querySelectorAll('.auth-form').forEach((form) => form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const submit = form.querySelector('button[type="submit"]');
    submit.disabled = true;
    try {
      const response = await fetch('auth.php', { method: 'POST', body: new FormData(form), headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      const result = await response.json();
      message.textContent = result.message;
      message.className = `alert ${result.success ? 'alert-success' : 'alert-danger'}`;
      if (result.success) setTimeout(() => window.location.reload(), 650);
    } catch (error) {
      message.textContent = 'ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้ กรุณาลองใหม่';
      message.className = 'alert alert-danger';
    } finally { submit.disabled = false; }
  }));
});
