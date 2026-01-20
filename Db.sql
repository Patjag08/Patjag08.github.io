CREATE TABLE user (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  user_email VARCHAR(255) NOT NULL,
  user_name VARCHAR(255) NOT NULL,
  user_password VARCHAR(255) NOT NULL
);

CREATE TABLE past_Jobs (
  user_id INT NOT NULL,
  jobs_json JSON,
  FOREIGN KEY (user_id) REFERENCES user(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE staff_Accounts (
  staff_id INT AUTO_INCREMENT PRIMARY KEY,
  staff_user VARCHAR(255),
  staff_email VARCHAR(255),
  staff_password VARCHAR(255)
);
