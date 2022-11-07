DROP TABLE IF EXISTS users;

CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	surname VARCHAR(100) NOT NULL,
	birthdate DATE NOT NULL,
	sex int NOT NULL,
	native_city VARCHAR(40) NOT NULL,

	PRIMARY KEY (id)
);

INSERT INTO users(name, surname, birthdate, sex, native_city)
VALUES
	  ('Steve', 'Rogers', '1920-06-04', 1, 'New York')
	, ('Bob', 'Marley', '1945-02-06', 1, 'Nine Mile')
	, ('Maria', 'Curie', '1867-11-07', 0, 'Warsaw')
	, ('John', 'Wick', '1984-12-15', 1, 'Belarus')
	, ('John', 'Elton', '1947-03-25', 1, 'Pinner')
	, ('Sasha', 'Grey', '1989-02-18', 0, 'North Highlands')
	, ('Nikola', 'Tesla', '1856-07-10', 1, 'Smiljan')
	, ('Marilyn', 'Monroe', '1926-06-01', 0, 'Los Angeles')
	, ('Margaret', 'Thatcher', '1925-10-13', 0, 'Grantham')
;