-- users 表
INSERT INTO users (id, name, password, email)
VALUES (1, 'user1', 'password1', 'a@b.com');

-- accommodations 表
INSERT INTO accommodations (accommodationId, name, startDate, endDate, lat, lng, address, price)
VALUES (1, 'Shangri-La Hotel', '2015-10-01', '2015-10-03', 1.307, 103.826, '22 Orange Grove Road, Singapore 258350', 300);

-- accommodations_images 表
INSERT INTO accommodations_images (imagesId, accommodationId, path)
VALUES (1, 1, 'http://www.shangri-la.com/uploadedImages/Shangri-la_Hotels/Shangri-La_Hotel_Singapore/rooms-suites/horizon-club/horizon-club-room-1.jpg');

-- ideas 表
INSERT INTO ideas (ideaId, title, destination, lat, lng, startDate, endDate, content, accommodationId, userId)
VALUES (1, 'My trip to Singapore', 'Singapore', 1.404, 103.793, '2015-10-01', '2015-10-03', 'Singapore is a small island country. It is a very clean and safe place to visit. The food is great and the people are friendly. I would recommend visiting Singapore.', 1, '1');

-- ideas_images 表
INSERT INTO ideas_images (imagesId, ideaId, path)
VALUES (1, 1, 'http://www.yoursingapore.com/content/traveller/en/browse/see-and-do/nature-and-wildlife/singapore-zoo/_jcr_content/par-carousel/carousel_detailpage/carousel/item_1.thumbnail.carousel-img.740.416.jpg');

-- ideas_tags 表
INSERT INTO ideas_tags (tagName, ideaId)
VALUES ('food', 1);

-- ideas_comments 表
INSERT INTO ideas_comments (commentId, ideaId, userId, date, content)
VALUES (1, 1, 1, '2015-10-01', 'Great trip!');