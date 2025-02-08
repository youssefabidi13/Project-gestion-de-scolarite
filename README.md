**Project Name:** School Management System

**Description:**

The **School Management System** is a comprehensive web application designed to streamline and automate various administrative tasks within educational institutions. It offers a centralized platform for managing student information, course details, grades, attendance, and more. The system is divided into three main user roles: Admin, Teacher, and Student, each with specific functionalities to ensure efficient management of school operations.

**Features:**

- **Admin:**
  - Manage user accounts for teachers and students.
  - Add, update, and delete courses.
  - Assign teachers to courses.
  - Generate and view reports on student performance and attendance.

- **Teacher:**
  - View assigned courses and student lists.
  - Record student attendance.
  - Enter and update student grades.
  - Communicate with students regarding assignments and performance.

- **Student:**
  - Access personal information and course schedules.
  - View grades and attendance records.
  - Submit assignments and communicate with teachers.

**Technologies Used:**

- **Frontend:**
  - **HTML5**: Provides the structure of the web pages.
  - **CSS3**: Handles the styling and layout of the web pages.
  - **JavaScript**: Adds interactivity and dynamic content to the website.
  - **Bootstrap**: Utilized for responsive design and ensuring the website is mobile-friendly.

- **Backend:**
  - **PHP**: Manages server-side scripting for dynamic content.
  - **MySQL**: Serves as the database management system for storing user and course information.

**Installation and Setup:**

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/youssefabidi13/Project-gestion-de-scolarite.git
   cd Project-gestion-de-scolarite
   ```

2. **Configure the Database:**
   - Set up your preferred relational database system (e.g., MySQL).
   - Create a database named `school_management`.
   - Import the SQL schema provided in the `database` directory to create the necessary tables.

3. **Update Database Configuration:**
   - Modify the database connection parameters in the application's configuration file to match your database settings (e.g., username, password).

4. **Deploy the Application:**
   - Upload the project files to your web server.
   - Ensure that the server supports PHP and has access to the MySQL database.
   - Access the application through your web browser to begin using the system.

**Usage:**

- **Admin:**
  - Log in with admin credentials to manage users, courses, and generate reports.

- **Teacher:**
  - Log in with teacher credentials to manage courses, record attendance, and enter grades.

- **Student:**
  - Log in with student credentials to view personal information, grades, and communicate with teachers.

**Contributing:**

Contributions are welcome! If you encounter any issues or have suggestions for improvements, please fork the repository, make your changes, and submit a pull request.
