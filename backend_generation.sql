CREATE TABLE Users (
	user_id INT NOT NULL,
	user_name VARCHAR(30) NOT NULL UNIQUE,
	first_name VARCHAR NOT NULL,
	last_name VARCHAR NOT NULL,
	user_password PASSWORD NOT NULL,
	confirm_password PASSWORD NOT NULL,
	creation_date TIMESTAMP,
	PRIMARY KEY (user_id)
);