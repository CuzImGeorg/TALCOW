INSERT INTO log_action(name, description, modul) VALUES('namehistory', 'a user changed its username', 1);
INSERT INTO log_action(name, description, modul) VALUES('permission change', 'the permissions of a user were changed', 1);
INSERT INTO log_action(name, description, modul) VALUES('apt_list change', 'a user installed/updated/deinstalled an apt package', 1);
INSERT INTO log_action(name, description, modul) VALUES('smt', 'a servicemonitor was added!', 1);
INSERT INTO log_action(name, description, modul) VALUES('udp', 'someone tried to delete a User!!', 1);
INSERT INTO log_action(name, description, modul) VALUES('modul_value prevention', 'Someone tried to change/add/delete a modul_value', 1);
INSERT INTO log_action(name, description, modul) VALUES('ll', 'Log level insert/delete prevention', 1);
INSERT INTO log_action(name, description, modul) VALUES('ua', 'a User was added!', 1);
INSERT INTO log_action(name, description, modul) VALUES('module update', 'a module was installed/deinstalled!', 1);
INSERT INTO log_action(name, description, modul) VALUES('reboot', 'reboot syste,', 1);
INSERT INTO log_action(name, description, modul) VALUES('sql', 'User Performed a Query,', 1);


















INSERT INTO log_level(name, description) VALUES('debug', 'this log is a debug. You may just ignore it');
INSERT INTO log_level(name, description) VALUES('warning', 'this log is a warning. You may consider to look into it');
INSERT INTO log_level(name, description) VALUES('error', 'this log is an error, try to solve it immediatly');
INSERT INTO log_level(name, description) VALUES('critical', 'this log is a critical error, write a ticket to our team');
