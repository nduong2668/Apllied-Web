<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="about page for team 2" />
  <meta name="keywords" content="HTML5, CSS" />
  <meta name="author" content="103488159"  />
  <title>About Us - Pacific Alliances Smart City Consultancy LTD</title>
  <!-- embedded css -->
  <style>
        .about-page-badge {
        display: inline-block;
        background-color: rgba(255, 255, 255, 0.2);
        color: #FFFFFF;
        padding: 6px 16px;
        border-radius: 999px;
        font-size: 0.88rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 14px;
        border: 1px solid rgba(255, 255, 255, 0.4);
      }
  </style>

  <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>
<?php
    include 'header.inc';
?>

    <main id="main-content" class="content-wrapper">

        <section class="about-custom-banner">
            <span class="about-page-badge">Group G02 Team Profile</span>
            <h2 class="hero-title">Meet Our Team (Group G02)</h2>
            <p class="hero-subtitle">We totally did not go off topic for this assignment at all :)</p>
        </section>

        <section class="overview-section content-box about-section-spacing">
            <h2 class="section-title">Group &amp; Class Information</h2>
            <ul class="about-list-disc">
                <li><strong>Group Name: </strong>Group 2
                    <ul class="about-list-circle">
                        <li><strong>Class Day: </strong>Wednesday</li>
                        <li><strong>Class Time: </strong>9:00 AM to 12:00 PM</li>
                    </ul>
                </li>
            </ul>
        </section>

        <section class="overview-section content-box about-section-spacing">
            <h2 class="section-title">Member Contributions &amp; Personal Quotes</h2>
            <dl class="about-dl">
                <dt class="member-dt">Le Anh - <span class="student-id">106948193</span></dt>
                <dd class="member-dd"><strong>Contribution: </strong>index.html and the header + footer</dd>
                <dd class="member-dd"><strong>First Language Quote: </strong>"Đến giờ TFT rồi."</dd>
                <dd class="member-dd"><strong>English Translation: </strong>"Time for some TFT."</dd>

                <dt class="member-dt">Nguyen Ngoc Duong - <span class="student-id">106948193</span></dt>
                <dd class="member-dd"><strong>Contribution: </strong>Repo and Jira master, apply.html</dd>
                <dd class="member-dd"><strong>First Language Quote: </strong>"Cho tôi thêm tý việc đê."</dd>
                <dd class="member-dd"><strong>English Translation: </strong>"Can I please get more tasks."</dd>
                
                <dt class="member-dt">Vuong Quan Ngoc Minh - <span class="student-id">103488159</span></dt>
                <dd class="member-dd"><strong>Contribution: </strong>Tasks manager, about.html</dd>
                <dd class="member-dd"><strong>First Language Quote: </strong>"Sợ gì?"</dd>
                <dd class="member-dd"><strong>English Translation: </strong>"What's to worry about?"</dd>

                <dt class="member-dt">Tran An Nguyen - <span class="student-id">106724856</span></dt>
                <dd class="member-dd"><strong>Contribution: </strong>jobs.html and general CSS cleanup</dd>
                <dd class="member-dd"><strong>First Language Quote: </strong>"public repository"</dd>
                <dd class="member-dd"><strong>English Translation: </strong>"That's his real quote, I took it from the work chat"</dd>
            </dl>
        </section>

        <section class="overview-section content-box about-section-spacing about-center-align">
            <h2 class="section-title">Group Photo</h2>
            <!--inline css-->
            <figure class="bordered-figure" style="border-style: dashed;">
                <img src="images/group.png" alt="Group G02 Team Photo" class="group-photo-img">
                <figcaption style="margin-top: 10px; font-size: 0.9rem; color: var(--text-secondary);">
                    Taken via Google Meet - 31/10/2026
                </figcaption>
            </figure>
        </section>

        <section class="overview-section content-box about-section-spacing">
            <h2 class="section-title">Team Fun Facts</h2>
            <table class="fun-facts-table">
                <caption>Some fun fact about us!!!</caption>
                <thead>
                    <tr>
                        <th scope="col">Member Name</th>
                        <th scope="col">Funfact!</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Le Anh</td>
                        <td>Team fight tactics, playing team fight tactics and other hobbies but TFT first</td>
                    </tr>
                    <tr>
                        <td>Nguyen Ngoc Duong</td>
                        <td>Swinging with firends and working hard. Always busy</td>
                    </tr>
                    <tr>
                        <td>Vuong Quan Ngoc Minh</td>
                        <td>Hanoi man. Like doing background work and games too I guess</td>
                    </tr>
                    <tr>
                        <td>Tran An Nguyen</td>
                        <td>Quiet but much more brighter and open than people thought</td>
                    </tr>
                </tbody>
            </table>
        </section>

    </main>

<?php
    include 'footer.inc';
?>
</body>