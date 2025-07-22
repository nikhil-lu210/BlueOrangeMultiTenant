# BlueOrange Multi-Tenant Web Application

A comprehensive multi-tenant Laravel application designed for enterprise-level employee management with advanced features including attendance tracking, task management, real-time communication, and more.

## 🚀 Key Features

### 🏢 Multi-Tenancy
- **Subdomain-based Tenancy**: Each organization gets its own subdomain
- **Isolated Databases**: Complete data separation between tenants
- **Tenant Registration**: Self-service tenant registration with email verification
- **Domain Management**: Flexible domain and subdomain configuration

### 👥 User Management & Authentication
- **Role-Based Access Control**: Comprehensive permission system using Spatie Laravel Permission
- **Pre-defined Roles**: Developer, Super Admin, and custom roles
- **Employee Profiles**: Detailed employee information with media support
- **Login History**: Track user login activities and sessions
- **Device & IP Restrictions**: Security controls for access management

### ⏰ Attendance Management
- **Multiple Clock-in Methods**: Manual, QR Code, and Barcode scanning
- **Real-time Tracking**: Live attendance monitoring with location data
- **Shift Management**: Flexible employee shift configurations
- **Overtime Tracking**: Regular and overtime attendance differentiation
- **Attendance Issues**: Report and manage attendance discrepancies
- **Geolocation**: IP-based location tracking for attendance entries

### 📋 Task Management
- **Task Creation & Assignment**: Create tasks and assign to multiple users
- **Progress Tracking**: Monitor task progress with status updates
- **File Attachments**: Upload and manage task-related files
- **Comments System**: Collaborative task discussions
- **Task History**: Complete audit trail of task changes
- **Chat Integration**: Create tasks directly from chat messages

### 💬 Real-time Communication
- **One-to-One Chat**: Direct messaging between users
- **Group Chat**: Multi-user group conversations
- **Real-time Notifications**: Browser notifications for new messages
- **Message History**: Persistent chat history
- **File Sharing**: Share files through chat
- **Read Receipts**: Track message read status

### 🏖️ Leave Management
- **Leave Types**: Earned, Casual, and Sick leave management
- **Leave Applications**: Submit and approve leave requests
- **Leave Balance**: Track available leave balances
- **Leave History**: Complete leave records
- **Approval Workflow**: Multi-level leave approval system

### 💰 Salary & Payroll
- **Salary Management**: Configure employee salaries
- **Monthly Payroll**: Generate monthly salary breakdowns
- **Attendance Integration**: Salary calculations based on attendance
- **Payroll Reports**: Comprehensive salary reports

### 📢 Announcements
- **Company-wide Announcements**: Broadcast important information
- **Targeted Messaging**: Send announcements to specific user groups
- **Comments System**: Interactive announcement discussions
- **Read Tracking**: Monitor announcement engagement

### ☕ Daily Break Management
- **Break Tracking**: Monitor employee break times
- **QR/Barcode Integration**: Scan-based break management
- **Break Reports**: Analyze break patterns and duration

### 🍽️ Dining Room Booking
- **Table Reservations**: Book dining room tables
- **Time Slot Management**: Manage available booking slots
- **Booking Limits**: Control maximum bookings per slot
- **Booking History**: Track reservation history

### 🔧 IT Ticket System
- **Issue Reporting**: Submit IT support tickets
- **Ticket Management**: Track and resolve IT issues
- **Status Updates**: Real-time ticket status notifications
- **Priority Management**: Categorize tickets by priority

### 🔐 Vault System
- **Credential Storage**: Securely store login credentials
- **Encrypted Data**: Password and username encryption
- **Access Control**: Share credentials with specific users
- **Secure Notes**: Store additional secure information

### 📊 Daily Work Updates
- **Work Reporting**: Daily work progress updates
- **Team Collaboration**: Share work updates with team members
- **Progress Tracking**: Monitor daily productivity

