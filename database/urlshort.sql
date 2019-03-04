
CREATE TABLE user (
    email varchar(100),
    user varchar(100),
    password varchar(100),
    UNIQUE(email,user)
);

CREATE TABLE url (
    user varchar(100),
    url varchar(500),
    shorturl varchar(15),
    hit int,
    created DATETIME,
    UNIQUE(shorturl)
);

INSERT INTO user VALUES ('davidespier@gmail.com', 'davidespier', '12345678');
