# 🎬 CINEMA – Movie Ticket Booking System

A web application for browsing movies, choosing showtimes and seats, and booking tickets online. Every booking gets a unique QR code that can be scanned at the cinema entrance.

Built with **PHP**, **MySQL** and **Bootstrap 5**.

---

## ✨ Features

- **Browse movies**: home page with a slider, "Now Showing" and "Coming Soon" sections
- **Movie details**: description, category, duration, release date and trailer link
- **User accounts**: register and login with hashed passwords (`password_hash`)
- **Showtimes**: see all available dates, times, halls and ticket prices for a movie
- **Seat selection**: seats already booked for a showtime are shown as unavailable
- **Booking confirmation**: review movie, time, hall, seats and total price before confirming
- **QR code tickets**: a QR code is generated for each booking after success
- **Ticket scanning**: a ticket can be scanned once; scanning it again is rejected
- **Roles**: normal users and admins are redirected to different pages after login

---

## 🛠️ Tech Stack

| Layer     | Technology                                  |
|-----------|---------------------------------------------|
| Backend   | PHP (MySQLi)                                |
| Database  | MySQL                                       |
| Frontend  | HTML, CSS, Bootstrap 5.3                    |
| Libraries | [chillerlan/php-qrcode](https://github.com/chillerlan/php-qrcode) (via Composer) |

---

## 📁 Project Structure

```
├── index.php            # Home page (movie slider, now showing, coming soon)
├── details.php          # Movie details page
├── booking.php          # Showtimes and seat selection
├── confirmbooking.php   # Booking summary before confirming
├── savebooking.php      # Saves the booking and seats in the database
├── success.php          # Success page with booking details and QR code
├── tickethandler.php    # Checks and marks a ticket as scanned
├── login.php            # Login
├── register.php         # Registration
├── logout.php           # Logout
├── navbar.php           # Shared navigation bar
├── footer.php           # Shared footer
├── connection.php       # Database connection
├── cinema_db.sql        # Database structure and sample data
├── composer.json        # PHP dependencies
└── css/                 # Stylesheets for each page
```

---

## 🚀 Getting Started

### Requirements

- [XAMPP](https://www.apachefriends.org/) (or any PHP + MySQL server)
- [Composer](https://getcomposer.org/)

### Installation

1. **Clone the repository** into your server folder (for XAMPP: `htdocs`)

   ```bash
   git clone https://github.com/MayarOthmano/cinema-booking-system.git
   ```

2. **Install the dependencies**

   ```bash
   composer install
   ```

3. **Create the database**

   - Open phpMyAdmin
   - Create a database named `cinema_db`
   - Import the file `cinema_db.sql`

4. **Check the database settings** in `connection.php`

   ```php
   $servername = "localhost";
   $username   = "root";
   $password   = "";
   $dbname     = "cinema_db";
   ```

5. **Run the project**

   Start Apache and MySQL from XAMPP, then open:

   ```
   http://localhost/cinema/index.php
   ```

---

## 🔄 How Booking Works

```
Choose movie → Choose showtime → Choose seats → Confirm → Booking saved → QR code ticket
```

---

## 📸 Screenshots

<img width="1872" height="5326" alt="image" src="https://github.com/user-attachments/assets/2f3e39b0-fcbf-4cb7-abfc-f4fba97bdc39" />

<img width="1878" height="1661" alt="image" src="https://github.com/user-attachments/assets/0fa23c2a-81b5-4037-83f1-6ab31c7b8204" />

<img width="1878" height="1061" alt="image" src="https://github.com/user-attachments/assets/bbd8a860-2db6-4d11-9802-f41ef886863a" />

<img width="1868" height="1877" alt="image" src="https://github.com/user-attachments/assets/2e070b27-8e27-4224-98ac-47d5641a599f" />

<img width="1879" height="2120" alt="image" src="https://github.com/user-attachments/assets/bf8a41cb-8af5-4d88-b3f0-4fe5b837d88a" />

<img width="1878" height="2431" alt="image" src="https://github.com/user-attachments/assets/7d1d366f-5691-44ca-87bd-a76123499a11" />
gi



---

## 👩‍💻 Author

**Mayar Othman**
GitHub: [@MayarOthmano](https://github.com/MayarOthmano)

---

## 📄 License

This project was built for learning purposes.
