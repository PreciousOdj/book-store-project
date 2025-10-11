# Bookstore project

Introduction  
The Bookstore Database System is a sophisticated, computerized solution designed to streamline the management and retrieval of book, customer, and order information. This system caters to the unique needs of university and post-secondary education students, making it easier to find textbooks and course materials. As students and developers, we empathize with the challenges of navigating academic requirements and designed this system to simplify the textbook search and acquisition process.  

Problem Statement  
Navigating university life can be daunting for students, whether new or returning. Each semester introduces new courses, lecturers, and academic materials, adding to the stress. A critical step for academic success is obtaining the right textbooks and course materials.  
We understand the frustration of combing through multiple websites to find the correct edition of a book. The Bookstore addresses this problem by providing a user-friendly platform. Students can:  
- Create an account or log into an existing one.  
- Search for books using various criteria such as title, edition, or subject.  
- Easily identify the most relevant version of a textbook, ensuring they access the most up-to-date and course-appropriate material.  

## Functional Analysis  
### Key Entities  
The system includes the following entities:  
- **Customer**  
- **Books**  
- **Cart**  
- **Subject**  
- **Author**  

### Relational Schema  
The database follows the relational schema outlined below:  
- **Customer**: (`Customer_Id`, `Name`, `Email`, `Password`, `Phone Number`)  
- **Books**: (`ISBN`, `Title`, `Price`, `Published`, `Edition`, `Publisher`)  
- **Subject**: (`Code`, `Section`)  
- **Book_Subject**: (`ISBN`, `Code`)  
- **Cart**: (`Order_Id`, `Customer_Id`, `Date`, `Price`, `Edition`)  
- **Cart_Book**: (`Order_Id`, `ISBN`)  
- **Author**: (`Author_Id`, `Name`)  
- **Author_Book**: (`Author_Id`, `ISBN`)  

### Third Normal Form  
The database structure adheres to third normal form (3NF) for optimized data integrity:  
- **Customer**: (`Customer_Id`, `Name`, `Email`, `Password`, `Phone Number`)  
- **Books**: (`Book_Id`, `Title`, `Price`, `Published`, `Edition`, `Publisher`)  
- **Subject**: (`Code`, `Section`)  
- **Book_Subject**: (`Book_Id`, `Code`)  
- **Cart**: (`Order_Id`, `Customer_Id`, `Date`, `Price`, `Edition`)  
- **Cart_Book**: (`Order_Id`, `Book_Id`)  
- **Author**: (`Author_Id`, `Name`)  
- **Author_Book**: (`Author_Id`, `Book_Id`)  

### Constraints  

#### Primary Key Constraints  
- **Customer**: `Customer_Id`  
- **Books**: `ISBN`  
- **Cart**: `Order_Id`  
- **Subject**: `Code`  
- **Author**: `Author_Id`  
- **Author_Book**: `Author_Id`, `ISBN`  
- **Cart_Book**: `Order_Id`, `ISBN`  
- **Book_Subject**: `ISBN`, `Code`  

#### Foreign Key Constraints  
- **Book_Subject**: References `ISBN` in **Books** and `Code` in **Subject**.  
- **Cart**: References `Customer_Id` in **Customer**.  
- **Author_Book**: References `Author_Id` in **Author** and `ISBN` in **Books**.  
- **Cart_Book**: References `ISBN` in **Books** and `Order_Id` in **Cart**.  

## Features  
- **User Account Management**: Students can create accounts or log into existing ones.  
- **Advanced Search Options**: Search for books by title, subject, or other criteria.  
- **Edition-Specific Data**: Easily find and identify specific editions of textbooks.  

## **Frontend and PHP Integration**
1. **Frontend Technology**: 
   - Uses **PHP** for server-side scripting to connect the UI with the backend database.
   - Includes functionalities such as:
     - **User Authentication**: Registration and login.
     - **Search System**: Filters books by title, author, or subject.
     - **Shopping Cart**: Allows users to manage purchases.
     - **Order Processing**: Includes checkout and payment steps.

2. **Code Highlights**:
   - **Account Creation**: Inserts user information into the `customer` table.
   - **Login System**: Validates credentials by querying the `customer` table.
   - **Search Functionality**: Queries the `book`, `author`, and `subject` tables to filter results.
   - **Cart Management**: Links user-specific orders with books through the `cart` and `cart_book` tables.

### **Database Design**
The database uses **phpMyAdmin** and MariaDB to store and manage information. The schema is well-structured with clear relationships. Key components include:

1. **Tables and Their Roles**:
   - **`customer`**: Stores user information such as name, email, and login credentials.
   - **`book`**: Details of books including ISBN, title, section, price, publisher, etc.
   - **`cart`**: Tracks orders, associated customers, and order details.
   - **`author`** and **`author_book`**: Manages authors and their relationships to books.
   - **`book_subject`** and **`subject`**: Organizes books into categories for search functionality.
   - **`cart_book`**: Links books with specific user orders in the cart.

2. **Sample Data**:
   - **Authors**: Names like "Jenny Preece" and "J.K. Rowling".
   - **Books**: Cover diverse subjects such as Computer Science, Nursing, and Politics.
   - **Users**: Example entries like "Sydney Charleston" and "Tony Stark".

### **Functionality Overview**
1. **User Flow**:
   - **Registration/Login**: Users must register and log in to perform actions like adding books to the cart or placing an order.
   - **Book Search**: By title, author, or subject. Uses SQL queries to fetch matching results.
   - **Order Placement**: Includes a step-by-step process where the user can review the cart, enter payment details, and confirm the order.
   - **Logout**: Ends the session and redirects to the home page.

2. **Data Handling**:
   - Utilizes SQL to **create, read, update, and delete (CRUD)** operations across the tables.
   - Data integrity is maintained through structured relationships between tables.

---

### **Appendix: Key Features of the Schema**
- **Indexes and Keys**:
   - Primary and foreign keys ensure relationships between tables, e.g., `Customer_id` linking `customer` and `cart`, `ISBN` linking `book`, `author_book`, and `cart_book`.

- **Transactional Safety**:
   - Includes `START TRANSACTION` to manage data consistency during operations like bulk inserts.

## **Possible Enhancements**
1. **Security**:
   - Implement password hashing (e.g., `bcrypt`) for storing user passwords.
   - Use prepared statements to avoid SQL injection.

2. **UI Improvements**:
   - Use modern front-end frameworks like **React** or **Vue.js** for a more interactive experience.
   - Make the design mobile-responsive.

3. **Performance Optimization**:
   - Optimize SQL queries and indexes for faster data retrieval.
   - Use caching mechanisms for frequently accessed data, such as book categories.

4. **Additional Features**:
   - Add user reviews and ratings for books.
   - Include a recommendation system based on past orders.
### **Photos**
**Home Page**:
<img width="1280" height="1306" alt="image" src="https://github.com/user-attachments/assets/f8781201-3a1e-4f64-8cfb-3995dac07c94" />
**Create Account Page**:
<img width="1280" height="1305" alt="image" src="https://github.com/user-attachments/assets/2948a451-361f-4cfb-ae26-5c3ba73c9ad9" />
**Login Page**:
<img width="1276" height="1293" alt="image" src="https://github.com/user-attachments/assets/f84e156d-ee37-461c-9fdf-91830321df1e" />

