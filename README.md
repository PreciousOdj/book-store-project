# Bookstore project

Introduction  
The Bookstore Database System is a sophisticated, computerized solution designed to streamline the management and retrieval of book, customer, and order information. This system caters to the unique needs of university and post-secondary education students, making it easier to find textbooks and course materials. As students and developers, we empathize with the challenges of navigating academic requirements and designed this system to simplify the textbook search and acquisition process.  

Problem Statement  
Navigating university life can be daunting for students, whether new or returning. Each semester introduces new courses, lecturers, and academic materials, adding to the stress. A critical step for academic success is obtaining the right textbooks and course materials.  
We understand the frustration of combing through multiple websites to find the correct edition of a book. The Bookstore addresses this problem by providing a user-friendly platform. Students can:  
- Create an account or log into an existing one.  
- Search for books using various criteria such as title, edition, or subject.  
- Easily identify the most relevant version of a textbook, ensuring they access the most up-to-date and course-appropriate material.  

# Functional Analysis  
# Key Entities  
The system includes the following entities:  
- **Customer**  
- **Books**  
- **Cart**  
- **Subject**  
- **Author**  

# Relational Schema  
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
