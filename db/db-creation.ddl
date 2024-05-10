-- Database Section
-- ________________ 

CREATE DATABASE IF NOT EXISTS KittyGram;

USE KittyGram;


-- Tables Section
-- _____________ 

CREATE TABLE IF NOT EXISTS CITY (
    city_id INT AUTO_INCREMENT PRIMARY KEY,
    city_name VARCHAR(60) NOT NULL,
    city_cap VARCHAR(6) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS ACCOUNT (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL UNIQUE,
    email VARCHAR(319) NOT NULL UNIQUE,
    password VARCHAR(512) NOT NULL, -- to hash
    salt VARCHAR(512) NOT NULL,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    cell VARCHAR(15),
    user_bio VARCHAR(255),
    profile_pic INT DEFAULT 0,
    city_id INT
);

CREATE TABLE IF NOT EXISTS LOGIN_ATTEMPTS (
    user_id INT NOT NULL,
    date_and_time DATETIME NOT NULL,
    PRIMARY KEY (user_id, date_and_time)
);

CREATE TABLE IF NOT EXISTS ADOPTION (
    post_id INT PRIMARY KEY,
    adopted INT NOT NULL DEFAULT 0,
    city_id INT NOT NULL,
    user_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS USER_ADOPTING (
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    presentation VARCHAR(512),
    PRIMARY KEY (post_id, user_id)
);

CREATE TABLE IF NOT EXISTS COMMENT (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    message VARCHAR(200) NOT NULL,
    date DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS FOLLOW (
    follower INT NOT NULL,
    followed INT NOT NULL,
    PRIMARY KEY (follower, followed)
);

CREATE TABLE IF NOT EXISTS POST_LIKE (
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (post_id, user_id)
);

CREATE TABLE IF NOT EXISTS MEDIA (
    media_id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS POST (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    user_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS NOTIFICATION (
    notification_id INT NOT NULL,
    for_user_id INT NOT NULL,
    from_user_id INT NOT NULL,
    post_id INT,
    date DATE NOT NULL,
    message VARCHAR(255) NOT NULL,
    seen INT NOT NULL default 0,
    PRIMARY KEY (for_user_id, notification_id)
);

-- Add Foreign Keys
-- ________________

ALTER TABLE ACCOUNT 
    ADD FOREIGN KEY (city_id) 
    REFERENCES CITY(city_id);

ALTER TABLE ADOPTION 
    ADD FOREIGN KEY (post_id)
    REFERENCES POST(post_id) ON DELETE CASCADE;

ALTER TABLE ADOPTION 
    ADD FOREIGN KEY (city_id)
    REFERENCES CITY(city_id);

ALTER TABLE ADOPTION 
    ADD FOREIGN KEY (user_id)
    REFERENCES ACCOUNT(user_id) ON DELETE CASCADE;

ALTER TABLE USER_ADOPTING 
    ADD FOREIGN KEY (post_id)
    REFERENCES ADOPTION(post_id) ON DELETE CASCADE;

ALTER TABLE USER_ADOPTING
    ADD FOREIGN KEY (user_id)
    REFERENCES ACCOUNT(user_id) ON DELETE CASCADE;

ALTER TABLE COMMENT
    ADD FOREIGN KEY (user_id)
    REFERENCES ACCOUNT(user_id) ON DELETE CASCADE;

ALTER TABLE COMMENT
    ADD FOREIGN KEY (post_id)
    REFERENCES POST(post_id) ON DELETE CASCADE;

ALTER TABLE FOLLOW 
    ADD FOREIGN KEY (follower)
    REFERENCES ACCOUNT(user_id) ON DELETE CASCADE;

ALTER TABLE FOLLOW 
    ADD FOREIGN KEY (followed)
    REFERENCES ACCOUNT(user_id) ON DELETE CASCADE;

ALTER TABLE POST_LIKE 
    ADD FOREIGN KEY (post_id)
    REFERENCES POST(post_id) ON DELETE CASCADE;

ALTER TABLE POST_LIKE 
    ADD FOREIGN KEY (user_id)
    REFERENCES ACCOUNT(user_id) ON DELETE CASCADE;

ALTER TABLE NOTIFICATION 
    ADD FOREIGN KEY (for_user_id)
    REFERENCES ACCOUNT(user_id) ON DELETE CASCADE;

ALTER TABLE NOTIFICATION 
    ADD FOREIGN KEY (from_user_id)
    REFERENCES ACCOUNT(user_id) ON DELETE CASCADE;

ALTER TABLE NOTIFICATION 
    ADD FOREIGN KEY (post_id)
    REFERENCES POST(post_id) ON DELETE CASCADE;

ALTER TABLE LOGIN_ATTEMPTS
    ADD FOREIGN KEY (user_id)
    REFERENCES ACCOUNT(user_id) ON DELETE CASCADE;

-- Index Section
-- _____________ 
CREATE UNIQUE INDEX ID_ACCOUNT_IND
    ON ACCOUNT (user_id);

CREATE UNIQUE INDEX ID_ADOPTION_IND
    ON ADOPTION (post_id);

CREATE INDEX REF_COMME_ACCOU_IND
    ON COMMENT (user_id);

CREATE INDEX REF_COMME_POST_IND
    ON COMMENT (post_id);

CREATE INDEX REF_FOLLO_ACCOU_IND
    ON FOLLOW (follower);

CREATE INDEX REF_FOLLO_ACCOU_IND2
    ON FOLLOW (followed);

CREATE UNIQUE INDEX ID_POST_LIKE_IND
    ON POST_LIKE (post_id, user_id);

CREATE INDEX REF_LIKE_ACCOU_IND
    ON POST_LIKE (user_id);

CREATE INDEX REF_LIKE_POST_IND
    ON POST_LIKE (post_id);

CREATE UNIQUE INDEX ID_NOTIFICATION_IND
    ON NOTIFICATION (notification_id, for_user_id);

CREATE INDEX REF_NOTIF_FROM_USER_IND
    ON NOTIFICATION (from_user_id);

CREATE INDEX REF_NOTIF_POST_IND
    ON NOTIFICATION (post_id);

CREATE UNIQUE INDEX ID_POST_IND
    ON POST (post_id);

CREATE INDEX REF_POST_ACCOU_IND
    ON POST (user_id);

CREATE UNIQUE INDEX ID_CITY_IND
    ON CITY (city_id);
