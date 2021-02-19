--  Select by author id
SELECT name
FROM authors
WHERE id = 1

-- Select count books , where price > 400
SELECT COUNT(name)
from books
WHERE price > 400

-- Select and sorting
SELECT name from books WHERE price > 100 ORDER BY name;

-- Select from column name inside all tables
SELECT name FROM authors
UNION
SELECT name FROM books

-- Between
SELECT name, price FROM books WHERE price BETWEEN 200 AND 600 ORDER BY name;