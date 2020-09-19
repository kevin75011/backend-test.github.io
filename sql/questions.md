# SQL

![](images/sql-diagram.png)

## 1. Query

Based on the SQL diagram above, write the following queries:

**A.** Get authors with a last name beginning with "M" or who are born after 1950.

**Answer:**
```mysql
SELECT * FROM author WHERE last_name LIKE 'M%' AND YEAR(birth_date) > '1950';
```

**B.** Count the number of books per category (empty categories too).

**Answer:**
```mysql
SELECT category_id,COUNT(*) FROM book GROUP BY category_id;
```

**C.** Find authors who wrote at least 2 books.

**Answer:**
```mysql
SELECT author.first_name,author.last_name FROM author INNER JOIN book ON author.id = book.author_id WHERE book.id >= '2';
```

**D.** Get 50 authors with at least one event between the start and the end of this year.

**Answer:**
```mysql
SELECT TOP 50 author.first_name,author.last_name FROM author INNER JOIN author_event ON author.id = author_event.author_id 
INNER JOIN event ON event.id = author_event.event_id WHERE event.date > YEAR(NOW()-1) AND YEAR(NOW());
```

**E.** Get the average number of books written by authors.

**Answer:**
```mysql
SELECT author.first_name,author.last_name,AVG(book.id) FROM author INNER JOIN book ON author.id = book.author_id GROUP BY author.id;
```

**F.** Get authors, sorted by the date of their **latest** event.

**Answer:**
```mysql
SELECT author.first_name,author.last_name,MAX(event.date) FROM author INNER JOIN author_event ON author.id = author_event.author_id 
INNER JOIN event ON event.id = author_event.event_id ORDER BY event.date DESC;
```

## 2. Database Structure

**A.** Based on the SQL diagram above, what can be done to improve the performance of this query ?

```mysql
SELECT id, name FROM book WHERE YEAR(published_date) >= '1973';
```

**Answer:** Index the table: CREATE INDEX ix_book_date ON book(published_date)


**B.** Give 3 common good practice on a database structure to optimize queries.

**Answer:** 
 - SELECT instead of SELECT *
 - INNER JOIN rather than WHERE
 - Use LIMIT to sample query results
