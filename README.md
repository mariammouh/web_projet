
# StreamMuse

A web platform dedicated to movies and series, designed to help users discover content, share reviews, and connect with fellow cinema enthusiasts.

## Table of Contents

- [About](#about)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Installation](#installation)
- [Usage](#usage)
- [System Architecture](#system-architecture)
- [User Roles](#user-roles)
- [Contributing](#contributing)
- [Team](#team)
- [License](#license)
- [Acknowledgments](#acknowledgments)

## About

StreamMuse is a community-driven platform that addresses the overwhelming choice of movies and series available today. Rather than spending time searching, users can discover personalized recommendations, read reviews from like-minded viewers, and engage in meaningful discussions about audiovisual content.

The platform goes beyond simple recommendations by providing moderated discussion spaces where users can exchange viewpoints respectfully, fostering a more thoughtful and social approach to content consumption.

## Features

### For Users
- **Account Management**: Create accounts, authenticate, and manage personal profiles
- **Content Discovery**: Browse extensive database of movies and series
- **Watchlist**: Add and manage personal watchlists for future viewing
- **Advanced Search**: Search by title, genre, actor, year, and popularity
- **Content Filtering**: Filter content by genre, type, and other criteria
- **Rating System**: Rate movies and series based on personal preferences
- **Reviews & Comments**: Leave detailed reviews and engage in discussions
- **Actor Profiles**: View actor biographies and filmographies
- **Reporting System**: Report inappropriate comments to maintain community standards

### For Administrators
- **Dashboard**: Centralized admin panel with platform statistics
- **Content Management**: Add new movies, series, and actor profiles
- **User Management**: Manage user accounts and permissions
- **Moderation**: Review and manage reported comments
- **Analytics**: View platform usage statistics and trends

## Technology Stack

### Backend
- **Laravel** - PHP framework following MVC architecture
- **PHP** - Server-side programming language
- **MySQL** - Relational database management system
- **Eloquent ORM** - Database abstraction layer

### Frontend
- **HTML5** - Markup and structure
- **CSS3** - Styling and responsive design
- **JavaScript** - Client-side interactivity
- **Chart.js** - Interactive data visualization

### Development Tools
- **XAMPP** - Local development environment
- **Visual Studio Code** - Primary code editor
- **Git & GitHub** - Version control and collaboration
- **Enterprise Architect** - UML modeling
- **Looping Software** - Database modeling (MCD/MLD)

## Installation

### Prerequisites
- PHP >= 7.4
- Composer
- MySQL
- XAMPP (recommended for local development)

### Steps
1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/streammuse.git
   cd streammuse
````

2. **Install dependencies**

   ```bash
   composer install
   ```

3. **Environment configuration**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**

   * Create a MySQL database named `streammuse`
   * Update `.env` file with your database credentials:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=streammuse
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations**

   ```bash
   php artisan migrate
   ```

6. **Seed database (optional)**

   ```bash
   php artisan db:seed
   ```

7. **Start the development server**

   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`.

## Usage

### Getting Started

1. **Registration**: Create a new account on the sign-up page
2. **Login**: Access your account through the sign-in page
3. **Profile Setup**: Complete your profile with preferences and favorite genres
4. **Explore Content**: Browse movies and series by category or use search/filter options
5. **Build Watchlist**: Add interesting content to your personal watchlist
6. **Engage**: Rate content and participate in community discussions

### Navigation

* **Home Page**: Featured content organized by categories (Movies, Series, K-Dramas, Anime)
* **View All**: Complete catalog browsing with advanced filtering
* **Search**: Find specific content by title, genre, or actor
* **Profile**: Manage personal information, preferences, and viewing history
* **Watchlist**: Access saved content for future viewing

## System Architecture

### Database Schema

The platform uses a relational database with the following main entities:

* **Users**: User accounts and profiles
* **Movies/Series**: Content information and metadata
* **Actors**: Actor profiles and filmographies
* **Comments**: User reviews and discussions
* **Watchlists**: User's saved content
* **Ratings**: User evaluations of content

### Security Features

* Password encryption and secure authentication
* Input validation and sanitization
* Access control based on user roles
* Activity logging and monitoring
* Protection against common web vulnerabilities

## User Roles

### Regular Users

* Browse and search content
* Manage personal profiles and watchlists
* Rate and review content
* Participate in community discussions
* Report inappropriate content

### Administrators

* All regular user capabilities
* Content management (add/edit movies, series, actors)
* User account management
* Comment moderation and reporting review
* Platform analytics and statistics
* Interface customization options

## Contributing

We welcome contributions to StreamMuse! Here's how you can help:

1. **Fork the repository**
2. **Create a feature branch**

   ```bash
   git checkout -b feature/new-feature
   ```
3. **Make your changes**
4. **Commit your changes**

   ```bash
   git commit -m "Add new feature"
   ```
5. **Push to the branch**

   ```bash
   git push origin feature/new-feature
   ```
6. **Create a Pull Request**

### Development Guidelines

* Follow Laravel coding standards
* Write clear, commented code
* Test new features thoroughly
* Update documentation as needed
* Ensure responsive design principles

## Team

This project was developed as part of a web development course, demonstrating practical application of modern web technologies and collaborative development practices.

## License

This project is developed for educational purposes. Please respect copyright and intellectual property when using content data.

## Acknowledgments

* Course instructors and mentors for guidance
* Open source community for tools and resources
* Movie and series databases for inspiration
* Team members for collaborative effort

---

**StreamMuse** - Discover, Share, Connect through Cinema

```

