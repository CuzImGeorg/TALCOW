CREATE TABLE IF NOT EXISTS qser(
    id serial PRIMARY KEY,
    name varchar(63),
    password varchar(63),
    description varchar(255),
    createdate timestamp default now(),
    active boolean

);

CREATE TABLE IF NOT EXISTS unhistory(
    id serial PRIMARY KEY,
    uid int,
    oldname varchar(63),
    newname varchar(63),
    changetime timestamp default now(),
    FOREIGN KEY(uid) REFERENCES qser(id)
);

CREATE TABLE IF NOT EXISTS  aptlist(
    id serial PRIMARY KEY,
    name varchar(63),
    updatedate timestamp default now(),
    date timestamp default now(),
    uid int,
    FOREIGN KEY(uid) REFERENCES qser(id)
);


CREATE TABLE IF NOT EXISTS  m_servicemonitor(
    id serial PRIMARY KEY,
    uid int,
    servicename varchar(63),
    servicetype boolean,
    description varchar(63),
    FOREIGN KEY(uid) REFERENCES qser(id)
);

CREATE TABLE IF NOT EXISTS  m_openvpn(
    id serial PRIMARY KEY,
    createqser int,
    name varchar(63),
    description varchar(63),
    createtime timestamp default now(),
    FOREIGN KEY(createqser) REFERENCES qser(id)
);

CREATE TABLE IF NOT EXISTS  berechtigung(
    id serial PRIMARY KEY,
    name varchar(63) unique,
    description varchar(255)
);

CREATE TABLE IF NOT EXISTS  qser_hat_berechtigung(
    id serial PRIMARY KEY,
    uid int,
    bid int,
    useredit int,
    createtime timestamp default now(),
    FOREIGN KEY(uid) REFERENCES qser(id),
    FOREIGN KEY(bid) REFERENCES berechtigung(id)
);

CREATE TABLE IF NOT EXISTS  modul_value(
    id serial PRIMARY KEY,
    name varchar(63),
    description varchar(255)
);

CREATE TABLE IF NOT EXISTS  modul(
    id serial PRIMARY KEY,
    installedbyuid int,
    name varchar(63),
    valueid int,
    FOREIGN KEY(valueid) REFERENCES modul_value(id),
    FOREIGN KEY(installedbyuid) REFERENCES qser(id)
);

CREATE TABLE IF NOT EXISTS  log_action(
    id serial PRIMARY KEY,
    name varchar(63),
    description varchar(255),
    modul int,
    FOREIGN KEY(modul) REFERENCES modul(id)
);

CREATE TABLE IF NOT EXISTS  log_level(
    id serial PRIMARY KEY,
    name varchar(63),
    description varchar(255)
);

CREATE TABLE IF NOT EXISTS  log(
    id serial PRIMARY KEY,
    uid int,
    action int,
    timestamp timestamp default now(),
    description varchar(255),
    level int,
    FOREIGN KEY(uid) REFERENCES qser(id),
    FOREIGN KEY(action) REFERENCES log_action(id),
    FOREIGN KEY(level) REFERENCES log_level(id)
);

CREATE TABLE IF NOT EXISTS  m_config(
    id serial PRIMARY KEY,
    name varchar(63),
    value varchar(255),
    uid int,
    modul int,
    FOREIGN KEY(uid) REFERENCES qser(id),
    FOREIGN KEY(modul) REFERENCES modul(id)
);

CREATE TABLE IF NOT EXISTS  berechtigungsgruppe(
    id serial PRIMARY KEY,
    name varchar(63),
    description varchar(255),
    createuser int,
    FOREIGN KEY(createuser) REFERENCES qser(id)
   );

CREATE TABLE IF NOT EXISTS  berechtigungsgruppe_berechtigung(
    id serial PRIMARY KEY,
    bid int,
    bgid int,
    useredit int,
    FOREIGN KEY(bid) REFERENCES berechtigung(id),
    FOREIGN KEY(bgid) REFERENCES berechtigungsgruppe_berechtigung(id),
    FOREIGN KEY(useredit) REFERENCES qser(id)
);

CREATE TABLE IF NOT EXISTS m_postgresql(
   id serial  PRIMARY KEY,
   pgdatabase varchar(63),
   pguser varchar(63),
   pghost varchar(255),
   pgport int,
   pgpw varchar(63),
   description varchar(255),
   useredit int,
   FOREIGN KEY(useredit) REFERENCES qser(id)
);