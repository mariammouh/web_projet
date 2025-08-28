# StreamMuse: Your Movie & Series Companion 🎬

![alt text](public\img\LogoD.png)

StreamMuse helps cinephiles discover movies and series, track favorites, share reviews, and connect with fellow movie lovers. Browse, search, rate, and create watchlists—all in one place! 🍿✨

---

## 🚀 Features

### For Users
* Create accounts and manage personal profiles
* Browse an extensive database of movies and series
* Add movies and series to your personal watchlist
* Advanced search by title, genre, actor, year, and popularity
* Filter content by genre, type, and other criteria
* Rate movies and series
* Leave reviews and comments
* View actor biographies and filmographies
* Report inappropriate comments

### For Administrators
* Centralized dashboard with platform statistics
* Add new movies, series, and actor profiles
* Manage user accounts and permissions
* Review and manage reported comments
* View analytics and trends

---

## ⚙️ Installation

### Prerequisites
* PHP >= 7.4
* Composer
* MySQL
* XAMPP (for local development)

### Steps

```bash
# Clone repository
git clone https://github.com/your-username/streammuse.git
cd streammuse

# Install dependencies
composer install

# Environment setup
cp .env.example .env
php artisan key:generate

# Configure database in .env
# DB_DATABASE=streammuse
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

# Run migrations
php artisan migrate

# Optional: seed database
php artisan db:seed

# Start server
php artisan serve
Visit http://localhost:8000 to explore StreamMuse.

▶️ Usage
Sign up and log in

Complete your profile with favorite genres

Browse or search for movies/series

Add to your watchlist

Rate content and leave reviews

Discover new favorites and interact with the community


🛠️ Built With
Laravel (PHP MVC framework)

PHP

MySQL

HTML5, CSS3, JavaScript

Chart.js for data visualization

🌟 Future Ideas
Personalized recommendations using smarter algorithms

Multi-language support

Advanced watchlist analytics

Side-by-side comparison of movies/series

Enhanced interactive dashboards

🤝 Contributing
Contributions are welcome! Open an issue or submit a pull request.
Please follow Laravel coding standards and write clean, tested code.