### 📱 Additional Features
- **QR Code Generation**: Generate QR codes for users
- **Barcode Support**: Barcode generation and scanning
- **File Management**: Comprehensive file upload and management
- **Media Library**: Organized media storage with Spatie Media Library
- **Shortcuts**: Quick access to frequently used features
- **Localization**: Multi-language support (English, Bengali, Hindi)
- **Sweet Alerts**: Enhanced user notifications
- **Export Functionality**: Excel export capabilities
- **Backup System**: Automated backup with Spatie Laravel Backup

## 📦 Main Packages & Dependencies

### Core Framework
- **Laravel 10.48**: PHP web application framework
- **PHP 8.2+**: Minimum PHP version requirement

### Multi-Tenancy
- **stancl/tenancy 3.9**: Multi-tenant architecture implementation
- **Database Separation**: Isolated tenant databases
- **Domain Management**: Subdomain-based tenant identification

### Authentication & Authorization
- **spatie/laravel-permission 5.11**: Role and permission management
- **laravel/sanctum 3.2**: API authentication
- **laravel/ui 4.2**: Authentication scaffolding

### Real-time Features
- **livewire/livewire 3.5**: Dynamic frontend components
- **Real-time Updates**: Live data synchronization

### File & Media Management
- **spatie/laravel-medialibrary 10.0**: Media file management
- **maatwebsite/excel 3.1**: Excel import/export functionality
- **spatie/browsershot 5.0**: PDF generation and screenshots

### QR Code & Barcode
- **endroid/qr-code 5.0**: QR code generation
- **picqer/php-barcode-generator 3.2**: Barcode generation

### Security & Data Protection
- **stevebauman/purify 6.2**: HTML sanitization
- **vinkla/hashids 11.0**: ID obfuscation
- **Encryption**: Built-in Laravel encryption for sensitive data

### Location & Utilities
- **stevebauman/location 7.0**: IP-based geolocation
- **jenssegers/agent 2.6**: User agent detection
- **guzzlehttp/guzzle 7.5**: HTTP client

### Development Tools
- **barryvdh/laravel-debugbar 3.8**: Debug toolbar
- **barryvdh/laravel-ide-helper 2.13**: IDE helper generation
- **laravel/pint 1.0**: Code style fixer

### Additional Utilities
- **realrashid/sweet-alert 6.0**: Enhanced notifications
- **spatie/laravel-backup 9.0**: Automated backups
- **browner12/helpers 3.5**: Additional helper functions
- **dyrynda/laravel-cascade-soft-deletes 4.3**: Cascade soft deletes

## 🛠️ Installation Guide

### Prerequisites
Ensure you have the following installed on your system:
- **PHP 8.2 or higher**
- **Composer** (PHP dependency manager)
- **Node.js & npm** (for frontend assets)
- **MySQL 8.0+** (or compatible database system)
- **Git** (for version control)

### Installation Steps

**Step 1: Clone the repository**
```bash
git clone https://github.com/nikhil-lu210/BlueOrangeMultiTenant.git
cd BlueOrangeMultiTenant
```

**Step 2: Install PHP dependencies**
```bash
composer install
```

**Step 3: Install Node.js dependencies**
```bash
npm install
```

**Step 4: Environment configuration**
```bash
cp .env.example .env
php artisan key:generate
```

**Step 5: Configure database connections**
Update your `.env` file with the following database configurations:

```env
# Landlord Database (Central/Main Database)
DB_CONNECTION_LANDLORD=mysql_landlord
DB_HOST_LANDLORD=127.0.0.1
DB_PORT_LANDLORD=3306
DB_DATABASE_LANDLORD=tenancy_landlord
DB_USERNAME_LANDLORD=root
DB_PASSWORD_LANDLORD=your_password

# Tenant Database Template
DB_CONNECTION_TENANT=mysql_tenant
DB_HOST_TENANT=127.0.0.1
DB_PORT_TENANT=3306
DB_USERNAME_TENANT=root
DB_PASSWORD_TENANT=your_password

# Application Settings
APP_URL=http://localhost
APP_DOMAIN=localhost
APP_TIMEZONE="Asia/Dhaka"
```

