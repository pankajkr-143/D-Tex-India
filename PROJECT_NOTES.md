# D TEX INDIA - Complete Project Documentation

## Project Overview
A complete web application for D TEX INDIA textile company featuring user authentication, admin dashboard, and responsive design. Built with PHP backend, SQLite database, and modern HTML/CSS/JavaScript frontend.

## Technology Stack
- **Backend**: PHP 7.4+
- **Database**: SQLite
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Server**: PHP Built-in Server
- **Authentication**: Session-based with password hashing

## Project Structure
```
New folder/
├── config/
│   └── database.php          # Database connection and setup
├── auth/
│   └── auth_handler.php      # Authentication logic
├── database/
│   └── users.db             # SQLite database file
├── D.tex indai.html         # Main landing page
├── user_profile.php         # User profile page
├── admin_dashboard.php      # Admin dashboard
├── admin_login.php          # Admin login page
├── user_login.php           # User login page
├── user_signup.php          # User registration page
├── logout.php               # Logout handler
├── index.php                # Entry point
├── .htaccess                # Apache configuration
└── Various image files      # Logo, product images, etc.
```

## Database Integration

### 1. Database Configuration (`config/database.php`)

**Purpose**: Establishes database connection and creates necessary tables.

**Key Features**:
- SQLite database connection using PDO
- Automatic table creation if not exists
- Default admin user creation
- Error handling with try-catch blocks

**Database Schema**:
```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    user_type TEXT DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

**Default Admin Credentials**:
- Email: admin@dtexindia.com
- Password: admin123
- User Type: admin

**Usage**:
```php
require_once 'config/database.php';
$db = new Database();
$pdo = $db->getConnection();
```

### 2. Database File Location
- **Path**: `database/users.db`
- **Permissions**: Ensure writable by web server
- **Backup**: Regular backups recommended

## Authentication System

### 1. Authentication Handler (`auth/auth_handler.php`)

**Purpose**: Central authentication logic for login, signup, and session management.

**Key Methods**:

#### `signup($name, $email, $password, $user_type = 'user')`
- Validates input data
- Checks for existing email
- Hashes password using `password_hash()`
- Inserts new user into database
- Returns success/error response

#### `login($email, $password)`
- Validates credentials
- Verifies password using `password_verify()`
- Sets session variables
- Returns user type and redirect URL

#### `logout()`
- Destroys session
- Clears all session variables
- Redirects to landing page

#### `isLoggedIn()`
- Checks if user session exists
- Returns boolean status

#### `requireAuth()`
- Redirects to landing page if not logged in
- Used for protecting user-only pages

#### `requireAdmin()`
- Checks if user is admin
- Redirects non-admins to user profile
- Used for protecting admin-only pages

**Session Variables Set**:
```php
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_email'] = $user['email'];
$_SESSION['user_type'] = $user['user_type'];
$_SESSION['logged_in'] = true;
```

### 2. Login Pages

#### Admin Login (`admin_login.php`)
- Dedicated admin authentication
- Redirects to admin dashboard on success
- Demo credentials provided
- AJAX form submission

#### User Login (`user_login.php`)
- Regular user authentication
- Redirects to user profile on success
- AJAX form submission
- Session validation

#### User Signup (`user_signup.php`)
- New user registration
- Email uniqueness validation
- Password confirmation
- Automatic login after signup

### 3. Logout Handler (`logout.php`)
- Destroys session completely
- Redirects to main landing page
- Clears all authentication data

## Frontend Integration

### 1. Main Landing Page (`D.tex indai.html`)

**Key Features**:
- PHP session integration at top
- Dynamic navigation based on login status
- Responsive design with modern CSS
- Full-width layout optimization

**Navigation Logic**:
```php
<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
    <!-- Show Profile Icon and User Menu -->
<?php else: ?>
    <!-- Show Login Dropdown -->
