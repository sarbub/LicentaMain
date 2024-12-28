CREATE TABLE pending_accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    county VARCHAR(100),
    city VARCHAR(100),
    university VARCHAR(150),
    faculty VARCHAR(150),
    school_year INT,
    siblings INT,
    income_family DECIMAL(10, 2)
);