**Step 6: Database setup**
```bash
# Create landlord database
php artisan migrate --database=mysql_landlord

# Seed the landlord database
php artisan db:seed --database=mysql_landlord
```

**Step 7: Build frontend assets**
```bash
npm run dev
# or for production
npm run build
```

**Step 8: Configure additional settings**
```bash
# Generate IDE helper files
php artisan ide-helper:generate
php artisan ide-helper:models

# Clear and cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

**Step 9: Start the development server**
```bash
php artisan serve
```

Access the application at: `http://127.0.0.1:8000`

### Tenant Setup

**Creating a New Tenant:**
1. Visit the registration page
2. Fill in company details and super admin information
3. Verify email address
4. The system will automatically create:
   - Tenant database
   - Subdomain configuration
   - Initial super admin user

**Accessing Tenant:**
- Tenants are accessed via subdomains: `{tenant-name}.yourdomain.com`
- For local development: `{tenant-name}.localhost:8000`

## 🔐 Default Credentials

### Central Application
**Super Admin**
```
UserID: 20202020
Password: 12345678
```

### Tenant Application
**Developer**
```
UserID: 20230201
Password: 12345678
```

**Super Admin**
```
UserID: 20202020
Password: 12345678
```

## ⚙️ Configuration

### Multi-Tenant Configuration
The application uses subdomain-based tenancy. Configure your web server to handle wildcard subdomains:

**Apache Virtual Host:**
```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    ServerAlias *.yourdomain.com
    DocumentRoot /path/to/your/app/public
</VirtualHost>
```

**Nginx Configuration:**
```nginx
server {
    listen 80;
    server_name yourdomain.com *.yourdomain.com;
    root /path/to/your/app/public;
    index index.php;
}
```

### Queue Configuration
For real-time features, configure queue workers:
```bash
php artisan queue:work
```

### Backup Configuration
Configure automated backups in `config/backup.php`:
```bash
php artisan backup:run
```

## 🚀 Deployment

### Production Deployment Steps

1. **Server Requirements:**
   - PHP 8.2+
   - MySQL 8.0+
   - Nginx/Apache with wildcard subdomain support
   - SSL certificate for secure connections

2. **Environment Setup:**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Database Migration:**
   ```bash
   php artisan migrate --force
   php artisan tenants:migrate --force
   ```

4. **Queue Workers:**
   ```bash
   # Setup supervisor for queue workers
   php artisan queue:work --daemon
   ```

5. **Scheduled Tasks:**
   ```bash
   # Add to crontab
   * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
   ```

## 🔧 Troubleshooting

### Common Issues

**Database Connection Issues:**
```bash
php artisan config:clear
php artisan cache:clear
```

**Permission Issues:**
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

**Clear All Caches:**
```bash
php artisan optimize:clear
```

**Tenant Database Issues:**
```bash
php artisan tenants:list
php artisan tenants:migrate
```

### Debug Mode
For development, enable debug mode in `.env`:
```env
APP_DEBUG=true
LOG_LEVEL=debug
```

## 📚 Additional Resources

- **Laravel Documentation**: [https://laravel.com/docs](https://laravel.com/docs)
- **Tenancy Package**: [https://tenancyforlaravel.com](https://tenancyforlaravel.com)
- **Livewire Documentation**: [https://livewire.laravel.com](https://livewire.laravel.com)
- **Spatie Packages**: [https://spatie.be/open-source](https://spatie.be/open-source)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## 📄 License

This project is licensed under the MIT License.

## 🆘 Support

For support and questions:
- Create an issue in the repository
- Contact the development team
- Check the documentation for common solutions
