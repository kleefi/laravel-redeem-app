# 🎁 Redeem App – Laravel 12

A Laravel 12-based web application for managing a reward redemption system using unique codes from product packaging. Supports user submissions without login and role-based dashboards for users and admins.

---

## 🚀 Features

### 🔐 Authentication

-   User and Admin login/registration
-   Role-based access control using middleware

### 📦 Public Submission (No Login Required)

-   Public form for participants to:
    -   Submit personal data (e.g., name, phone)
    -   Enter unique code
    -   Upload a photo showing the product packaging with code

### 👤 User Dashboard

-   View and manage incoming participant submissions
-   CRUD operations on participant data
-   Track redemption statuses
-   Get notifications for success/failure of actions

### 🛠️ Admin Dashboard

-   Full access to all participant data
-   Manage all users (create/edit/delete)
-   Manage rewards (create/edit/delete)
-   Generate and manage unique codes
-   View history/logs of all changes

### ✅ Validation & Duplication Check

-   Prevent duplicate unique code submissions
-   Validate code format or prefix (e.g., auto check if code exists in DB)

### 🖼️ Image Proof Management

-   Thumbnail preview and full-size modal of submitted images
-   Bulk image download (admin only)
