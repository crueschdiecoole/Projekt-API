SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Create a table to store sunrise-sunset data
CREATE TABLE sunrise_sunset_data (
    id int(11) NOT NULL AUTO_INCREMENT,
    place varchar(50) NOT NULL,
    sunrise DATETIME NOT NULL,
    sunset DATETIME NOT NULL,
    zenith DATETIME NOT NULL,
    moon_phase VARCHAR(100) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY place (place)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Insert sample data (remove this in production)
INSERT INTO sunrise_sunset_data (id, place, sunrise, sunset, zenith, moon_phase, timestamp) VALUES
(1, 'Bern', '2024-02-10 10:44:57', '2024-02-10 21:04:57', '2024-02-10 13:44:57', '2024-02-10 00:44:57', '2024-02-10 09:44:57');

-- Adjust AUTO_INCREMENT value
ALTER TABLE sunrise_sunset_data MODIFY id int(11) NOT NULL AUTO_INCREMENT;

