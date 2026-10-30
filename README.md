# Applied-Web - Assignment 1

## Pacific Alliances Software Company LTD - Career & Recruitment Portal

This documentation outlines the source code structure, shared **Header & Navbar**, and the complete **ID/Class reference and Color Palette** for the project.

---

## 1. Company Information (From Design Wireframe)
- **Company Name:** `Pacific Alliances Software Company LTD`
- **Address:** `114 Special street, Singapore`
- **4 Website Pages:**
  1. `index.html` - Homepage
  2. `job.html` - Job Position Descriptions
  3. `apply.html` - Job Application Form
  4. `about.html` - About Us

---

## 2. Shared Header & Navbar Block (Common to All 4 Pages)

When creating or maintaining `job.html`, `apply.html`, and `about.html`, copy the `<header>` block below into the top of the `<body>`:
> **Note:** Move the `class="navbar-link active"` attribute to the link corresponding to each current page.

```html
<!-- ================= SHARED HEADER & NAVBAR ================= -->
<header id="main-header" class="site-header">
    <div id="header-container" class="header-container">
        
        <!-- Company Branding (Left) -->
        <div id="company-branding" class="branding-box">
            <h1 id="site-title" class="company-name">Pacific Alliances Software Company LTD</h1>
            <p id="site-tagline" class="company-tagline">Empowering Innovation, Engineering Excellence</p>
        </div>

        <!-- 4-Box Navigation Menu -->
        <nav id="main-navbar" class="site-navbar" aria-label="Main Navigation">
            <ul id="navbar-menu" class="navbar-list">
                <li class="navbar-item">
                    <a id="nav-link-home" class="navbar-link active" href="index.html">Home</a>
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

        <!-- Company Logo (Right - Optional as per wireframe) -->
        <div id="header-logo-container" class="logo-box">
            <a href="index.html" class="logo-link">
                <img id="company-logo" class="site-logo" src="images/logo.svg" alt="Pacific Alliances Software Company LTD Logo">
            </a>
        </div>

    </div>
</header>
<!-- ================= END SHARED HEADER & NAVBAR ================= -->
```

*Examples:*
- On `index.html`: Home link has `class="navbar-link active"`
- On `job.html`: Jobs link has `class="navbar-link active"`
- On `apply.html`: Apply link has `class="navbar-link active"`
- On `about.html`: About Us link has `class="navbar-link active"`

---

## 3. Color Palette Configuration (CSS Variables)

From the wireframe: *"Structure color scheme: Shades of blue (remember to share before finalized the product)"*:

```css
:root {
    --color-fuji-purple:  #9F9BD3; /* Fuji purple (sf18) */
    --color-blue-violet:  #7165B9; /* Blue-violet (sf20) */
    --color-kikyo-iroiro: #4D63C2; /* Kikyo-iroiro (D18) */
    --color-iris:         #8048B8; /* Iris (D20) */
    --color-hanada:       #387DA4; /* Hanada blue (D16) */
    --color-dark-blue:    #293671; /* Dark blue (DK18) */
    --color-bg-light:     #F8F9FE;
    --color-text-dark:    #1E2442;
    --color-white:        #FFFFFF;
}
```

---

## 4. Key Elements, IDs and Classes Reference

| Section / Component | HTML Tag | ID | Main Classes |
| :--- | :--- | :--- | :--- |
| **Page Body** | `<body>` | `page-home` | `home-page` |
| **Header** | `<header>` | `main-header` | `site-header` |
| Header Wrapper | `<div>` | `header-container` | `header-container` |
| Company Branding | `<div>`, `<h1>` | `company-branding`, `site-title` | `branding-box`, `company-name` |
| Navigation Menu | `<nav>`, `<ul>`, `<a>` | `main-navbar`, `navbar-menu`, `nav-link-*` | `site-navbar`, `navbar-list`, `navbar-link` (with `.active`) |
| Logo | `<div>`, `<img>` | `header-logo-container`, `company-logo` | `logo-box`, `site-logo` |
| **Main Content** | `<main>` | `main-content` | `content-wrapper` |
| **1. Hero Banner** | `<section>` | `hero-section` | `hero-banner` |
| Action Buttons | `<a>` | `hero-btn-explore`, `hero-btn-apply` | `action-btn`, `primary-btn`, `secondary-btn` |
| **2. Company Overview** | `<section>` | `intro-section` | `overview-section` |
| Overview Cards | `<article>` | `intro-box-mission`, `intro-box-workplace`, `intro-box-talent` | `content-box`, `intro-card` |
| **3. Why Join Us (Perks)** | `<section>` | `benefits-section` | `perks-section` |
| Grid Container | `<div>` | `perks-boxes-grid` | `boxes-grid-container` |
| Perk Items | `<div>` | `perk-box-compensation`, `perk-box-techstack`, ... | `content-box`, `perk-item` |
| **4. Featured Openings** | `<section>` | `featured-jobs-section` | `featured-jobs-container` |
| Job Preview Cards | `<article>` | `job-card-frontend`, `job-card-devops`, `job-card-ai` | `content-box`, `job-preview-card` |
| **5. Hiring Process** | `<section>` | `process-section` | `recruitment-process-section` |
| Step Cards | `<div>` | `step-box-1`, `step-box-2`, `step-box-3`, `step-box-4` | `content-box`, `process-step-box` |
| **6. Call To Action (CTA)** | `<section>` | `cta-section` | `cta-banner-section`, `content-box`, `cta-card-box` |
| **Footer** | `<footer>` | `main-footer` | `site-footer` |
| Footer Columns | `<div>` | `footer-company-info`, `footer-quick-links`, `footer-contact-info`, `footer-social-info` | `footer-col`, `company-info-col`, `quick-links-col`, `contacts-col`, `social-col` |
| Copyright Bar | `<div>`, `<p>` | `footer-copyright`, `copyright-notice` | `footer-bottom-bar`, `copyright-text` |
