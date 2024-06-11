CREATE TABLE food(
    num INTEGER AUTO_INCREMENT,
    like_num INTEGER,
    hate_num INTEGER,
    star_num INTEGER,
    name VARCHAR(30) NOT NULL,
    time VARCHAR(30) NOT NULL,
    tnum VARCHAR(30) NOT NULL,
    type VARCHAR(30) NOT NULL,
    regist_day VARCHAR(20),
    PRIMARY KEY(num)
);