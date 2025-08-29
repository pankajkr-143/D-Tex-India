# D TEX INDIA - File Structure

## 📁 Project Organization

```
D TEX INDIA Website/
├── 📄 D.tex indai.html          # Main landing page (root)
├── 📄 index.php                 # Entry point
├── 📄 .htaccess                 # Apache configuration
├── 📄 README.md                 # Project documentation
├── 📄 PROJECT_NOTES.md          # Technical notes
├── 📄 update_paths.sh           # Path update script
├── 📄 FILE_STRUCTURE.md         # This file
│
├── 📁 pages/                    # All HTML and PHP pages
│   ├── 📄 about.html            # About Us page
│   ├── 📄 products.html         # Products page
│   ├── 📄 founder.html          # Founder page
│   ├── 📄 enquiry.html          # Contact/Enquiry page
│   ├── 📄 user_profile.php      # User profile page
│   ├── 📄 admin_dashboard.php   # Admin dashboard
│   ├── 📄 user_dashboard.php    # User dashboard
│   └── 📄 navigation.php        # Navigation component
│
├── 📁 auth/                     # Authentication system
│   ├── 📄 auth_handler.php      # Core auth logic
│   ├── 📄 admin_login.php       # Admin login page
│   ├── 📄 user_login.php        # User login page
│   ├── 📄 user_signup.php       # User registration page
│   ├── 📄 logout.php            # Logout handler
│   ├── 📄 login.php             # Legacy login page
│   └── 📄 login.html            # Legacy login HTML
│
├── 📁 config/                   # Configuration files
│   ├── 📄 database.php          # Database configuration
│   └── 📄 test_db.php           # Database testing
│
├── 📁 database/                 # Database files
│   └── 📄 users.db              # SQLite database
│
└── 📁 assets/                   # Static assets
    ├── 📁 images/               # All images
    │   ├── 📄 logo.jpeg         # Company logo
    │   ├── 📄 daga.webp         # Hero banner
    │   ├── 📄 1.jpg             # Product image 1
    │   ├── 📄 2.jpg             # Product image 2
    │   ├── 📄 3.jpg             # Product image 3
    │   ├── 📄 4.jpg             # Product image 4
    │   ├── 📄 5.jpg             # Product image 5
    │   ├── 📄 6.jpg             # Product image 6
    │   └── 📄 yarn.jpeg         # Yarn image
    ├── 📁 css/                  # Stylesheets (future)
    └── 📁 js/                   # JavaScript files (future)
```

## 🔗 Navigation Structure

### Main Navigation (D.tex indai.html)
- **Home** → `#home` (same page)
- **About Us** → `pages/about.html`
- **Our Products** → `pages/products.html`
- **Our Founder** → `pages/founder.html`
- **Enquiry** → `pages/enquiry.html`

### Authentication Links
- **Admin Login** → `auth/admin_login.php`
- **User Login** → `auth/user_login.php`
- **User Signup** → `auth/user_signup.php`
- **Logout** → `auth/logout.php`

### User Profile
- **My Profile** → `pages/user_profile.php`
- **Admin Dashboard** → `pages/admin_dashboard.php`

## 🖼️ Image References

### Logo
- **Path**: `assets/images/logo.jpeg`
- **Usage**: Navigation, footer, all pages

### Hero Banner
- **Path**: `assets/images/daga.webp`
- **Usage**: Main landing page hero section

### Product Images
- **Path**: `assets/images/1.jpg` to `assets/images/6.jpg`
- **Usage**: Product showcases, gallery sections

## 🔧 Technical Details

### File Paths
- **Root Level**: `D.tex indai.html` and `index.php`
- **Pages**: All HTML/PHP pages in `pages/` folder
- **Auth**: All authentication files in `auth/` folder
- **Assets**: All images in `assets/images/` folder

### Relative Paths
- **From Root**: Direct file names (e.g., `pages/about.html`)
- **From Pages**: `../` to go up one level (e.g., `../D.tex indai.html`)
- **From Auth**: `../` to go up one level (e.g., `../pages/user_profile.php`)

### Database
- **Location**: `database/users.db`
- **Config**: `config/database.php`
- **Testing**: `config/test_db.php`

## 🚀 Deployment Notes

1. **Root Directory**: Only `D.tex indai.html` and essential files
2. **Organized Structure**: All other files in appropriate folders
3. **Clean URLs**: Proper relative paths throughout
4. **Asset Management**: Images centralized in `assets/images/`
5. **Security**: Auth files separated from public pages

## 📝 Maintenance

### Adding New Pages
1. Place HTML files in `pages/` folder
2. Update navigation links in `D.tex indai.html`
3. Update footer links in all pages
4. Ensure proper relative paths

### Adding New Images
1. Place images in `assets/images/` folder
2. Update image references with `assets/images/filename`
3. Optimize images for web use

### Updating Paths
Use the `update_paths.sh` script to automatically update all file references when moving files. 