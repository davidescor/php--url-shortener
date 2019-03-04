
CREATE TABLE user (
    email varchar(100),
    password varchar(100),
    UNIQUE(email)
);

CREATE TABLE url (
    user varchar(100),
    url varchar(500),
    shorturl varchar(15),
    hit int,
    created DATETIME,
    UNIQUE(shorturl)
);

INSERT INTO user VALUES ('davidespier@gmail.com', '12345678');
INSERT INTO url VALUES ('davidespier@gmail.com', 'https://www.google.es/','ggl',0,'04/03/2019');