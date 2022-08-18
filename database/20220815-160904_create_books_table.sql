-- up
CREATE TABLE books (
	id TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50),
	author VARCHAR(200),
	number_of_pages SMALLINT,
	genre VARCHAR(250),
	is_national BOOLEAN,
	publisher VARCHAR(50),
	description TEXT
);

-- down
DROP TABLE books;