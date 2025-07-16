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
-   Receive system-level notifications

### 📘 History & Logging

-   Activity history for changes made to submissions
-   Log of actions (create/edit/delete), who did it, and when
-   Notifications for status updates or failed submissions

---

## 🧠 Possible Additional Features

Here are some extra features that may improve the app’s functionality and user experience:

### ✅ Validation & Duplication Check

-   Prevent duplicate unique code submissions
-   Validate code format or prefix (e.g., auto check if code exists in DB)

### 📊 Reporting

-   Export submissions (CSV/XLSX)
-   Submission statistics (daily, weekly, monthly)

### 🔔 Enhanced Notifications

-   Email or in-app notifications for:
    -   Successful redemption
    -   Invalid code submissions
    -   Admin alerts for flagged entries

### 🎯 Reward Assignment

-   Link unique code to specific reward types
-   Set availability or quantity for rewards

### 🌍 Localization (Optional)

-   Multi-language support (e.g., English, Indonesian)

### 🖼️ Image Proof Management

-   Thumbnail preview and full-size modal of submitted images
-   Bulk image download (admin only)
