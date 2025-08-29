<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['user_type'] !== 'user') {
    header('Location: D.tex indai.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>My Profile - D TEX INDIA</title>
<meta name="description" content="User profile and account management for D TEX INDIA." />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<style>
  :root{
    --bg:#ffffff; --card:#FFD100; --muted:#475569; --text:#044C97;
    --brand:#004C97; --brand2:#FFD100; --accent:#2CAB57;
    --radius:20px; --shadow:0 20px 40px rgba(0,0,0,.1);
    --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  }
  *{box-sizing:border-box}
  html,body{margin:0;background:var(--bg);color:var(--text);font-family:Inter,system-ui,Segoe UI,Roboto,Arial;scroll-behavior:smooth}
  img{max-width:100%;display:block}
  a{color:inherit}
  /* NAV */
  .nav{position:sticky;top:0;z-index:50;background:#fff;border-bottom:3px solid var(--brand2);box-shadow:var(--shadow)}
  .nav-wrap{width:100%;max-width:1400px;margin:0 auto;padding:15px 30px;display:flex;align-items:center;justify-content:space-between;gap:20px}
  .brand{display:flex;align-items:center;gap:10px;text-decoration:none}
  .brand img{height:40px;border-radius:8px}
  .nav-links{display:flex;gap:14px;flex-wrap:wrap}
  .nav-links a{padding:8px 10px;border-radius:10px;text-decoration:none;font-weight:600;color:var(--text)}
  .nav-links a:hover{background:rgba(255,209,0,.18)}
  .btn{padding:10px 14px;border-radius:12px;font-weight:700;background:var(--brand);color:#fff;text-decoration:none;border:0;cursor:pointer}
  .btn.alt{background:var(--brand2);color:#111}
  .menu-btn{display:none}
  
  /* LOGIN DROPDOWN */
  .login-dropdown {
    position: relative;
    display: inline-block;
  }
  
  .login-toggle {
    cursor: pointer;
    padding: 8px 10px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    color: var(--text);
  }
  
  .login-toggle:hover {
    background: rgba(255,209,0,.18);
  }
  
  .login-menu {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    box-shadow: var(--shadow);
    min-width: 180px;
    z-index: 100;
    padding: 8px 0;
  }
  
  .login-menu a {
    display: block;
    padding: 10px 16px;
    text-decoration: none;
    color: var(--text);
    font-weight: 500;
    transition: background-color 0.2s;
  }
  
  .login-menu a:hover {
    background: rgba(255,209,0,.18);
  }
  
  .login-dropdown:hover .login-menu {
    display: block;
  }
  
  /* USER PROFILE DROPDOWN */
  .user-profile-dropdown {
    position: relative;
    display: inline-block;
  }
  
  .profile-toggle {
    cursor: pointer;
    padding: 8px 10px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    color: var(--text);
    display: flex;
    align-items: center;
    gap: 8px;
  }
  
  .profile-toggle:hover {
    background: rgba(255,209,0,.18);
  }
  
  .profile-icon {
    font-size: 16px;
  }
  
  .profile-menu {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    box-shadow: var(--shadow);
    min-width: 180px;
    z-index: 100;
    padding: 8px 0;
  }
  
  .profile-menu a {
    display: block;
    padding: 10px 16px;
    text-decoration: none;
    color: var(--text);
    font-weight: 500;
    transition: background-color 0.2s;
  }
  
  .profile-menu a:hover {
    background: rgba(255,209,0,.18);
  }
  
  .user-profile-dropdown:hover .profile-menu {
    display: block;
  }
  
  /* HERO */
  .hero{background:linear-gradient(135deg,#fdfdfd,#f2f6ff)}
  .hero-inner{width:100%;max-width:1400px;margin:0 auto;padding: 80px 30px 60px;display:grid;grid-template-columns:1.1fr .9fr;gap:40px;align-items:center}
  .title{font-weight:800;font-size:clamp(32px,4.8vw,54px);color:var(--brand);margin:0 0 8px}
  .sub{color:var(--muted);font-size:clamp(16px,1.6vw,18px)}
  .cta{display:flex;gap:12px;margin-top:20px;flex-wrap:wrap}
  .hero-media{width:100%;border-radius:18px;box-shadow:var(--shadow)}
  /* SECTION BASE */
  .section{width:100%;padding:80px 30px;background:#fff}
  .section h2{margin:0 0 10px;font-size:clamp(24px,3vw,34px);color:var(--brand)}
  .muted{color:var(--muted)}
  /* GRID / CARDS */
  .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:20px;max-width:1400px;margin:0 auto}
  .card{background:var(--card);border-radius:var(--radius);box-shadow:var(--shadow);padding:16px}
  .card img,.card iframe{width:100%;height:200px;object-fit:cover;border-radius:12px}
  .card h3{margin:10px 0 6px;font-size:18px;color:var(--brand)}
  .chip{display:inline-block;padding:6px 10px;border-radius:999px;background:var(--brand2);font-weight:700;color:#111;font-size:12px}
  
  /* USER PROFILE SECTION */
  .user-profile-container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
    margin-top: 20px;
  }
  
  .profile-card {
    background: white;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 25px;
    border-left: 4px solid var(--brand);
  }
  
  .profile-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 25px;
  }
  
  .profile-avatar {
    width: 60px;
    height: 60px;
    background: var(--brand2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .avatar-icon {
    font-size: 24px;
  }
  
  .profile-info h3 {
    margin: 0 0 5px 0;
    color: var(--brand);
    font-size: 20px;
  }
  
  .user-email {
    color: var(--muted);
    margin: 0 0 8px 0;
    font-size: 14px;
  }
  
  .user-badge {
    background: var(--brand2);
    color: #111;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
  }
  
  .profile-details {
    margin-bottom: 25px;
  }
  
  .detail-item {
    padding: 10px 0;
    border-bottom: 1px solid #f1f5f9;
  }
  
  .detail-item:last-child {
    border-bottom: none;
  }
  
  .status-active {
    background: #d1fae5;
    color: #065f46;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
  }
  
  .profile-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
  }
  
  .quick-stats {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  
  .stat-card {
    background: white;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 20px;
    text-align: center;
  }
  
  .stat-number {
    font-size: 28px;
    font-weight: 700;
    color: var(--brand);
    margin-bottom: 5px;
  }
  
  .stat-label {
    color: var(--muted);
    font-size: 14px;
  }
  
  /* CONTACT US SECTION */
  .contact-container{width:100%;max-width:1400px;margin:0 auto}
  .contact-grid{display:grid;grid-template-columns:1fr 1fr;gap:40px;margin-top:40px}
  .contact-card{background:var(--card);border-radius:var(--radius);box-shadow:var(--shadow);padding:32px;transition:all 0.3s ease;border:1px solid rgba(255,255,255,0.2)}
  .contact-card:hover{transform:translateY(-5px);box-shadow:0 20px 40px rgba(0,0,0,0.15)}
  .contact-card h3{margin:0 0 24px;font-size:24px;color:var(--brand);font-weight:700}
  .contact-info{margin-bottom:24px}
  .contact-info p{margin:0 0 16px;line-height:1.6;font-size:16px}
  .map-container{width:100%;height:280px;border-radius:15px;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,0.1)}
  .map-container iframe{width:100%;height:100%;border:0;border-radius:15px}
  .form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px}
  .form-note{font-size:12px;color:var(--muted);margin-top:8px;text-align:center}
  
  /* RESPONSIVE */
  @media (max-width:1200px){
    .grid{grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px}
  }
  
  @media (max-width:900px){
    .hero-inner{grid-template-columns:1fr;padding:40px 15px}
    .section{padding:40px 15px}
    .menu-btn{display:block;background:#fff;border:1px solid #e5e7eb;border-radius:10px;padding:8px 10px;font-weight:800}
    .nav-links{position:fixed;left:12px;right:12px;top:64px;background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:12px;display:none;flex-direction:column}
    .nav-wrap{padding:12px 15px}
    .grid{grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:15px}
    .user-profile-container{grid-template-columns:1fr}
    .profile-actions{flex-direction:column}
  }
  
  @media (max-width:600px){
    .hero-inner{padding:30px 10px}
    .section{padding:30px 10px}
    .nav-wrap{padding:10px 10px}
    .grid{grid-template-columns:1fr;gap:15px}
    .title{font-size:clamp(24px,6vw,32px)}
    .section h2{font-size:clamp(20px,5vw,28px)}
  }
  
  /* FOOTER */
  .footer{background:linear-gradient(135deg,#1e293b,#334155);color:#fff;margin-top:60px}
  .footer-content{max-width:1400px;margin:0 auto;padding:60px 30px 40px;display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:40px}
  .footer-section h4{color:var(--brand2);font-size:18px;margin-bottom:20px;font-weight:700}
  .footer-section p{color:#cbd5e1;line-height:1.6;margin-bottom:15px}
  .footer-section ul{list-style:none;padding:0;margin:0}
  .footer-section ul li{margin-bottom:10px}
  .footer-section ul li a{color:#cbd5e1;text-decoration:none;transition:color 0.3s ease}
  .footer-section ul li a:hover{color:var(--brand2)}
  
  .footer-brand{display:flex;align-items:center;gap:15px;margin-bottom:20px}
  .footer-brand img{border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.2)}
  .footer-brand h3{color:var(--brand2);font-size:20px;font-weight:700;margin:0}
  
  .social-links{display:flex;gap:15px;margin-top:20px}
  .social-links a{display:inline-block;width:40px;height:40px;background:rgba(255,255,255,0.1);border-radius:50%;text-align:center;line-height:40px;text-decoration:none;font-size:18px;transition:all 0.3s ease}
  .social-links a:hover{background:var(--brand2);color:#111;transform:translateY(-2px)}
  
  .contact-info p{margin-bottom:12px;color:#cbd5e1}
  .contact-info a{color:var(--brand2);text-decoration:none;font-weight:600}
  .contact-info a:hover{text-decoration:underline}
  
  .footer-bottom{border-top:1px solid rgba(255,255,255,0.1);padding:20px 30px;background:rgba(0,0,0,0.2)}
  .footer-bottom-content{max-width:1400px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:20px}
  .footer-bottom p{color:#94a3b8;margin:0}
  .footer-links{display:flex;gap:20px}
  .footer-links a{color:#94a3b8;text-decoration:none;font-size:14px;transition:color 0.3s ease}
  .footer-links a:hover{color:var(--brand2)}
</style>
</head>
<body>

<!-- NAV -->
<nav class="nav">
  <div class="nav-wrap">
    <a href="D.tex indai.html" class="brand">
      <img src="logo.jpeg" alt="D TEX INDIA Logo" width="70" height="60"> 
      <strong><H1>D TEX INDIA</H1></strong>
    </a>
    <div class="nav-links" id="navLinks">
      <a href="D.tex indai.html">Home</a>
      <a href="about.html">About Us</a>
      <a href="products.html">Our Products</a>
      <a href="founder.html">Our Founder</a>
      <a href="enquiry.html">Enquiry</a>
      <div class="user-profile-dropdown">
        <a href="user_profile.php" class="profile-toggle">
          <span class="profile-icon">👤</span>
          <?php echo htmlspecialchars($_SESSION['user_name']); ?>
        </a>
        <div class="profile-menu">
          <a href="user_profile.php">My Profile</a>
          <a href="logout.php">Logout</a>
        </div>
      </div>
    </ul>
    </div>
    <button class="menu-btn" id="menuBtn">Menu</button>
  </div>
</nav>

<!-- PROFILE HERO -->
<header class="hero" id="home">
  <div class="hero-inner">
    <div>
       <strong class="title">My Profile</strong>
      <h1>Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
      <p class="sub">Manage your account and view your activity with D TEX INDIA</p>
      <div class="cta">
        <a href="D.tex indai.html" class="btn">Back to Website</a>
        <a href="logout.php" class="btn alt">Logout</a>
      </div>
    </div>
    <div class="profile-avatar" style="width: 200px; height: 200px; margin: auto;">
      <span class="avatar-icon" style="font-size: 80px;">👤</span>
    </div>
  </div>
</header>

<!-- USER PROFILE SECTION -->
<section class="section" id="user-profile">
  <h2>Account Information</h2>
  <div class="user-profile-container">
    <div class="profile-card">
      <div class="profile-header">
        <div class="profile-avatar">
          <span class="avatar-icon">👤</span>
        </div>
        <div class="profile-info">
          <h3><?php echo htmlspecialchars($_SESSION['user_name']); ?></h3>
          <p class="user-email"><?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
          <span class="user-badge">Registered User</span>
        </div>
      </div>
      
      <div class="profile-details">
        <div class="detail-item">
          <strong>Account Type:</strong> Regular User
        </div>
        <div class="detail-item">
          <strong>Member Since:</strong> <?php echo date('F j, Y'); ?>
        </div>
        <div class="detail-item">
          <strong>Status:</strong> <span class="status-active">Active</span>
        </div>
        <div class="detail-item">
          <strong>Last Login:</strong> <?php echo date('F j, Y g:i A'); ?>
        </div>
      </div>
      
      <div class="profile-actions">
        <button class="btn" onclick="editProfile()">Edit Profile</button>
        <button class="btn alt" onclick="viewOrders()">My Orders</button>
        <button class="btn" onclick="contactSupport()">Contact Support</button>
      </div>
    </div>
    
    <div class="quick-stats">
      <div class="stat-card">
        <div class="stat-number">0</div>
        <div class="stat-label">Orders</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">0</div>
        <div class="stat-label">Enquiries</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">100%</div>
        <div class="stat-label">Satisfaction</div>
      </div>
    </div>
  </div>
</section>

<!-- QUICK ACTIONS -->
<section class="section" id="quick-actions">
  <h2>Quick Actions</h2>
  <div class="grid">
    <div class="card">
      <h3>📦 My Orders</h3>
      <p class="muted">View and track your orders</p>
      <button class="btn" onclick="viewOrders()">View Orders</button>
    </div>
    <div class="card">
      <h3>💬 My Enquiries</h3>
      <p class="muted">Check your enquiry status</p>
      <button class="btn" onclick="viewEnquiries()">View Enquiries</button>
    </div>
    <div class="card">
      <h3>📞 Contact Support</h3>
      <p class="muted">Get help from our team</p>
      <button class="btn" onclick="contactSupport()">Contact Us</button>
    </div>
    <div class="card">
      <h3>📱 WhatsApp Support</h3>
      <p class="muted">Quick chat with our team</p>
      <a href="https://wa.me/8780674899?text=Hello%20D%20TEX%20INDIA%2C%20I%20need%20support." target="_blank" class="btn">Chat Now</a>
    </div>
  </div>
</section>

<!-- RECENT ACTIVITY -->
<section class="section" id="activity">
  <h2>Recent Activity</h2>
  <div class="grid">
    <div class="card">
      <h3>📝 Account Created</h3>
      <p class="muted">Your account was successfully created</p>
      <span class="chip"><?php echo date('M j, Y'); ?></span>
    </div>
    <div class="card">
      <h3>🔐 Last Login</h3>
      <p class="muted">You logged in successfully</p>
      <span class="chip"><?php echo date('M j, Y g:i A'); ?></span>
    </div>
    <div class="card">
      <h3>📧 Email Verified</h3>
      <p class="muted">Your email address is confirmed</p>
      <span class="chip">Verified</span>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="footer">
  <div class="footer-content">
    <div class="footer-section">
      <div class="footer-brand">
        <img src="logo.jpeg" alt="D TEX INDIA Logo" width="60" height="50">
        <h3>D TEX INDIA</h3>
      </div>
      <p>Leading manufacturer of premium yarns and textile solutions from Surat, India. Quality, innovation, and customer satisfaction since 1998.</p>
      <div class="social-links">
        <a href="#" title="Facebook">📘</a>
        <a href="#" title="LinkedIn">💼</a>
        <a href="#" title="Instagram">📷</a>
        <a href="#" title="YouTube">📺</a>
      </div>
    </div>
    
    <div class="footer-section">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="D.tex indai.html">Home</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="products.html">Our Products</a></li>
        <li><a href="founder.html">Our Founder</a></li>
        <li><a href="enquiry.html">Contact Us</a></li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h4>Products</h4>
      <ul>
        <li><a href="products.html">Nylon Twisted Yarn</a></li>
        <li><a href="products.html">DTY</a></li>
        <li><a href="products.html">Jari / Metallic Yarn</a></li>
        <li><a href="products.html">Fabrics</a></li>
        <li><a href="products.html">Sizing Beam</a></li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h4>Contact Info</h4>
      <div class="contact-info">
        <p>📍 Ring Road, Surat, Gujarat, India</p>
        <p>📧 info@dtexindia.com</p>
        <p>📞 +91-9999999999</p>
        <p>💬 <a href="https://wa.me/919999999999?text=Hello%20D%20TEX%20INDIA" target="_blank" rel="noopener">WhatsApp</a></p>
      </div>
    </div>
  </div>
  
  <div class="footer-bottom">
    <div class="footer-bottom-content">
      <p>© <span id="year"></span> D TEX INDIA • All Rights Reserved</p>
      <div class="footer-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="#">Sitemap</a>
      </div>
    </div>
  </div>
</footer>

<script>
  // Year
  document.getElementById('year').textContent = new Date().getFullYear();

  // Mobile menu toggle
  const menuBtn = document.getElementById('menuBtn');
  const navLinks = document.getElementById('navLinks');
  menuBtn?.addEventListener('click', () => {
    navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
  });

  // Profile functions
  function editProfile() {
    alert('Edit Profile functionality will be implemented soon!');
  }
  
  function viewOrders() {
    alert('My Orders functionality will be implemented soon!');
  }
  
  function viewEnquiries() {
    alert('My Enquiries functionality will be implemented soon!');
  }
  
  function contactSupport() {
    window.location.href = 'D.tex indai.html#contact';
  }
</script>
</body>
</html> 