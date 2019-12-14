#DROP DATABASE teslaEC521;
CREATE DATABASE teslaEC521;
USE teslaEC521;
CREATE TABLE employees (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL, question VARCHAR(255) DEFAULT "", answer VARCHAR(255) DEFAULT "", created_at DATETIME DEFAULT CURRENT_TIMESTAMP );
INSERT INTO employees (username, password) VALUES ('admin', '$2y$10$yD.BMnYu1mssNRq4jjFkdOj11xp7pmmUghoSB/4RN54.MpXFdE6Hq');
INSERT INTO employees (username, password, question, answer) VALUES ('helpdesk', '$2y$10$Rvep9ac.dBPlqzv3CYN4qeitd4JvJB1z3qPRzhPXYhgZNfGehpMM.', 'What is the name of the IT guy?', '$2y$10$XD02EY5vwwQxgE7Wo3Tb8eNKOVylb2ER1JW1dr0sW23QjSyoXP9o6');
INSERT INTO employees (username, password, question, answer) VALUES('kpeterson', '$2y$10$U1UzTt9DPrjsE19mwAQFCOO1MG0sVWlFiIpC4hIHp91Zi.4VS3fwy','What is our founder\'s license plate number?', '$2y$10$fPbyEIQ/uxd1DYFsbNwdceNPhkZHC2uzglWfZljlyLhKnca/aM7XO' );
INSERT INTO employees (username, password, question, answer) VALUES('zkirkhorn', '$2y$10$ec/35JRoKfkdW381F2USg.iU0qFxXm0iTZ6Pmfcoe05l8dQzqwelS','Where was your first job?', '$2y$10$PrxQBYYjQ.kuvtvLZ7QCLOWdf25fgW39Gv4CL5lUgfQKZrh4SD4NG' );
INSERT INTO employees (username, password, question, answer) VALUES('skim', '$2y$10$LbGFw5W776pjmrbodu6uFeXItVcjKEPd/DJBYEW4J/WfPhPV1Hr3q','Who is our current intern?', '$2y$10$vJhh2nB3UXkY2.2ADBPFvesDQzoownOAjXnF7HnM.f0HumYPN96WC' );
INSERT INTO employees (username, password) VALUES('bdillon', '$2y$10$1L/4.eV543DxlfnlB1l1ue8j9nh158XjaRd2o3UhWATspO4Y5/eTS');
INSERT INTO employees (username, password) VALUES('jguillen', '$2y$10$hQlT4.lhpvI93pWMX8G4e.LmqNZJmIrIj35lG8Wdl2zbn8RzbKU3W');

