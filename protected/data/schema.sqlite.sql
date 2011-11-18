CREATE TABLE tp_user (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    salt VARCHAR(128),
    email VARCHAR(128) NOT NULL,
    role VARCHAR(30) NOT NULL DEFAULT 'employee',
    active INTEGER NOT NULL DEFAULT 0,
    name VARCHAR(256) NOT NULL,
    sex INTEGER NOT NULL DEFAULT 0,
);

CREATE TABLE tp_project (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(128) NOT NULL,
    manager INTEGER NOT NULL DEFAULT 0,
    description TEXT,
    start INTEGER,
    end INTEGER,
    status INTEGER NOT NULL DEFAULT 0
);

CREATE TABLE tp_task (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(128) NOT NULL,
    project INTEGER NOT NULL,
    owner INTEGER NOT NULL,
    user INTEGER NOT NULL,
    description TEXT,
    start INTEGER,
    end INTEGER,
    status INTEGER NOT NULL DEFAULT 0
);

INSERT INTO tp_user (username, password, email, role, active) VALUES ('demo', 'demo', 'demo@example.com', 'employee', 1);
INSERT INTO tp_user (username, password, email, role, active) VALUES ('admin', 'admin', 'admin@example.com', 'admin', 1);
