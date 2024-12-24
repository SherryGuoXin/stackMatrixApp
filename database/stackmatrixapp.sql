/** 
    Group: 10
    Student Name: Xin Guo, 041-154-582
    Student Name: Di Wu, 041-165-211
    Lab: CST8285 311
    Assignment: Assignment 02
    Date: November-15-2024
    Professor: Hala Own

    File Name: stackmartixapp.sql
    Page Description: To create database.
    Contributed by Xin Guo, Di Wu
*/

DROP DATABASE IF EXISTS stackmatrixapp;
CREATE DATABASE stackmatrixapp;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON stackmatrixapp.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE stackmatrixapp;

--
-- Create tables
--
CREATE TABLE IF NOT EXISTS `USERS` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `newsletter` boolean NOT NULL DEFAULT FALSE,
  `sign_up_time` DATETIME NOT NULL,
  `profile_image_name` varchar(255) NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `CATEGORIES` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL UNIQUE,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `THREADS` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `post_time` DATETIME NOT NULL,
  `category` varchar(100) NULL DEFAULT 'Other',
  `thread` varchar(255) NOT NULL,
  `thread_image_name` varchar(255) NULL,
  PRIMARY KEY (`thread_id`),
  CONSTRAINT fk_t_u_user FOREIGN KEY (user_name) REFERENCES USERS(user_name)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
  CONSTRAINT fk_t_c_cate FOREIGN KEY (category) REFERENCES CATEGORIES(category_name)
            ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `COMMENTS` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `comment_time` DATETIME NOT NULL,
  `comment` varchar(255) NOT NULL,
  `thread_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  CONSTRAINT fk_c_t_id FOREIGN KEY (thread_id) REFERENCES THREADS(thread_id)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
  CONSTRAINT fk_c_u_user FOREIGN KEY (user_name) REFERENCES USERS(user_name)
            ON DELETE CASCADE
            ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Test data
--
INSERT INTO `USERS` (`user_id`, `email`, `user_name`, `password`, `newsletter`, `sign_up_time`, `profile_image_name`) VALUES
(1, 'alice@example.com', 'Alice', 'password123', TRUE, '2024-11-01 14:30:00', 'avatar-3.jpg'),
(2, 'bob@example.com', 'Bob', '1234', FALSE, '2024-11-02 15:45:00', 'avatar-13.jpg'),
(3, 'charlie@example.com', 'Charlie', 'password123', TRUE, '2024-11-03 16:00:00', 'avatar-8.jpg'),
(4, 'diana@example.com', 'Diana', 'password123', TRUE, '2024-11-04 18:00:00', 'avatar-18.jpg'),
(5, 'ethan@example.com', 'Ethan', 'password123', FALSE, '2024-11-05 19:00:00', null),
(6, 'fiona@example.com', 'Fiona', 'password123', TRUE, '2024-11-06 20:00:00', 'avatar-5.jpg'),
(7, 'george@example.com', 'George', 'password123', FALSE, '2024-11-07 09:30:00', 'avatar-9.jpg'),
(8, 'harry@example.com', 'Harry', 'password123', TRUE, '2024-11-08 10:00:00', 'avatar-10.jpg'),
(9, 'ivy@example.com', 'Ivy', 'password123', TRUE, '2024-11-09 11:00:00', 'avatar-12.jpg'),
(10, 'jack@example.com', 'Jack', 'password123', TRUE, '2024-11-10 13:00:00', 'avatar-4.jpg'),
(11, 'kate@example.com', 'Kate', 'password123', FALSE, '2024-11-11 14:00:00', 'avatar-15.jpg'),
(12, 'leo@example.com', 'Leo', 'password123', TRUE, '2024-11-12 15:30:00', 'avatar-6.jpg'),
(13, 'mona@example.com', 'Mona', 'password123', TRUE, '2024-11-13 16:00:00', null),
(14, 'nina@example.com', 'Nina', 'password123', TRUE, '2024-11-14 17:00:00', null),
(15, 'oliver@example.com', 'Oliver', 'password123', FALSE, '2024-11-15 18:30:00', 'avatar-16.jpg'),
(16, 'paul@example.com', 'Paul', 'password123', TRUE, '2024-11-16 19:30:00', 'avatar-1.jpg'),
(17, 'quinn@example.com', 'Quinn', 'password123', FALSE, '2024-11-17 10:00:00', 'avatar-17.jpg'),
(18, 'rachel@example.com', 'Rachel', 'password123', TRUE, '2024-11-18 11:00:00', null),
(19, 'sam@example.com', 'Sam', 'password123', FALSE, '2024-11-19 12:00:00', 'avatar-14.jpg');



INSERT INTO `CATEGORIES` (`category_id`, `category_name`) VALUES
(1, 'Java'),
(2, 'PHP'),
(3, 'JavaScript'),
(4, 'HTML'),
(5, 'CSS'),
(6, 'Python'),
(7, 'C++'),
(8, 'Ruby'),
(9, 'Swift'),
(10, 'Go'),
(11, 'Other');



INSERT INTO `THREADS` (`user_name`, `post_time`, `category`, `thread`, `thread_image_name`) VALUES
('Alice', '2022-05-15 12:34:56', 'Java', 'How do I optimize my Java code for better performance?', '1 (1).gif'),
('Bob', '2023-02-24 13:47:03', 'PHP', 'What are the security best practices for PHP websites?', '2 (3).jpg'),
('Charlie', '2024-04-11 14:55:32', 'JavaScript', 'Which JavaScript framework should I choose for a new project in 2024?', NULL),
('Diana', '2024-03-22 09:28:21', 'HTML', 'What are the new features introduced in HTML5.3?', '1 (5).gif'),
('Ethan', '2023-05-09 08:15:47', 'CSS', 'How can I use CSS Grid for responsive web design?', NULL),
('Fiona', '2022-08-19 07:38:22', 'Python', 'What are some tips for learning Python as a beginner?', '2 (1).jpg'),
('George', '2023-11-03 11:55:19', 'C++', 'Can someone explain memory management in C++?', '1 (3).gif'),
('Harry', '2024-06-27 10:40:14', 'Ruby', 'What are the advantages of Ruby on Rails for startups?', '2 (7).jpg'),
('Ivy', '2023-07-10 15:25:13', 'Swift', 'Is Swift a good language for cross-platform mobile app development?', NULL),
('Jack', '2022-10-15 16:38:49', 'Go', 'Why is Go preferred for high-concurrency applications?', '2 (5).jpg'),
('Kate', '2024-01-04 13:27:06', 'Java', 'How does the garbage collector work in Java?', '1 (6).gif'),
('Leo', '2023-08-29 17:41:35', 'PHP', 'How can I use Laravel for RESTful API development?', NULL),
('Mona', '2024-02-20 18:54:21', 'JavaScript', 'What are the differences between React and Vue.js?', '1 (8).gif'),
('Nina', '2022-11-14 11:39:47', 'HTML', 'How do semantic HTML tags improve SEO?', NULL),
('Oliver', '2023-09-12 12:29:50', 'CSS', 'How can I create dark mode themes using CSS variables?', '2 (4).jpg'),
('Paul', '2024-03-25 14:47:03', 'Python', 'What are some common mistakes when working with pandas in Python?', NULL),
('Quinn', '2022-06-22 16:35:28', 'C++', 'How do I prevent memory leaks in C++ applications?', '1 (7).gif'),
('Rachel', '2024-07-19 10:30:17', 'Ruby', 'What makes Ruby a popular choice for web development?', '2 (8).jpg'),
('Sam', '2023-03-11 09:12:34', 'Swift', 'How can I start learning Swift as an iOS developer?', '1 (4).gif'),
('Alice', '2024-04-06 11:55:49', 'Go', 'What are the key features of the Go programming language?', NULL),
('Bob', '2022-12-02 12:28:03', 'Java', 'What is the difference between JDK, JRE, and JVM?', NULL),
('Charlie', '2024-05-05 13:47:20', 'PHP', 'How do I handle form validation in PHP?', NULL),
('Diana', '2022-01-29 14:58:56', 'JavaScript', 'Can someone explain the concept of closures in JavaScript?', NULL),
('Ethan', '2023-10-14 16:30:09', 'HTML', 'What are the best practices for structuring an HTML document?', NULL),
('Fiona', '2024-06-19 15:25:04', 'CSS', 'What is the difference between Flexbox and CSS Grid?', NULL),
('George', '2022-04-03 13:41:52', 'Python', 'What are the most popular libraries for data analysis in Python?', NULL),
('Harry', '2024-01-16 14:30:29', 'C++', 'How do I use the STL library in C++?', NULL),
('Ivy', '2023-04-09 12:50:10', 'Ruby', 'What is the difference between Ruby and Python?', NULL),
('Jack', '2022-07-24 11:39:53', 'Swift', 'Can I use Swift for server-side development?', NULL),
('Kate', '2023-12-04 10:10:33', 'Go', 'How do I handle errors in Go?', NULL),
('Leo', '2024-03-13 16:49:15', 'Java', 'What is the best way to debug Java programs?', '1 (2).gif'),
('Mona', '2024-05-07 18:41:26', 'PHP', 'What are the advantages of using Composer in PHP projects?', '2 (9).jpg'),
('Nina', '2023-01-24 19:20:43', 'JavaScript', 'How can I improve performance in large JavaScript applications?', '1 (9).gif'),
('Oliver', '2024-02-15 17:34:09', 'HTML', 'What are some accessibility guidelines for HTML forms?', '2 (10).jpg'),
('Paul', '2023-07-06 13:01:56', 'CSS', 'How can I create animations using keyframes in CSS?', '1 (10).gif'),
('Quinn', '2024-08-09 11:10:12', 'Python', 'How do I manage virtual environments in Python?', '2 (6).jpg'),
('Rachel', '2023-03-19 16:59:27', 'C++', 'What is the role of constructors and destructors in C++?', '2 (11).jpg'),
('Sam', '2022-09-18 14:12:30', 'Ruby', 'What are some common use cases for Ruby?', '2 (12).jpg'),
('Alice', '2024-03-21 18:41:53', 'Swift', 'How can I handle asynchronous tasks in Swift?', '2 (13).jpg'),
('Bob', '2022-07-02 17:24:44', 'Go', 'What is the Go module system and how do I use it?', '2 (14).jpg'),
('Charlie', '2023-11-25 15:36:13', 'Java', 'What are the differences between HashMap and TreeMap in Java?', '2 (15).jpg'),
('Diana', '2023-02-03 13:55:39', 'PHP', 'How do I work with sessions in PHP?', '1 (2).gif'),
('Ethan', '2022-12-20 16:11:55', 'JavaScript', 'What is event delegation in JavaScript?', '2 (16).jpg'),
('Fiona', '2024-01-12 10:48:07', 'HTML', 'How can I optimize HTML forms for better usability?', '2 (17).jpg'),
('George', '2023-09-15 11:30:51', 'CSS', 'What are pseudo-classes and how can I use them?', '1 (10).gif'),
('Harry', '2024-06-08 17:53:22', 'Python', 'How do I use the logging module in Python?', '2 (18).jpg'),
('Ivy', '2024-04-04 09:15:27', 'C++', 'What are smart pointers and how do they work?', '2 (19).jpg'),
('Jack', '2022-10-10 15:20:09', 'Ruby', 'What are Ruby gems and how do I use them?', '2 (20).jpg'),
('Kate', '2024-02-28 12:03:47', 'Swift', 'How can I use Core Data in Swift?', '1 (1).gif'),
('Leo', '2024-05-20 10:32:15', 'Go', 'What are goroutines and how do I use them?', NULL);

INSERT INTO `COMMENTS` (`user_name`, `comment_time`, `comment`, `thread_id`)
VALUES
-- Comments for thread 50
('Alice', '2023-01-15 10:23:00', 'This is an insightful post. Thanks for sharing!', 50),
('Bob', '2024-04-20 14:35:00', 'I completely agree with this. Great content!', 50),
('Charlie', '2022-07-09 17:42:00', 'Can you elaborate more on this topic?', 50),
('Diana', '2024-03-10 09:18:00', 'I learned a lot from this thread, thank you.', 50),
('Ethan', '2023-05-18 11:51:00', 'Do you have any additional resources on this?', 50),
('Fiona', '2022-10-25 16:24:00', 'This is a topic I’ve been researching. Great post!', 50),
('George', '2023-02-13 08:59:00', 'What challenges did you face related to this?', 50),
('Harry', '2024-06-03 12:47:00', 'This cleared up some confusion I had. Thanks!', 50),
('Ivy', '2023-08-30 15:02:00', 'Great thread! Looking forward to more posts like this.', 50),
('Jack', '2024-01-04 13:15:00', 'Can you provide some examples for clarity?', 50),

-- Comments for thread 1
('Kate', '2023-09-21 11:22:00', 'This thread really helped me solve a problem I had.', 1),
('Leo', '2024-02-02 09:30:00', 'Thanks for sharing your insights!', 1),
('Mona', '2022-11-14 14:48:00', 'I’ve seen similar threads but this is the best.', 1),
('Nina', '2024-03-10 10:40:00', 'Do you have any updates on this?', 1),
('Oliver', '2023-07-23 18:54:00', 'I bookmarked this for future reference. Thanks!', 1),
('Paul', '2024-05-17 13:33:00', 'Great post! Any beginner tips related to this?', 1),
('Quinn', '2022-12-06 16:29:00', 'I was just discussing this topic. Spot on!', 1),
('Rachel', '2023-03-13 19:20:00', 'Amazing thread. Very helpful content.', 1),
('Sam', '2024-07-08 17:06:00', 'Could you explain the key points in detail?', 1),
('Alice', '2024-06-29 14:11:00', 'This is exactly what I was looking for. Thanks!', 1),

-- Comments for thread 3
('Bob', '2023-10-05 12:40:00', 'Thanks for posting this! Super helpful.', 3),
('Charlie', '2022-06-17 13:20:00', 'This thread is really well-written.', 3),
('Diana', '2024-01-22 09:54:00', 'Do you have any recommended tools for this?', 3),
('Ethan', '2023-11-11 16:05:00', 'I appreciate the clarity in this post.', 3),
('Fiona', '2023-04-01 10:18:00', 'This is exactly the information I needed.', 3),
('George', '2022-08-20 11:35:00', 'What inspired you to write this thread?', 3),
('Harry', '2024-05-06 15:30:00', 'Thanks for simplifying this topic!', 3),
('Ivy', '2024-02-16 13:10:00', 'I’ve bookmarked this for future reference.', 3),
('Jack', '2023-09-13 14:42:00', 'Do you have any real-world examples for this?', 3),
('Kate', '2024-03-03 10:04:00', 'This was very informative. Thank you!', 3),

-- Comments for thread 4
('Leo', '2022-10-12 11:00:00', 'Great explanation! I learned something new.', 4),
('Mona', '2023-01-30 13:50:00', 'Thanks for breaking this down so well.', 4),
('Nina', '2023-08-01 09:25:00', 'I never thought of it this way before. Great!', 4),
('Oliver', '2024-06-02 16:18:00', 'What’s the best way to implement this?', 4),
('Paul', '2024-04-25 10:11:00', 'This is a must-read for anyone interested.', 4),
('Quinn', '2023-06-18 17:08:00', 'Could you write more on this topic?', 4),
('Rachel', '2024-07-12 12:59:00', 'Very informative. I appreciate the details.', 4),
('Sam', '2022-09-14 10:52:00', 'What are the pros and cons of this?', 4),
('Alice', '2023-05-09 16:33:00', 'This is so helpful. Thank you!', 4),
('Bob', '2024-02-22 08:42:00', 'Do you have a related guide for beginners?', 4),

-- Comments for thread 5
('Charlie', '2023-12-01 14:18:00', 'This is a game-changer for me.', 5),
('Diana', '2022-07-19 12:36:00', 'Thank you for this insightful thread.', 5),
('Ethan', '2023-10-13 16:07:00', 'How does this compare to alternative methods?', 5),
('Fiona', '2024-01-10 13:20:00', 'I’m going to try this approach soon.', 5),
('George', '2023-03-22 11:50:00', 'Thanks for the great explanation!', 5),
('Harry', '2022-11-05 17:08:00', 'Do you think this will stay relevant in the future?', 5),
('Ivy', '2023-04-26 14:33:00', 'Fantastic post! I’ll share this with my team.', 5),
('Jack', '2024-02-04 09:24:00', 'This answered all my questions. Thanks!', 5),
('Kate', '2024-03-11 11:44:00', 'What are some challenges related to this?', 5),
('Leo', '2022-08-23 16:11:00', 'This was very clear and concise.', 5),

-- Comments for other threads (7, 10, 20, 24, 15, 49, 48)
('Mona', '2023-07-29 10:15:00', 'Thread 7 comment 1.', 7),
('Nina', '2024-01-21 14:04:00', 'Thread 7 comment 2.', 7),
('Oliver', '2022-11-12 09:30:00', 'Thread 10 comment 1.', 10),
('Paul', '2023-03-19 12:07:00', 'Thread 10 comment 2.', 10),
('Quinn', '2023-02-06 17:22:00', 'Thread 20 comment 1.', 20),
('Rachel', '2024-06-04 10:43:00', 'Thread 20 comment 2.', 20),
('Sam', '2022-05-23 18:38:00', 'Thread 24 comment 1.', 24),
('Alice', '2024-07-09 12:19:00', 'Thread 24 comment 2.', 24),
('Bob', '2023-11-15 13:11:00', 'Thread 15 comment 1.', 15),
('Charlie', '2024-04-14 16:56:00', 'Thread 15 comment 2.', 15),
('Diana', '2024-01-02 11:40:00', 'Thread 49 comment 1.', 49),
('Ethan', '2022-09-17 12:52:00', 'Thread 49 comment 2.', 49),
('Fiona', '2024-06-22 15:07:00', 'Thread 48 comment 1.', 48),
('George', '2023-04-11 14:44:00', 'Thread 48 comment 2.', 48);
