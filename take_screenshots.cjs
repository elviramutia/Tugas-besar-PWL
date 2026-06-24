const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

const delay = (ms) => new Promise(res => setTimeout(res, ms));

(async () => {
    const screenshotDir = path.join(__dirname, 'screenshots');
    if (!fs.existsSync(screenshotDir)){
        fs.mkdirSync(screenshotDir);
    }

    const browser = await puppeteer.launch({
        executablePath: 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe',
        headless: 'new',
        defaultViewport: { width: 1280, height: 800 }
    });
    const page = await browser.newPage();

    console.log('Taking screenshot of Login page...');
    await page.goto('http://127.0.0.1:8000/login', { waitUntil: 'networkidle2' });
    await page.screenshot({ path: path.join(screenshotDir, '01_Login_Page.png'), fullPage: true });

    // Login as Admin
    console.log('Logging in as Admin...');
    await page.type('#login_id', 'admin@siakad.com');
    await page.type('#password', 'password');
    await Promise.all([
        page.click('button[type="submit"]'),
        page.waitForNavigation({ waitUntil: 'networkidle2' }),
    ]);

    // Admin Pages
    console.log('Taking Admin screenshots...');
    const adminPages = [
        { name: '02_Admin_Dashboard', url: 'http://127.0.0.1:8000/admin/dashboard' },
        { name: '03_Admin_Pengguna', url: 'http://127.0.0.1:8000/admin/users' },
        { name: '04_Admin_Dosen', url: 'http://127.0.0.1:8000/admin/dosen' },
        { name: '05_Admin_Mahasiswa', url: 'http://127.0.0.1:8000/admin/mahasiswa' },
        { name: '06_Admin_Matakuliah', url: 'http://127.0.0.1:8000/admin/matakuliah' },
        { name: '07_Admin_Jadwal', url: 'http://127.0.0.1:8000/admin/jadwal' },
    ];

    for (let p of adminPages) {
        await page.goto(p.url, { waitUntil: 'networkidle2' });
        await delay(1000); // give it a sec for any animations
        await page.screenshot({ path: path.join(screenshotDir, p.name + '.png'), fullPage: true });
        console.log(`Saved ${p.name}.png`);
    }

    // Logout
    console.log('Logging out...');
    await page.goto('http://127.0.0.1:8000/dashboard', { waitUntil: 'networkidle2' });
    // Need to trigger logout, which is a POST request.
    // We can evaluate JS to submit the logout form.
    await page.evaluate(() => {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/logout';
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const tokenInput = document.createElement('input');
        tokenInput.type = 'hidden';
        tokenInput.name = '_token';
        tokenInput.value = csrfToken;
        form.appendChild(tokenInput);
        document.body.appendChild(form);
        form.submit();
    });
    await page.waitForNavigation({ waitUntil: 'networkidle2' });

    console.log('Logging in as Mahasiswa...');
    await page.goto('http://127.0.0.1:8000/login', { waitUntil: 'networkidle2' });
    await page.type('#login_id', 'elvira@siakad.com');
    await page.type('#password', 'password');
    await Promise.all([
        page.click('button[type="submit"]'),
        page.waitForNavigation({ waitUntil: 'networkidle2' }),
    ]);

    // Mahasiswa Pages
    console.log('Taking Mahasiswa screenshots...');
    const mhsPages = [
        { name: '08_Mahasiswa_Dashboard', url: 'http://127.0.0.1:8000/mahasiswa/dashboard' },
        { name: '09_Mahasiswa_KRS', url: 'http://127.0.0.1:8000/mahasiswa/krs' },
        { name: '10_Mahasiswa_Absensi', url: 'http://127.0.0.1:8000/mahasiswa/absensi' },
    ];

    for (let p of mhsPages) {
        await page.goto(p.url, { waitUntil: 'networkidle2' });
        await delay(1000);
        await page.screenshot({ path: path.join(screenshotDir, p.name + '.png'), fullPage: true });
        console.log(`Saved ${p.name}.png`);
    }

    await browser.close();
    console.log('All done!');
})();