<?php endif; ?>
```

**CSS Improvements**:
- Modern color scheme with CSS variables
- Smooth animations and transitions
- Hover effects and micro-interactions
- Mobile-first responsive design
- Full-width layout with max-width containers

### 2. User Profile Page (`user_profile.php`)

**Purpose**: Dedicated page for logged-in users to view their profile.

**Features**:
- Session protection with `requireAuth()`
- Displays user information
- Account management options
- Same styling as main page for consistency

**Content Structure**:
- User details (name, email, account type)
- Member since date
- Action buttons
- Contact information

### 3. Admin Dashboard (`admin_dashboard.php`)

**Purpose**: Administrative interface for managing the system.

**Features**:
- Admin-only access with `requireAdmin()`
- User management capabilities
- System statistics
- Administrative tools

## Form Handling and AJAX

### 1. AJAX Implementation

**Login/Signup Forms**:
```javascript
// Form submission via AJAX
fetch('auth/auth_handler.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: formData
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        window.location.href = data.redirect;
    } else {
        // Show error message
    }
});
```

### 2. Form Validation

**Client-side**:
- HTML5 validation attributes
- JavaScript form validation
- Real-time feedback

**Server-side**:
- PHP input sanitization
- Database validation
- Error handling and response

## Security Features

### 1. Password Security
- **Hashing**: `password_hash()` with bcrypt
- **Verification**: `password_verify()` for login
- **Strength**: Minimum requirements enforced

### 2. Session Security
- **Session Start**: `session_start()` on all pages
- **Session Validation**: Checks on protected pages
- **Session Destruction**: Complete cleanup on logout

### 3. Input Sanitization
- **SQL Injection Prevention**: PDO prepared statements
- **XSS Prevention**: `htmlspecialchars()` for output
- **CSRF Protection**: Session-based tokens (can be enhanced)

### 4. File Security
- **`.htaccess`**: Prevents direct access to sensitive files
- **Database Protection**: `.db` files not directly accessible
- **Error Handling**: Custom error pages

## Responsive Design

### 1. CSS Framework
- **Custom CSS**: No external frameworks
- **CSS Variables**: Consistent theming
- **Flexbox/Grid**: Modern layout techniques

### 2. Breakpoints
- **Desktop**: 1200px+
- **Tablet**: 900px - 1199px
- **Mobile**: 600px - 899px
- **Small Mobile**: < 600px

### 3. Mobile Features
- **Touch-friendly**: Large buttons and inputs
- **Responsive Images**: Optimized for all screen sizes
- **Mobile Menu**: Collapsible navigation
- **Form Optimization**: Stacked inputs on mobile

## Contact Us Section

### 1. Layout Structure
```html
<div class="contact-container">
    <div class="contact-grid">
        <div class="contact-card">
            <!-- Contact Information -->
        </div>
        <div class="contact-card">
            <!-- Contact Form -->
        </div>
    </div>
</div>
```

### 2. Form Layout
- **Two-column layout** on desktop
- **Single-column layout** on mobile
- **Responsive form rows** for input fields
- **Google Maps integration**

### 3. Styling Features
- **Hover effects** on cards
- **Smooth transitions**
- **Modern form styling**
- **Map container optimization**

## Server Configuration

### 1. PHP Server
```bash
php -S localhost:9090
```

### 2. Apache Configuration (`.htaccess`)
```apache
RewriteEngine On
DirectoryIndex index.php
ErrorDocument 404 /index.php

# Security Headers
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"

# Prevent direct access to sensitive files
<Files "*.db">
    Order allow,deny
    Deny from all
</Files>
```

## Deployment Considerations

### 1. Production Setup
- **Web Server**: Apache/Nginx with PHP
- **Database**: Consider MySQL/PostgreSQL for larger scale
- **SSL Certificate**: HTTPS for security
- **Domain Configuration**: Proper DNS setup

### 2. Security Enhancements
- **HTTPS**: SSL/TLS encryption
- **Environment Variables**: Secure configuration
- **Database Backups**: Regular automated backups
- **Error Logging**: Proper error handling

### 3. Performance Optimization
- **Image Optimization**: Compress and resize images
- **CSS/JS Minification**: Reduce file sizes
- **Caching**: Browser and server-side caching
- **CDN**: Content delivery network for assets

## Testing and Debugging

### 1. Database Testing
```php
// Test database connection
require_once 'config/database.php';
$db = new Database();
echo "Database connected successfully!";
```

### 2. Session Testing
```php
// Check session status
session_start();
var_dump($_SESSION);
```

### 3. Authentication Testing
- Test admin login with default credentials
- Test user registration and login
- Test logout functionality
- Test access restrictions

## Common Issues and Solutions

### 1. Database Connection Issues
- **Problem**: "unable to open database file"
- **Solution**: Check file permissions and path
- **Fix**: Use `__DIR__` for absolute paths

### 2. Session Issues
- **Problem**: Sessions not persisting
- **Solution**: Ensure `session_start()` on all pages
- **Fix**: Check PHP session configuration

### 3. File Path Issues
- **Problem**: Include/require failures
- **Solution**: Use absolute paths with `__DIR__`
- **Fix**: Verify file structure and permissions

### 4. Responsive Design Issues
- **Problem**: Layout breaking on mobile
- **Solution**: Check CSS media queries
- **Fix**: Test on actual devices

## Maintenance and Updates

### 1. Regular Tasks
- **Database Backups**: Daily automated backups
- **Security Updates**: Keep PHP and dependencies updated
- **Content Updates**: Regular content refresh
- **Performance Monitoring**: Monitor load times

### 2. User Management
- **Admin Functions**: User creation, modification, deletion
- **Password Resets**: Implement password reset functionality
- **Account Lockout**: Implement after failed attempts
- **User Roles**: Expand role-based permissions

### 3. Feature Enhancements
- **Email Integration**: SMTP for contact forms
- **File Upload**: Product image management
- **Search Functionality**: Product search
- **Analytics**: User behavior tracking

## File Permissions

### 1. Required Permissions
```bash
# Database directory
chmod 755 database/
chmod 644 database/users.db

