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

<img width="1731" height="4892" alt="image" src="https://github.com/user-attachments/assets/58c3e11a-1a55-4b6f-bcc7-ebf09b36a1c7" />

<img width="1731" height="1531" alt="image" src="https://github.com/user-attachments/assets/8c97b119-6402-4a38-addf-27283c3e7119" />

<img width="1731" height="1000" alt="image" src="https://github.com/user-attachments/assets/b7a78748-eee2-48a4-9924-5071c714c1e5" />

<img width="1731" height="1731" alt="image" src="https://github.com/user-attachments/assets/7650a170-20e6-4c86-970b-53c3690fecb5" />

<img width="1731" height="1953" alt="image" src="https://github.com/user-attachments/assets/c4b77c63-443d-44d0-a501-d55f7f3eaa3e" />

<img width="1731" height="2238" alt="image" src="https://github.com/user-attachments/assets/9fcb3e32-a988-46b8-8167-db404438c2fa" />


---

## 👩‍💻 Author

**Mayar Othman**
GitHub: [@MayarOthmano](https://github.com/MayarOthmano)

---

## 📄 License

This project was built for learning purposes.
