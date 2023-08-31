CREATE TABLE user_form (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL
);

CREATE TABLE calculator_results (
  username VARCHAR(255) NOT NULL,
  weight INT(10) NOT NULL,
  height INT(10) NOT NULL,
  age INT(10) NOT NULL,
  gender VARCHAR(255) NOT NULL,
  activity_level VARCHAR(255) NOT NULL,
  weight_goal VARCHAR(255) NOT NULL,
  calorie_goal INT(10) NOT NULL
);


CREATE TABLE calculator_results2 (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  weight INT(10) NOT NULL,
  height_feet INT(10) NOT NULL,
  height_inches INT(10) NOT NULL,
  age INT(10) NOT NULL,
  gender VARCHAR(255) NOT NULL,
  activity_level VARCHAR(255) NOT NULL,
  weight_goal VARCHAR(255) NOT NULL,
  calorie_goal INT(10) NOT NULL
);

CREATE TABLE bmi_results (
  username VARCHAR(255) NOT NULL,
  age INT(10) NOT NULL,
  gender VARCHAR(255) NOT NULL,
  height INT(10) NOT NULL,
  weight INT(10) NOT NULL,
  bmi  INT(10) NOT NULL
);
