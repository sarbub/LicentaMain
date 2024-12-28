CREATE TABLE aditional_user_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fk INT NOT NULL,
    adress_city VARCHAR(100),
    user_county VARCHAR(100),
    University VARCHAR(150),
    faculty VARCHAR(150),
    year_of_study INT,
    income DECIMAL(10, 2),
    FOREIGN KEY (fk) REFERENCES users(id) ON DELETE CASCADE
);
