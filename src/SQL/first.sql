CREATE
DATABASE library_na_shevchenka;

CREATE TABLE authors
(
    id   INT(2) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO authors (name)
VALUES ('Taras Shevchenko'),
       ('Lesya Ukrainka'),
       ('Ivan Franko'),
       ('Robert Caldiny'),
       ('Vasil Stus');

CREATE table books
(
    id        INT(2) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    author_id INT(2) UNSIGNED NOT NULL,
    price     INT(5) NOT NULL,
    FOREIGN KEY (author_id) REFERENCES authors (id)
);
INSERT INTO books (name, author_id, price)
VALUES ('Zapovit', 1, 400),
       ('Davnya Kazka', 2, 270),
       ('Dym', 2, 540),
       ('Kateryna', 1, 290),
       ('Zahar Berkut', 3, 660),
       ('Moisey', 3, 220),
       ('Perekonannya', 4, 780),
       ('Psiholigiya Vplyvu', 4, 490),
       ('Duma Skovorody', 5, 199),
       ('More', 5, 99);


