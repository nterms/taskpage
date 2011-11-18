CREATE TABLE tp_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    salt VARCHAR(128),
    email VARCHAR(128) NOT NULL,
    role VARCHAR(30) NOT NULL DEFUALT 'employee',
    active INTEGER NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tp_project (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    manager INTEGER NOT NULL DEFAULT 0,
    description TEXT,
    start INTEGER,
    end INTEGER,
    status INTEGER NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tp_task (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    project INTEGER NOT NULL DEFAULT 0,
    user INTEGER NOT NULL,
    description TEXT,
    start INTEGER,
    end INTEGER,
    status INTEGER NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO user (username, password, email, role, active) VALUES ('demo', 'demo', 'demo@example.com', 'employee', 1);
INSERT INTO user (username, password, email, role, active) VALUES ('admin', 'admin', 'admin@example.com', 'admin', 1);
