/*
 general useful sql
 */
SELECT * FROM log_level;
SELECT * FROM log_action;
SELECT * FROM log;
SELECT * FROM qser;

ALTER SEQUENCE log_id_seq RESTART WITH 13;
/*
 to test triggers:
 */
UPDATE qser SET name = 'root' WHERE  id = 1;
DELETE FROM qser WHERE id = 1;
UPDATE aptlist SET name = 'boo' WHERE id =1;
DELETE FROM log_level WHERE id = 1;

/*
 test inserts
 */

INSERT INTO berechtigung(name, description)  VALUES ('sudo','the user has sudo rights. He can execute every single feature!');
INSERT INTO qser_hat_berechtigung(uid, bid) VALUES(1,1);
INSERT INTO qser(name, password, description, active) VALUES('root','root','root user', true);
INSERT INTO qser(name, password, description, active) VALUES('unknown','unknown','unknown user', false);
INSERT INTO qser(name, password, description, active) VALUES('trigger_test','root','root user', false);
INSERT INTO modul_value(name, description) VALUES('installed', 'installed but not active');
INSERT INTO modul_value(name, description) VALUES('active', 'installed and active');
INSERT INTO modul_value(name, description) VALUES('not installed', 'the module is not installed');
INSERT INTO modul(installedbyuid, name, valueid) VALUES(1, 'global', 2);
INSERT INTO log_level(name, description) VALUES('warning', 'this log is a warning. You may consider to look into it');
INSERT INTO log_level(name, description) VALUES('error', 'this log is an error, try to solve it immediatly');
INSERT INTO log_level(name, description) VALUES('critical', 'this log is a critical error, write a ticket to our team');
INSERT INTO aptlist(name, uid) VALUES ('whatsapp',1);
INSERT INTO aptlist(name, uid) VALUES ('snapchat',1);
INSERT INTO aptlist(name, uid) VALUES ('firefox',1);
INSERT INTO aptlist(name, uid) VALUES ('peter',1);
INSERT INTO m_servicemonitor(uid, servicename, description) VALUES (1,'openssh','monitor of the ssh server but on openssh');

/*
 Log actions!
 */

INSERT INTO log_action(name, description, modul) VALUES('namehistory', 'a user changed its username', 1);
INSERT INTO log_action(name, description, modul) VALUES('permission change', 'the permissions of a user were changed', 1);
INSERT INTO log_action(name, description, modul) VALUES('apt_list change', 'a user installed/updated/deinstalled an apt package', 1);
INSERT INTO log_action(name, description, modul) VALUES('smt', 'a servicemonitor was added!', 1);