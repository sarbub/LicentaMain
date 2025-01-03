CREATE TABLE users_events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    fk INT,
    event_title VARCHAR(255) NOT NULL,
    event_description TEXT NOT NULL,
    event_date DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