# PHP files
chmod 644 *.php
chmod 644 config/*.php
chmod 644 auth/*.php

# Web files
chmod 644 *.html
chmod 644 *.css
chmod 644 *.js
```

### 2. Security Considerations
- **Writable Directories**: Only where necessary
- **Executable Files**: Minimal permissions
- **Configuration Files**: Protected from web access

## Backup Strategy

### 1. Database Backup
```bash
# Manual backup
cp database/users.db backup/users_$(date +%Y%m%d_%H%M%S).db

# Automated backup script
#!/bin/bash
BACKUP_DIR="/path/to/backups"
DATE=$(date +%Y%m%d_%H%M%S)
cp database/users.db "$BACKUP_DIR/users_$DATE.db"
```

### 2. File Backup
- **Source Code**: Version control (Git)
- **Images**: Regular backup to cloud storage
- **Configuration**: Document all settings

## Performance Optimization

### 1. Database Optimization
- **Indexes**: Add indexes for frequently queried columns
- **Queries**: Optimize SQL queries
- **Connection Pooling**: For high traffic

### 2. Frontend Optimization
- **Image Compression**: WebP format where possible
- **CSS/JS Minification**: Reduce file sizes
- **Lazy Loading**: For images and content
- **Caching**: Browser and server caching

### 3. Server Optimization
- **PHP OpCache**: Enable for better performance
- **Gzip Compression**: Reduce bandwidth usage
- **CDN**: For static assets
- **Load Balancing**: For high traffic scenarios

## Monitoring and Analytics

### 1. Error Monitoring
- **PHP Error Logs**: Monitor for issues
- **Database Logs**: Track query performance
- **User Feedback**: Collect user reports

### 2. Performance Metrics
- **Page Load Times**: Monitor response times
- **Database Performance**: Query execution times
- **User Engagement**: Track user behavior

### 3. Security Monitoring
- **Failed Login Attempts**: Monitor for attacks
- **File Access Logs**: Track unauthorized access
- **Database Access**: Monitor database queries

## Future Enhancements

### 1. Planned Features
- **Multi-language Support**: Internationalization
- **Advanced Search**: Product search with filters
- **Shopping Cart**: E-commerce functionality
- **Blog System**: Content management
- **API Integration**: Third-party services

### 2. Technical Improvements
- **Framework Migration**: Consider Laravel/CodeIgniter
- **Database Migration**: MySQL/PostgreSQL for scale
- **Frontend Framework**: React/Vue.js for SPA
- **Mobile App**: Native mobile application

### 3. Business Features
- **Inventory Management**: Stock tracking
- **Order Management**: Purchase order system
- **Customer Portal**: Client-specific features
- **Reporting System**: Business analytics

---

## Quick Start Guide

1. **Setup Database**:
   ```bash
   php -S localhost:9090
   ```

2. **Access Application**:
   - Open: http://localhost:9090
   - Admin Login: admin@dtexindia.com / admin123

3. **Test Features**:
   - User registration and login
   - Admin dashboard access
   - Responsive design on different devices
   - Contact form functionality

4. **Production Deployment**:
   - Configure web server (Apache/Nginx)
   - Set up SSL certificate
   - Configure database backups
   - Set proper file permissions

---

*This documentation covers the complete integration and functionality of the D TEX INDIA web application. For additional support or questions, refer to the code comments and error logs.* 