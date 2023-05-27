/*
 general useful sql
 */
SELECT * FROM log_level;
SELECT * FROM log_action;
SELECT * FROM log;
SELECT * FROM qser;

DELETE FROM log_action ;

ALTER SEQUENCE log_id_seq RESTART WITH 1;
/*
 to test triggers:
 */
UPDATE qser SET name = 'admin' WHERE  id = 1;
DELETE FROM qser WHERE id = 1;
UPDATE aptlist SET name = 'boo' WHERE id =1;
DELETE FROM log_level WHERE id = 1;

/*
 test inserts
 */

INSERT INTO qser(name, password, description, active) VALUES('root','root','root user', true);
INSERT INTO qser(name, password, description, active) VALUES('unknown','unknown','unknown user', false);
INSERT INTO qser(name, password, description, active) VALUES('trigger_test','root','root user', false);
INSERT INTO qser(name, password, description, active) VALUES('system','t','nologin', false);
INSERT INTO qser(name, password, description, active) VALUES('test','test','test user', true);
INSERT INTO qser_hat_berechtigung(uid, bid,useredit) VALUES(1,1,1);


INSERT INTO modul_value(name, description) VALUES('installed', 'installed but not active');
INSERT INTO modul_value(name, description) VALUES('active', 'installed and active');
INSERT INTO modul_value(name, description) VALUES('not installed', 'the module is not installed');
INSERT INTO modul(installedbyuid, name, valueid) VALUES(1, 'global', 2);
INSERT INTO modul(installedbyuid, name, valueid) VALUES(1, 'openvpn', 1);
INSERT INTO modul(installedbyuid, name, valueid) VALUES(1, 'docker', 3);


INSERT INTO aptlist(name, uid) VALUES ('whatsapp',1);
INSERT INTO aptlist(name, uid) VALUES ('snapchat',1);
INSERT INTO aptlist(name, uid) VALUES ('firefox',1);
INSERT INTO aptlist(name, uid) VALUES ('peter',1);
INSERT INTO m_servicemonitor(uid, servicename, description) VALUES (1,'openssh','monitor of the ssh server but on openssh');

/*
 Log actions!
 */



INSERT INTO m_postgresql(pgdatabase, pguser, pghost, pgport, pgpw, description, useredit) VALUES ('talcow', 'postgres', 'localhost', 5432, 'adm', 'This is The Production Database u shoudlt delete it smile', 1);
INSERT INTO m_postgresql(pgdatabase, pguser, pghost, pgport, pgpw, description, useredit) VALUES ('postgres', 'postgres', 'localhost', 5432, 'adm', 'This is The Test Database u can delete it smile', 1);


