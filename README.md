
# Student Result GPA Management System

## Overview
This is a Laravel-based web application for managing student results and GPA calculations. It provides an admin panel for CRUD operations, score entry, filtering, and exporting data.

## Features
- **Student Management:** Add, edit, and delete students via Filament admin panel.
- **Course Management:** Add, edit, and delete courses via Filament admin panel.
- **Score Entry:** Assign scores to students for each course.
- **GPA Calculation:** Automatically calculates GPA for each student based on their scores.
- **Filtering:** Filter students by course on the GPA list page.
- **Export:** Export student GPA data to Excel and PDF formats.
- **Authentication:** Admin login using Laravel authentication and Sanctum.
- **Admin Panel:** User-friendly admin interface powered by Filament.

## Technologies Used
- Laravel 12
- Blade & Tailwind CSS
- PostgreSQL
- Filament (Admin Panel)
- Laravel Excel (maatwebsite/excel)
- DomPDF (barryvdh/laravel-dompdf)
- Sanctum (API authentication)

## How to Use
1. **Install dependencies:**
   - `composer install`
2. **Configure database:**
   - Update `.env` with your PostgreSQL credentials.
3. **Run migrations:**
   - `php artisan migrate:fresh`
4. **Create an admin user:**
   - Use Filament admin panel or Laravel Tinker.
5. **Access admin panel:**
   - Visit `/adminPanel` and log in.
6. **Add students and courses:**
   - Use the admin panel for CRUD operations.
7. **Enter scores:**
   - Use the web form at `/scores/create`.
8. **View GPA list:**
   - Visit `/students` to see GPA calculations and export options.

## Main Pages
- `/adminPanel` — Filament admin panel for CRUD
- `/students` — Student GPA list, filtering, export
- `/scores/create` — Add scores for students

## Export
- **Excel:** `/students/export/excel`
- **PDF:** `/students/export/pdf`

## Notes
- Ensure required PHP extensions are enabled: `intl`, `zip`, `pdo_pgsql`, `pgsql`.
- Only students and courses added via the admin panel will appear in forms and lists.
- Export features require the correct version of Laravel Excel and DomPDF.

## Authors
- Michael Birhanu Gmichael

---
For any issues, please open an issue or contact the maintainer.

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
