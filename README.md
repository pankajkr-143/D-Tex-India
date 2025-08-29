# D TEX INDIA - User Authentication System

A complete user authentication system for D TEX INDIA with PHP backend and SQLite database.

## Features

- ✅ User Registration and Login
- ✅ Admin and User Role Management
- ✅ Secure Password Hashing
- ✅ Session Management
- ✅ Responsive Design
- ✅ SQLite Database
- ✅ Modern UI/UX

## File Structure

```
├── config/
│   └── database.php          # Database configuration and connection
├── auth/
│   └── auth_handler.php      # Authentication logic and AJAX handlers
├── database/
│   └── users.db             # SQLite database file (auto-created)
├── login.php                # Login and signup page
├── user_dashboard.php       # User dashboard
├── admin_dashboard.php      # Admin dashboard
├── logout.php              # Logout handler
├── test_db.php             # Database test script
├── D.tex indai.html        # Main website
└── README.md               # This file
```

## Setup Instructions

### 1. Prerequisites
- PHP 7.4 or higher
- SQLite extension enabled
- Web server (Apache/Nginx) or PHP built-in server

### 2. Installation
1. Clone or download the files to your web server directory
2. Ensure the `database/` directory is writable:
   ```bash
   chmod 755 database/
   ```
3. Run the test script to verify setup:
   ```bash
   php test_db.php
   ```

### 3. Default Admin Credentials
- **Email:** admin@dtexindia.com
- **Password:** admin123

### 4. Running the Application
- **Using PHP built-in server:**
  ```bash
  php -S localhost:8000
  ```
- **Using Apache/Nginx:** Place files in your web root directory

## Usage

### For Users
1. Visit `login.php`
2. Click "Sign up" to create a new account
3. Login with your credentials
4. Access your personalized dashboard

### For Administrators
1. Login with admin credentials
2. Access admin dashboard with additional features
3. Manage users and system settings

## Security Features

- **Password Hashing:** All passwords are hashed using PHP's `password_hash()`
- **SQL Injection Protection:** Prepared statements for all database queries
- **Session Security:** Secure session management
- **Input Validation:** Client and server-side validation
- **CSRF Protection:** Form tokens and validation

## Database Schema

```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    full_name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    user_type TEXT DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

## API Endpoints

### Authentication Handler (`auth/auth_handler.php`)

**POST /auth/auth_handler.php**

Parameters:
- `action`: 'login', 'signup', or 'logout'
- `email`: User email (for login/signup)
- `password`: User password (for login/signup)
- `full_name`: User full name (for signup)

Response:
```json
{
    "success": true/false,
    "message": "Response message",
    "user_type": "admin/user" (for login),
    "redirect": "dashboard_url" (for login)
}
```

## Customization

### Styling
- Modify CSS variables in `:root` for brand colors
- Update styles in each PHP file as needed

### Database
- Change database path in `config/database.php`
- Modify table structure in `createTables()` method

### Authentication
- Update admin credentials in `config/database.php`
- Modify user roles and permissions in `auth/auth_handler.php`

## Troubleshooting

### Common Issues

1. **Database Connection Failed**
   - Check if SQLite extension is enabled
   - Ensure database directory is writable
   - Verify file permissions

2. **Login Not Working**
   - Check if sessions are enabled
   - Verify database file exists
   - Check browser console for JavaScript errors

3. **Styling Issues**
   - Ensure all CSS files are loading
   - Check for missing font files
   - Verify responsive design breakpoints

### Debug Mode
Enable error reporting by adding to PHP files:
```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

## Support

For technical support or questions:
- Email: info@dtexindia.com
- Phone: +91-8780674899

## License

© 2024 Developed By: UnstopableDeal Technology # D-Tex-India
