# Suppliers CRUD Application

A professional and modern suppliers management application built with **Laravel 12**, **Livewire 3**, and **Tailwind CSS**. This application allows users to create, read, update, and delete supplier records with a clean, responsive user interface.

## Features

### Core CRUD Operations
- **Create**: Add new suppliers with validated form inputs
- **Read**: Display suppliers in a clean, responsive table with pagination (4 items per page)
- **Update**: Edit supplier details with inline form validation
- **Delete**: Remove suppliers with confirmation alerts

### Advanced Features
- **Live Search**: Search suppliers by name or email in real-time
- **Pagination**: Navigate through suppliers with page links
- **Print View**: Generate and print supplier lists in A4 format with footer containing:
  - Page number (left-aligned)
  - Logged-in user name (right-aligned)
- **Responsive Design**: Mobile-friendly interface with hidden columns on smaller screens
- **Form Validation**: 
  - Email format validation
  - Email uniqueness enforcement
  - Phone number regex validation
  - Required field checks
- **SweetAlert Confirmations**: User-friendly confirmation dialogs before deletions

### UI/UX
- **Professional Design**: Clean, modern interface using Tailwind CSS
- **Modal Forms**: Create and edit suppliers in pop-up modals
- **Consistent Styling**: Unified color scheme and spacing
- **Accessibility**: Proper labels, icons, and hover states

### Dashboard
- **Total Suppliers Card**: Display total supplier count with quick access link
- **Overview Metrics**: Visual representation of supplier data

## Tech Stack

- **Backend**: Laravel 12 (PHP)
- **Frontend**: Livewire 3 (Real-time reactive components)
- **Styling**: Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **UI Components**: Blade templates with Heroicons

## Requirements

- PHP 8.2+
- Composer
- MySQL 5.7+
- Node.js & npm

## Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd inbizsys_assessment
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database
Update your `.env` file with database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inbizsys_test
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Build Assets
```bash
npm run build
```

For development with watch mode:
```bash
npm run dev
```

### 7. Start Development Server
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Usage

### Authentication
1. Register a new account or use the default credentials
2. Login to access the dashboard

### Managing Suppliers
1. **View Suppliers**: Navigate to `/suppliers` from the dashboard
2. **Add Supplier**: Click "Add Supplier" button and fill the form
3. **Edit Supplier**: Click the edit icon on any supplier row
4. **Delete Supplier**: Click the delete icon and confirm
5. **Search**: Use the search bar to filter by name or email
6. **Pagination**: Navigate to different pages (4 suppliers per page)
7. **Print**: Click "Print List" to generate and print a formatted list

### Dashboard
- View total supplier count
- Quick access button to view all suppliers

## API Endpoints

- `GET /suppliers` - Display suppliers list (Livewire component)
- `GET /suppliers/print` - Print-friendly suppliers view
- `GET /dashboard` - Dashboard with supplier metrics

## Validation Rules

### Supplier Fields
- **Name**: Required, string, max 255 characters
- **Email**: Required, valid email format, unique
- **Phone**: Optional, string, max 20 characters, numeric format (digits, +, -)
- **Address**: Optional, text field

## Database Schema

### Suppliers Table
```sql
CREATE TABLE suppliers (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Performance Optimizations

- Pagination to limit data queries
- Indexed unique email column
- Lazy-loaded search with `when()` query builder
- Livewire's WithPagination trait for efficient pagination
- Proper wire:key bindings for list rendering

## Development Notes

### Livewire Components
- `Suppliers.php`: Main component handling all CRUD operations
- Live search updates pagination automatically
- Form validation happens in real-time

### Views
- `suppliers.blade.php`: Main suppliers management interface
- `print.blade.php`: Print-optimized layout with footer
- `modal.blade.php`: Reusable modal component for forms

## Testing

Run tests with:
```bash
php artisan test
```

## Best Practices Implemented

✅ Laravel best practices and conventions  
✅ Clean, readable, maintainable code  
✅ Proper naming conventions  
✅ Optimized database queries  
✅ Comprehensive validation  
✅ Responsive UI/UX design  
✅ Security (CSRF protection, authentication)  
✅ Livewire dynamic interactions  

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## Support

For issues or support, please create an issue in the repository.


In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
