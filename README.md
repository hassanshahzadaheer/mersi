# Mersi Solutions SaaS Platform

This is the starting project for the **Mersi Solutions SaaS Platform**. The platform allows clients to register,
subscribe, and manage their compliance evaluations.

## Table of Contents

- [Features](#features)
- [Current Bugs](#current-bugs)
- [Next Steps](#next-steps)
- [Learning Notes](#learning-notes)

---

## Features

### Feature 1: User Registration & Subscription

- **User Story**: As a potential SaaS client, I want to register on the website and purchase a subscription to access
  the platform, so that I can begin evaluating my compliance.

    - Registration form created with fields for **Name**, **Email**, and **Password**.
    - Added **user_type** selection in registration (options: Government Client, Commercial Client, SaaS Client).
    - **Default user_type** set to `Commercial Sector Client`.
    - Email validation and password encryption implemented.
    - Work in progress: **Subscription integration** (Placeholder for payment gateway).
    - Users receive a confirmation email after successful registration.
    - Users are redirected to their **personalized dashboard** after login.

### Feature 2: Login System

- **User Story**: As a registered SaaS client, I want to log in using my username and password, so that I can access my
  account and previous compliance data.

    - Login page created with fields for **Email** and **Password**.
    - Users can reset their password via email.
    - Upon successful login, users are redirected to their dashboard.
    - Added **Logout option** to user’s profile menu.

---

## Current Bugs

1. **Router Not Found Error**:
    - **Issue**: While implementing the user registration feature, encountered a "Route not found" issue.
    - **Solution**: The issue was resolved by ensuring that routes were properly registered in the `web.php` file, and
      necessary middleware was applied.

2. **Value Not Inserted in Database**:
    - **Issue**: The `user_type` field wasn't saving the correct value in the database.
    - **Solution**: Fixed the issue by ensuring the correct form field name (`user_type`) matched the database schema,
      and that the correct values were passed to the database.

---

## Next Steps

- Finalize **Subscription Feature**:
    - Integrate a payment gateway (Stripe, PayPal, etc.) for seamless subscription purchases.
    - Add subscription plans and manage billing cycles.

- **Dashboard Improvements**:
    - Allow users to see their compliance progress and reports after logging in.

- **Admin Panel**:
    - Create an admin panel to manage user subscriptions and platform settings.

---

## Learning Notes

### Key Challenges & Solutions

1. **Router Not Found Error**:
    - **Cause**: Initially, we encountered a "Route not found" error during the registration process. After some
      investigation, we discovered that the `Register` class wasn't correctly placed in the `Auth` folder or wasn’t
      properly registered.
    - **Solution**: We fixed this by ensuring the `Register` class was in the correct namespace and by correctly
      importing it into the `web.php` routes. This ensured the routing worked as expected.

2. **Custom Field Not Saving (`user_type`)**:
    - **Issue**: The `user_type` field (for selecting Government Client, Commercial Client, etc.) wasn't saving properly
      in the database. The form was displaying the correct options, but the value wasn’t being inserted into the
      database.
    - **Solution**: The issue was resolved by ensuring that the database column and form field had matching
      names (`user_type`). We also ensured that the form field was properly mapped to the model, and the value was
      passed correctly.

3. **Form Display vs Value Handling**:
    - **Problem**: The `user_type` form field was displaying the key (e.g., `government_client`) instead of the
      human-readable value (e.g., `Government Client`) when retrieved from the database.
    - **Solution**: We implemented a method (`getUserTypeDisplay()`) to map the keys to their human-readable values,
      allowing the correct display of the `user_type` in forms and pages.

4. **Commit Best Practices**:
    - **Lesson**: It’s important to maintain clear, structured commits that reflect each milestone or bug fix. For
      example:
        - *"Feature: Implement user registration with custom user_type field"*
        - *"Fix: Resolve routing issue by correcting the Register class location in Auth folder"*.

---

## Repository Structure

- **app/**: Contains core business logic and models.
- **resources/**: Views and frontend-related files.
- **database/migrations/**: All database migrations.
- **routes/web.php**: Where routes for the application are defined.
- **README.md**: This document, detailing the project and its progress.
