DROP TABLE IF EXISTS users;

CREATE TABLE users(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	surname VARCHAR(100) NOT NULL,
	birthdate VARCHAR(50) NOT NULL,
	sex int NOT NULL,
	native_city VARCHAR(40) NOT NULL,

	PRIMARY KEY (id)
);

INSERT INTO users(name, surname, birthdate, sex, native_city)
VALUES
	('Steve', 'Rogers', '1990-04-31', 1, 'New York'),
	('Bob', 'Marley', '1934-02-24', 1, 'Lisabon'),
	('Maria', 'Kurie', '1934-04-14', 0, 'Tokyo'),
	('John', 'Wick', '1984-12-15', 1, 'Las Vegas'),
	('John', 'Elton', '1932-07-23', 1, 'Washington DC'),
	('Sasha', 'Grey', '1989-02-18', 0, 'San Diego')
;