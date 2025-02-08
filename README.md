## **Project Name:** School Management System

### **Description:**
The **School Management System** is a two-part application designed to streamline school administrative tasks. It consists of two main components:

1. **Java Swing Desktop Application**: This part of the system allows school staff to manage student information, course data, and attendance records. It's a desktop-based solution where administrators can interact with the system offline.
2. **PHP Web Application**: This part provides a web-based interface for students, teachers, and administrators to access the school’s information, grades, attendance, and more from any device with internet access.

### **Key Features:**

#### **Admin:**
- **Desktop (Java Swing)**:
  - Manage student records, courses, and faculty.
  - Generate reports on student performance and attendance.
  - Handle system settings and configurations.
  
- **Web (PHP)**:
  - Admin access to student, teacher, and course data through a web browser.
  - View, edit, or delete student records, faculty details, and courses.
  - Generate student performance and attendance reports.
  
#### **Teacher:**
- **Desktop (Java Swing)**:
  - Record attendance for classes.
  - Enter grades and view performance reports.
  
- **Web (PHP)**:
  - Access assigned courses and student lists.
  - Update grades and attendance records for students.
  
#### **Student:**
- **Web (PHP)**:
  - View personal information and grades.
  - Access course schedules and attendance records.
  - Communicate with teachers via message boards.

### **Technologies Used:**

- **Java Swing** (Desktop Application):
  - **Java**: Core programming language used to develop the desktop application.
  - **Swing**: Used for creating graphical user interfaces for the desktop application.
  - **MySQL**: Relational database for storing student, teacher, and course information locally.
  
- **PHP (Web Application)**:
  - **PHP**: Server-side scripting used to develop the web-based system.
  - **MySQL**: Database management system to store and manage data (accessible both for desktop and web components).
  - **HTML5, CSS3, JavaScript**: Frontend technologies used for building the web interface.
  - **Bootstrap**: Used for responsive web design to make the web application mobile-friendly.
  
### **Installation and Setup:**

#### **Java Swing Desktop Application:**
1. Clone the repository:
   ```bash
   git clone https://github.com/youssefabidi13/Project-gestion-de-scolarite.git
   cd Project-gestion-de-scolarite
   ```

2. Install Java and ensure you have **Java Development Kit (JDK)** version 8 or higher installed on your system.

3. Set up the database:
   - Create a MySQL database named `school_management`.
   - Import the SQL schema provided in the `database` directory for table structure.

4. Run the desktop application:
   - Open the project in your preferred Java IDE (e.g., IntelliJ IDEA, Eclipse).
   - Run the application as a Java application.

#### **PHP Web Application:**
1. Clone the repository:
   ```bash
   git clone https://github.com/youssefabidi13/Project-gestion-de-scolarite.git
   cd Project-gestion-de-scolarite
   ```

2. Install PHP and a web server (e.g., XAMPP, WAMP, or LAMP).

3. Set up the database:
   - Create a MySQL database named `school_management`.
   - Import the SQL schema provided in the `database` directory for table structure.

4. Configure the database connection:
   - Open the `config.php` file and update the database credentials (e.g., username, password).

5. Deploy the application:
   - Place the files in the `htdocs` folder (for XAMPP) or the appropriate folder for your local server.
   - Start the web server and access the application through a browser at `http://localhost/`.

### **Contributing:**
Contributions to this project are welcome! If you encounter any issues or have suggestions for improvements:
- Fork the repository.
- Make changes and submit a pull request.
- Report issues via GitHub Issues.
