-- users 表start_date
INSERT INTO users (id, name, password, email)
VALUES (1, 'user1', 'password1', 'a@b.com');

-- accommodations 表
INSERT INTO accommodations (id, name, start_date, end_date, lat, lng, address, price)
VALUES (1, 'Shangri-La Hotel', '2015-10-01', '2015-10-03', 1.307, 103.826, '22 Orange Grove Road, Singapore 258350', 300);

-- accommodations_images 表
INSERT INTO accommodations_images (id, accommodation_id, path)
VALUES (1, 1, 'https://th.bing.com/th/id/R.6449d97766625ad1fe77d929feda85c8?rik=6o37sA93PRj3ug&pid=ImgRaw&r=0');

-- ideas 表
INSERT INTO ideas (id, title, destination, lat, lng, start_date, end_date, content, accommodation_id, user_id)
VALUES (1, 'My trip to Singapore', 'Singapore', 1.404, 103.793, '2015-10-01', '2015-10-03', 'Singapore is a small island country. It is a very clean and safe place to visit. The food is great and the people are friendly. I would recommend visiting Singapore.', 1, '1');

-- ideas_images 表
INSERT INTO ideas_images (id, idea_id, path)
VALUES (1, 1, 'https://th.bing.com/th/id/OIP.Mz2x0OYKPAgNdIPVS8SJBAHaE7?w=249&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7');

-- ideas_tags 表
INSERT INTO ideas_tags (id, tag_name, idea_id)
VALUES (1, 'food', 1);

-- ideas_comments 表
INSERT INTO ideas_comments (id, idea_id, user_id, date, content)
VALUES (1, 1, 1, '2015-10-01', 'Great trip!');