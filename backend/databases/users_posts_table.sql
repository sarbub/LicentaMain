CREATE TABLE users_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fk INT NOT NULL,  -- Foreign key reference (likely to users table)
    WOnYourMind TEXT,  -- Post content or user input
    currentDate DATETIME DEFAULT CURRENT_TIMESTAMP,  -- Date and time of post
    FOREIGN KEY (fk) REFERENCES users(id)  -- Assuming a 'users' table with 'id'
);
