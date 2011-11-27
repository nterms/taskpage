CREATE TABLE tp_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    salt VARCHAR(128),
    email VARCHAR(128) NOT NULL,
    role VARCHAR(30) NOT NULL DEFAULT 'employee',
    active INTEGER NOT NULL DEFAULT 0,
    name VARCHAR(256) NOT NULL,
    sex INTEGER NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tp_project (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(256) NOT NULL,
    description TEXT,
    start INTEGER,
    end INTEGER,
    manager INTEGER NOT NULL DEFAULT 0,
    parent INTEGER NOT NULL DEFAULT 0,
    order_no INTEGER,
    status INTEGER NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE tp_task (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(256) NOT NULL,
    description TEXT,
    start INTEGER,
    end INTEGER,
    priority INTEGER DEFAULT 0,
    owner INTEGER NOT NULL,
    project INTEGER DEFAULT 0,
    parent INTEGER DEFAULT 0,
    order_no INTEGER,
    assigned_to INTEGER,
    assigned_by INTEGER,
    predecessor INTEGER,
    successor INTEGER,
    status INTEGER NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tp_user (username, password, email, role, active) VALUES ('demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', 'employee', 1);
INSERT INTO tp_user (username, password, email, role, active) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', 'admin', 1);
