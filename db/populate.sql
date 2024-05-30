INSERT INTO ACCOUNT (username, email, password, salt, first_name, last_name,user_bio,profile_pic_id,city_id)
VALUES
('saint','gioelesanti@gmail.com','password','salt','Gioele','Santi','CEO di Kittygram',1,NULL),
('Nax','nax@gmail.com','password2','salt','federico','Diotallevi','Backend Master',1,NULL),
('astro','javid@gmail.com','password3','salt','Javid','Ameri','Frontend Master',1,NULL),
('pioli','alessandro@gmail.com','password4','salt','Alessandro','Coli','I love kittens!!',1,NULL),
('mirco','mircoterenzi@gmail.com','password5','salt','Mirco','Terenzi','KITTENS!!',1,NULL),
('example','example@gmail.com','d30275eac88d1c1d5ce0334374221cbf811efb7458ad91e58c1d9f13b816acc2567370301d58561089253b6c1adb645f1ece0c69d88b5679d3190190805c2999','e372f1c3b92ad9571cb2e6a5a97c956d88e94be5523ae4766796332c413685d34aff99e795b00d349cf455bfb0f543f95a552a23669b4d66af56084cd3eaf230','Example','Profile','Profile for testing the social network',1,NULL);

INSERT INTO POST (description, date, user_id)
VALUES 
('Welcome to KittyGram! Excited to connect with fellow cat lovers.', '2023-05-01', 1),
('Working on some backend magic for KittyGram.', '2023-05-02', 2),
('Frontend development is my passion. Check out my latest project!', '2023-05-03', 3),
('Enjoying a sunny day with my kittens!', '2023-05-04', 4),
('Can''t get enough of these adorable kittens!', '2023-05-05', 5),
('Testing the functionalities of KittyGram. Stay tuned!', '2023-05-06', 6);
('Watch my new kittens!!', '2023-05-07', 6);
('I love kittens!!', '2023-05-08', 6);
('Love that!', '2023-05-09', 6);
('AHAHAHAHAHA', '2023-05-10', 6);

INSERT INTO MEDIA (file_name, post_id)
VALUES 
('post1_img1.jpeg', 1),
('post1_img2.jpeg', 1),
('post2_img1.jpeg', 2),
('post3_img1.jpeg', 3),
('post4_img1.jpeg', 4),
('post5_img1.jpeg', 5),
('post6_img1.jpeg', 6);
('post6_img2.jpeg', 6);
('post6_img3.jpeg', 6);
('post7_img1.jpeg', 7);
('post8_img1.gif', 8);
('post9_img1.gif', 9);
('post10_img1.gif', 10);


INSERT INTO COMMENT (post_id, user_id, message, date)
VALUES 
(1, 2, 'Welcome to KittyGram, Gioele!', '2023-05-01'),
(1,3,'Wow!','2023-05-01'),
(1,4,'Belli!!!!','2023-05-01'),
(1,5,'Adorable<3','2023-05-01'),
(2, 3, 'Great work, Federico!', '2023-05-02'),
(3, 4, 'Impressive project, Javid!', '2023-05-03'),
(4, 5, 'Beautiful kittens, Alessandro!', '2023-05-04'),
(5, 6, 'Adorable kittens, Mirco!', '2023-05-05'),
(6, 1, 'Testing looks good!', '2023-05-06');


INSERT INTO ADOPTION (post_id, adopted, city_id)
VALUES
(4, 0, 1),
(5, 1, 1);

INSERT INTO USER_ADOPTING (post_id, user_id, cell, presentation)
VALUES
(4, 1, '123-456-7890', 'I would love to adopt this kitten.'),
(5, 2, '234-567-8901', 'This kitten would be perfect for my family.');

INSERT INTO FOLLOW (follower, followed)
VALUES
(1, 2),
(1, 3),
(2, 1),
(3, 4),
(4, 5),
(5, 6),
(6, 1);
(6,2);
(6,3);
(6,4);
(6,5);

INSERT INTO NOTIFICATION (for_user_id, from_user_id, post_id, date, message, seen)
VALUES
(1, 2, 1, '2023-05-01 09:00:00', 'Federico liked your post.', 0),
(2, 1, 2, '2023-05-02 10:00:00', 'Gioele commented on your post.', 0),
(3, 4, 3, '2023-05-03 11:00:00', 'Alessandro liked your post.', 0),
(4, 5, 4, '2023-05-04 12:00:00', 'Mirco commented on your post.', 0),
(5, 6, 5, '2023-05-05 13:00:00', 'Example liked your post.', 0),
(6, 3, 6, '2023-05-06 14:00:00', 'Javid commented on your post.', 0);