# Apllied-Web

## HƯỚNG DẪN DỰ ÁN ASSIGNMENT 1 - PACIFIC ALLIANCES SOFTWARE COMPANY LTD

Tài liệu này tổng hợp cấu trúc mã nguồn trang **Home (`index.html`)**, khối **Header / Navbar dùng chung**, và danh sách **id/class cùng bảng mã màu** để bạn gửi cho thành viên phụ trách CSS.

---

## 1. Thông tin công ty (Theo Wireframe)
- **Tên công ty:** `Pacific Alliances Software Company LTD`
- **Địa chỉ:** `114 Special street, Singapore`
- **Bộ 4 trang trong đề tài:**
  1. `index.html` - Trang chủ (Home)
  2. `job.html` - Danh sách tuyển dụng (Jobs)
  3. `apply.html` - Form ứng tuyển (Apply)
  4. `about.html` - Giới thiệu công ty (About Us)

---

## 2. Khối Header & Navbar dùng chung cho 4 trang

Khi các bạn làm trang `job.html`, `apply.html`, và `about.html`, chỉ cần **sao chép nguyên khối `<header>`** dưới đây vào đầu thẻ `<body>` của từng trang. 
> **Lưu ý:** Chỉ cần chuyển class `active` vào thẻ `<a>` của trang tương ứng:

```html
<!-- ================= HEADER & NAVBAR CHUNG ================= -->
<header id="main-header" class="site-header">
    <div id="header-container" class="header-container">
        
        <!-- Tên công ty / Thương hiệu (Bên trái) -->
        <div id="company-branding" class="branding-box">
            <h1 id="site-title" class="company-name">Pacific Alliances Software Company LTD</h1>
            <p id="site-tagline" class="company-tagline">Empowering Innovation, Engineering Excellence</p>
        </div>

        <!-- Thanh menu điều hướng 4 trang -->
        <nav id="main-navbar" class="site-navbar" aria-label="Main Navigation">
            <ul id="navbar-menu" class="navbar-list">
                <li class="navbar-item">
                    <a id="nav-link-home" class="navbar-link" href="index.html">Home</a>
                </li>
                <li class="navbar-item">
                    <a id="nav-link-jobs" class="navbar-link" href="job.html">Jobs</a>
                </li>
                <li class="navbar-item">
                    <a id="nav-link-apply" class="navbar-link" href="apply.html">Apply</a>
                </li>
                <li class="navbar-item">
                    <a id="nav-link-about" class="navbar-link" href="about.html">About Us</a>
                </li>
            </ul>
        </nav>

        <!-- Logo công ty (Bên phải - Tuỳ chọn theo bản vẽ) -->
        <div id="header-logo-container" class="logo-box">
            <a href="index.html" class="logo-link">
                <img id="company-logo" class="site-logo" src="images/logo.svg" alt="Pacific Alliances Software Company LTD Logo">
            </a>
        </div>

    </div>
</header>
<!-- ======================================================== -->
```

*Ví dụ:* 
- Trên `index.html`: Thẻ Home có `class="navbar-link active"`
- Trên `job.html`: Thẻ Jobs có `class="navbar-link active"`
- Trên `apply.html`: Thẻ Apply có `class="navbar-link active"`
- Trên `about.html`: Thẻ About Us có `class="navbar-link active"`

---

## 3. Bảng mã màu gợi ý cho thành viên làm CSS (Theo Wireframe)

Trong ảnh thiết kế có ghi chú: *"Structure color scheme: Shades of blue (remember to share before finalized the product)"*. 

Bạn có thể gửi gợi ý cấu hình CSS Variables này cho người làm CSS:

```css
:root {
    --color-fuji-purple: #9F9BD3;    /* Fuji purple (sf18) */
    --color-blue-violet: #7165B9;    /* Blue-violet (sf20) */
    --color-kikyo-iroiro: #4D63C2;   /* Kikyo-iroiro (D18) */
    --color-iris: #8048B8;           /* Iris (D20) */
    --color-hanada: #387DA4;         /* 縹色 / Hanada (D16) */
    --color-dark-blue: #293671;      /* Dark blue (DK18) */
    --color-bg-light: #F8F9FE;
    --color-text-dark: #1E2442;
    --color-white: #FFFFFF;
}
```

---

## 4. Bảng tra cứu các `id` và `class` chính trên trang `index.html`

| Vị trí / Khối | Thẻ HTML | ID | Class chính |
| :--- | :--- | :--- | :--- |
| **Toàn trang** | `<body>` | `page-home` | `home-page` |
| **Header** | `<header>` | `main-header` | `site-header` |
| Khung chứa header | `<div>` | `header-container` | `header-container` |
| Tên công ty | `<div>`, `<h1>` | `company-branding`, `site-title` | `branding-box`, `company-name` |
| Menu điều hướng | `<nav>`, `<ul>`, `<a>` | `main-navbar`, `navbar-menu`, `nav-link-*` | `site-navbar`, `navbar-list`, `navbar-link` (kèm `.active`) |
| Logo | `<div>`, `<img>` | `header-logo-container`, `company-logo` | `logo-box`, `site-logo` |
| **Nội dung chính** | `<main>` | `main-content` | `content-wrapper` |
| **1. Hero Banner** | `<section>` | `hero-section` | `hero-banner` |
| Nút hành động | `<a>` | `hero-btn-explore`, `hero-btn-apply` | `action-btn`, `primary-btn`, `secondary-btn` |
| **2. Giới thiệu tổng quan** | `<section>` | `intro-section` | `overview-section` |
| Hộp giới thiệu | `<article>` | `intro-box-mission`, `intro-box-workplace`, `intro-box-talent` | `content-box`, `intro-card` |
| **3. Lý do gia nhập (Boxes)** | `<section>` | `benefits-section` | `perks-section` |
| Lưới chứa các box | `<div>` | `perks-boxes-grid` | `boxes-grid-container` |
| Từng hộp phúc lợi | `<div>` | `perk-box-compensation`, `perk-box-techstack`, ... | `content-box`, `perk-item` |
| **4. Việc làm nổi bật** | `<section>` | `featured-jobs-section` | `featured-jobs-container` |
| Thẻ việc làm | `<article>` | `job-card-frontend`, `job-card-devops`, `job-card-ai` | `content-box`, `job-preview-card` |
| **5. Quy trình ứng tuyển** | `<section>` | `process-section` | `recruitment-process-section` |
| Hộp từng bước | `<div>` | `step-box-1`, `step-box-2`, `step-box-3`, `step-box-4` | `content-box`, `process-step-box` |
| **6. Khối kêu gọi (CTA)** | `<section>` | `cta-section` | `cta-banner-section`, `content-box`, `cta-card-box` |
| **Footer** | `<footer>` | `main-footer` | `site-footer` |
| Các cột footer | `<div>` | `footer-company-info`, `footer-quick-links`, `footer-contact-info`, `footer-social-info` | `footer-col`, `company-info-col`, `quick-links-col`, `contacts-col`, `social-col` |
| Bản quyền | `<div>`, `<p>` | `footer-copyright`, `copyright-notice` | `footer-bottom-bar`, `copyright-text` |
